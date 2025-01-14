<?php

namespace App\Http\Controllers\Lessons;

use App\Http\Controllers\Controller;
use App\Models\Package\Package;
use App\Repositories\Package\PackageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtraPrimaryLevelController extends Controller
{
    //

    protected $packages;
    public function __construct()
    {

        $this->packages = new PackageRepository();
    }

    public function index()
    {
        $packages = Package::where('category',7)->paginate(9);
        $primary_level = code_value()->getPrimaryLevelPackages();
        $secondary_level = code_value()->getSecondaryLevelPackages();
        $extra_primary_level = code_value()->getExtraPrimaryLevelPackages();
        $extra_secondary_level = code_value()->getExtraSecondaryLevelPackages();


        return view('lessons.extra_primary_level.includes.package_list')
                ->with('packages',$packages)
                ->with('primary_level',$primary_level)
                ->with('secondary_level',$secondary_level)
                ->with('extra_primary_level',$extra_primary_level)
                ->with('extra_secondary_level',$extra_secondary_level);;

    }
}
