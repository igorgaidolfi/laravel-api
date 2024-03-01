<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class Projectcontroller extends Controller
{
    public function index(){
        $projects = Project::all();
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}