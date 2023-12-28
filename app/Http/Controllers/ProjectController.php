<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResourc;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    // public function index(){

    // }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $project = Auth::user()->projects()->create($validated);

        return new ProjectResourc($project);
    }
    public function update(StoreProjectRequest $request , project $project)
    {
        $validated = $request->validated();

        $project->update($validated);

        return new ProjectResourc($project);
    }

}
