<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create()
    {
        $project = new Project();
        $project->name = "THECB";
        $project->save();

        $lang1 = new Language();
        $lang1->title = "Python";
        $lang1->project_id = $project->id;
        $lang1->save();

        $deploy = new Deployment();
        $deploy->status = "pending";
        $deploy->language_id = $lang1->id;
        $deploy->save();
    }

    public function show($id)
    {
        $project = Project::find($id)->deployment;
        dd($project);
    }
}
