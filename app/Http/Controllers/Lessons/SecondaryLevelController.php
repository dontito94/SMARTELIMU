<?php

namespace App\Http\Controllers\Lessons;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondaryLevelController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index()
    {
        return view('lessons.secondary_level.index');
    }
}
