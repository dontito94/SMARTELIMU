<?php
namespace App\Http\Requests\Sysdef;

use App\Http\Requests\Request;
use App\Models\Sysdef\ReportIssue;

class ReportIssueRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
                {
                    return [];
                }
            case 'POST':
                {
                    return [
                        'type' => 'required',
                        'description' => 'required',
                    ];
                }
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'status' => 'required|numeric',
                    ];
                }
            default:break;
        }
    }
}
