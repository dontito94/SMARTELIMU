<?php

namespace App\Services\Workflow;

use App\Events\Sockets\BroadcastWorkflowUpdated;
use App\Repositories\Application\ApplicationRepository;
use App\Repositories\Application\BatchCertificateInspectionRepository;
use App\Repositories\Application\ConditionalReleaseRepository;
use App\Repositories\Application\TransferredApplicationRepository;
use App\Repositories\Workflow\WfModuleRepository;
use App\Repositories\Workflow\WfTrackRepository;
use App\Repositories\Workflow\WfDefinitionRepository;
use App\Exceptions\GeneralException;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Class Workflow
 *
 * Class to process all application workflows at different levels. It controls swiftly
 * the process of forwarding the application process and handle the proper completion of
 * each workflow.
 *
 * @author     Erick Chrysostom <e.chrysostom@nextbyte.co.tz>
 * @category   MAC
 * @package    App\Services\Workflow
 * @subpackage None
 * @copyright  Copyright (c) Workers Compensation Fund (WCF) Tanzania
 * @license    Not Applicable
 * @version    Release: 1.02
 * @link       None
 * @since      Class available since Release 1.0.0
 */

class Workflow
{

    /**
     * @var
     */
    private $level;

    /**
     * @var
     */
    private $wf_module_group_id;

    /**
     * @var
     */
    public $wf_module_id;

    /**
     * @var
     */
    private $resource_id;

    /**
     * @var
     */
    public $wf_definition_id;

    /**
     * @var WfDefinitionRepository
     */
    private $wf_definition;

    /**
     * @var WfModuleRepository
     */
    private $wf_module;

    /**
     * @var WfTrackRepository
     */
    private $wf_track;


    /**
     * Workflow constructor.
     * @param array $input
     * @throws GeneralException
     */
    public function __construct(array $input)
    {
        /** sample 1 $input : ['wf_module_group_id' => 4, 'resource_id' => 1] **/
        /** sample 2 $input : ['wf_module_group_id' => 3, 'resource_id' => 1, 'type' => 4] **/
        /** sample 3 $input : ['wf_module_group_id' => 3] **/
        /** sample 4 $input : ['wf_module_group_id' => 3, 'type' => 4] **/
        $this->wf_definition = new WfDefinitionRepository();
        $this->wf_module = new WfModuleRepository();
        $this->wf_track = new WfTrackRepository();
        $this->resource_id = (isset($input['resource_id']) ? $input['resource_id'] : null);
        foreach ($input as $key => $value) {
            switch ($key) {
                case 'wf_module_group_id':
                    $this->wf_module_group_id = $input['wf_module_group_id'];
                    $this->wf_module_id = $this->wf_module->getModule($input);
                    break;
                case 'wf_module_id':
                    $wf_module_id = $value;
                    $wf_module = $this->wf_module->find($wf_module_id);
                    $this->wf_module_id = $wf_module_id;
                    $this->wf_module_group_id = $wf_module->wf_module_group_id;
                    break;
            }
        }
        /**
         * Get current values .....
         */
        $this->wf_definition_id = $this->wf_definition->getDefinition($this->wf_module_id, $this->resource_id);
    }

    /**
     * @return null
     */
    public function nextLevel()
    {
        return $this->wf_definition->getNextLevel($this->wf_definition_id);
    }

    /**
     * @return null
     */
    public function prevLevel()
    {
        return $this->wf_definition->getPrevLevel($this->wf_definition_id);
    }

    /**
     * @return mixed
     */
    public function lastLevel()
    {
        return $this->wf_definition->getLastLevel($this->wf_module_id);
    }

    /**
     * @return mixed
     */
    public function currentLevel()
    {
        $wf_definition = $this->wf_definition->getCurrentLevel($this->wf_definition_id);
        return $wf_definition->level;
    }

    /**
     * @return mixed
     */
    public function previousLevels()
    {
        $levels = $this->wf_definition->getPreviousLevels($this->wf_definition_id);
        return $levels;
    }

    public function getModule()
    {
        return $this->wf_module_id;
    }

    /**
     * Level for performing claim assessment level
     * @return int|null
     */
    public function claimAssessmentLevel()
    {
        $assessment_level = null;
        switch ($this->wf_module_id) {
            // Basic Procedure - wf_module
            case 3:
                $assessment_level = 4;
                break;
            // Proposed Procedure 1 Occupation Accident, Disease & Death
            case 10:
                $assessment_level = 7;
                break;
        }
        return $assessment_level;
    }

    /**
     * @param $sign
     * @return mixed
     */
    public function nextDefinition($sign)
    {
        return $this->wf_definition->getNextDefinition($this->wf_module_id, $this->wf_definition_id, $sign);
    }

    /**
     * @param $level
     * @return mixed
     */
    public function levelDefinition($level)
    {
        return $this->wf_definition->getLevelDefinition($this->wf_module_id, $level);
    }

    /**
     * @param $sign
     * @return mixed
     */
    public function nextWfDefinition($sign)
    {
               return $this->wf_definition->getNextWfDefinition($this->wf_module_id, $this->wf_definition_id, $sign);
    }

    /**
     * @return mixed
     */
    public function currentWfTrack()
    {
        return $this->wf_track->getRecentResourceTrack($this->wf_module_id, $this->resource_id);
    }

    /**
     * @return mixed
     */
    public function currentTrack()
    {
        $wfTrack = $this->currentWfTrack();
        return $wfTrack->id;
    }

    /**
     * @param $level
     * @throws GeneralException
     * @description check if the resource is at specified workflow and has already assigned ...
     */
    public function checkLevel($level)
    {
        $wfTrack = $this->currentWfTrack();
        if ($level == $this->currentLevel()) {
            if ($wfTrack->assigned == 1) {
                $return = ['success' => true];
            } else {
                $return = ['success' => false, 'message' => trans('exceptions.backend.workflow.level_not_assigned')];
            }
        } else {
            $return = ['success' => false, 'message' => trans('exceptions.backend.workflow.level_error')];
        }
        if (!$return['success']) {
            throw new GeneralException($return['message']);
        };
    }

    /**
     * @param array ...$levels
     * @throws GeneralException
     * @description Check for Multi level, if the resource is at specified workflow and has already assigned
     */
    public function checkMultiLevel(...$levels)
    {
        $wfTrack = $this->currentWfTrack();
        $return = [];
        foreach ($levels as $level) {
            if ($level == $this->currentLevel()) {
                if ($wfTrack->assigned == 1) {
                    $return = ['success' => true];
                } else {
                    $return = ['success' => false, 'message' => trans('exceptions.backend.workflow.level_not_assigned')];
                }
                break;
            }
        }
        if (empty($return)) {
            $return = ['success' => false, 'message' => trans('exceptions.backend.workflow.level_error')];
        }
        if (!$return['success']) {
            throw new GeneralException($return['message']);
        };
    }

    /**
     * @param $id
     * @param $level
     * @return bool
     * @description check if user has access to a specific level
     */
    public function userHasAccess($id, $level)
    {
        if (env("TESTING_MODE", 0)) {
            $return = true;
        } else {
            $return = $this->wf_definition->userHasAccess($id, $level, $this->wf_module_id);
        }
        return $return;
    }

    /**
     * Write a workflow for the first time
     * @param $input
     * @param int $source, determine whether source is 2 => online or 1 => internally.
     * @throws GeneralException
     * @description Create a new workflow log
     */
    public function createLog($input, $source = 1)
    {
        $insert = [
            'user_id' => $input['user_id'],
            'status' => 1,
            'resource_id' => $input['resource_id'],
            'assigned' => 1,
            'comments' => $input['comments'],
            'wf_definition_id' => $this->wf_definition_id,
            'receive_date' => Carbon::now(),
            'forward_date' => Carbon::now(),
        ];
        $track = new WfTrackRepository();
        $wf_track = $track->query()->create($insert);

        //update Resource Type for the current wftrack
        $this->updateResourceType($wf_track);
        $nextInsert = $this->upNew($input);
        $wf_track = $track->query()->create($nextInsert); // changed

        //update Resource Type for the next wftrack
        $this->updateResourceType($wf_track);
    }

    /**
     * @param Model $wfTrack
     * @throws GeneralException
     * @description Update the resource type form different resources.
     */
    private function updateResourceType(Model $wfTrack)
    {
        $resourceId = $wfTrack->resource_id;
        //$moduleGroupId = $wfTrack->wfDefinition->wfModule->wfModuleGroup->id;
        switch ($this->wf_module_group_id) {
            case 1:
                //Application
                $application = (new ApplicationRepository())->query()->find($resourceId);
                $application->wfTracks()->save($wfTrack);
                break;

            case 2:
                $batch_certificate_inspection = (new BatchCertificateInspectionRepository())->query()->find($resourceId);
                $batch_certificate_inspection->wfTracks()->save($wfTrack);
                break;
            case 3:
                $conditional_release = (new ConditionalReleaseRepository())->query()->find($resourceId);
                $conditional_release->wfTracks()->save($wfTrack);
                break;
            case 4:
                $transferred_application = (new TransferredApplicationRepository())->query()->find($resourceId);
                $transferred_application->wfTracks()->save($wfTrack);
            default:

        }
    }

    /**
     * @param $input_update
     * @description Update the existing workflow
     */
    public function updateLog($input_update)
    {
        $track = new WfTrackRepository();
        $wf_track = $track->find($this->currentTrack());
        $wf_track->update($input_update);
    }

    /**
     * Assigning a workflow
     * @deprecated since version 1.00
     */
    public function assign()
    {
        $track = new WfTrackRepository();
        $wf_track = $track->find($this->currentTrack());
        $wf_track->user_id = access()->id();
        $wf_track->save();
    }

    /**
     * @param array $input
     * @throws GeneralException
     * @description create the next level information/workflow log.
     */
    public function forward(array $input)
    {
        $wf_track = new WfTrackRepository();
        $nextInsert = $this->upNew($input);
        $newTrack = $wf_track->query()->create($nextInsert);

        //update Resource Type for the next wftrack
        $this->updateResourceType($newTrack);
    }

    /**
     * Create the next workflow for the next level to be assigned
     * to the next available user/staff
     * @param $input
     * @return array
     */
    public function upNew($input)
    {
        $insert = [
            'status' => 0,
            'resource_id' => $input['resource_id'],
            'assigned' => 0,
            'parent_id' => $this->currentTrack(),
            'receive_date' => Carbon::now(),
            //'wf_definition_id' => $this->nextDefinition($input['sign']),
        ];
        if ($input['sign'] == -1) {
            $level = $input['level'];
            $insert['wf_definition_id'] = $this->levelDefinition($level);
            //$level = $this->prevLevel();
        } else {
            $level = $this->nextLevel();
            $insert['wf_definition_id'] = $this->nextDefinition($input['sign']);
        }
        //round robin can be implemented Here
        event(new BroadcastWorkflowUpdated($this->wf_module_id, $this->resource_id, $level));
        return $insert;
    }

    /**
     * Check if user has participated in the previous module level.
     * User should not participate twice in the same module.
     * @return bool
     */
    public function hasParticipated()
    {
        $return = $this->wf_track->hasParticipated($this->wf_module_id, $this->resource_id, $this->currentLevel());
        if ($return And env("TESTING_MODE")) {
            $return = false;
        }
        return $return;
    }

    /**
     * @param $input
     * @param $input_update
     * @throws GeneralException
     * @description Workflow Approve Action -- Forward to next level or complete level
     * @deprecated since version 1.00
     */
    public function wfApprove($input,$input_update)
    {
        $this->updateLog($input_update);
        if (!is_null($this->nextLevel())) {
            $this->forward($input);
        }
    }

    /**
     * @description Remove/Deactivate wf_tracks when resource id is cancelled / undone / removed.
     */
    public function wfTracksDeactivate()
    {
        $track = new WfTrackRepository();
        $wf_tracks = $track->query()->where('resource_id', $this->resource_id)->whereHas('wfDefinition', function ($query) {
            $query->where('wf_module_id', $this->wf_module_id);
        })->orderBy('id','desc');
        $wf_tracks->delete();
    }

    /**
     * @return bool
     * @description check if resource has workflow
     */
    public function checkIfHasWorkflow()
    {
        if (count($this->currentWfTrack())){
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * @return bool
     * @description Check if the workflow resource have had a completed workflow module trip
     */
    public function checkIfExistWorkflowModule()
    {
        $return = false;
        switch ($this->wf_module_group_id) {
            case 4:
            case 3:
                //Claim & Notification Processing
                $notificationReport = (new NotificationReportRepository())->query()->select(['isprogressive', 'id'])->find($this->resource_id);
                if ($notificationReport->isprogressive) {
                    //This is progressive notification
                    if ($notificationReport->workflows()->where(["wf_module_id" => $this->wf_module_id, "wf_done" => 1])->limit(1)->count()) {
                        $return = true;
                    }
                } else {
                    //This is legacy notification report
                    $return = $this->wf_track->checkIfExistWorkflowModule($this->resource_id, $this->wf_module_id);
                }
                break;
            default:
                $return = $this->wf_track->checkIfExistWorkflowModule($this->resource_id, $this->wf_module_id);
                break;
        }
        return $return;
    }

    public function checkIfExistDeclinedWorkflowModule()
    {
        $return = false;
        switch ($this->wf_module_group_id) {
            case 4:
            case 3:
                //Claim & Notification Processing
                $notificationReport = (new NotificationReportRepository())->query()->select(['isprogressive', 'id'])->find($this->resource_id);
                if ($notificationReport->isprogressive) {
                    //This is progressive notification
                    if ($notificationReport->workflows()->where(["wf_module_id" => $this->wf_module_id, "wf_done" => 2])->limit(1)->count()) {
                        $return = true;
                    }
                } else {
                    //This is legacy notification report
                    $return = $this->wf_track->checkIfExistDeclinedWorkflowModule($this->resource_id, $this->wf_module_id);
                }
                break;
            default:
                $return = $this->wf_track->checkIfExistDeclinedWorkflowModule($this->resource_id, $this->wf_module_id);
                break;
        }
        return $return;
    }

    /**
     * @description Check if is at Level 1 Pending
     * @return bool
     */
    public function checkIfIsLevel1Pending()
    {
        $return = $this->checkIfIsLevelPending(1);
        return $return;
    }

    /**
     * @description Check if is at defined Level Pending
     * @param $level_id
     * @return bool
     */
    public function checkIfIsLevelPending($level_id)
    {
        $current_level  = $this->currentLevel();
        $current_status = $this->currentWfTrack()->status;
        if ($current_level == $level_id && $current_status == 0){
            $return = true;
        } else {
            $return = false;
        }
        return $return;
    }

    /**
     * @param $level
     * @throws GeneralException
     * @description check if can initiate a level
     */
    public function checkIfCanInitiateAction($level)
    {
        if ($this->checkIfHasWorkflow()) {
            $this->checkLevel($level);
        }
    }

    /**
     * @param $level1
     * @param null $level2
     * @throws GeneralException
     */
    public function checkIfCanInitiateActionMultiLevel($level1, $level2 = null)
    {
        if ($this->checkIfHasWorkflow()) {
            $this->checkMultiLevel($level1, $level2);
        }
    }

    public function hasToAssign()
    {
        $current_level  = $this->currentLevel();
        switch ($current_level) {
            case 3:
                return true;
                break;
            default;
                echo false;
        }
        return false;
    }



// public function getNexUsersToAssign($wf_module_id)

}
