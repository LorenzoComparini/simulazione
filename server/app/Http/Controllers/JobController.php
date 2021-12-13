<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Language;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function list(){
        return Job::all();
    }

    public function detail($id){
        return Job::where('id', $id)->first();
    }

    public function create(Request $req){
        $datas = json_decode($req->getContent());

        $job = new Job();
        $job->title = $datas->title;
        $job->agency = $datas->agency;
        // $job->language_id = Language::where('code', $datas->language)->first()->id;
        $job->language_id = $datas->language_id;
        $job->ral = $datas->ral;
        $job->experience = $datas->experience;
        $job->location = $datas->location;
        $job->description = $datas->description;

        $job->save();
    }
    
    public function edit(Request $req, $id){
        $datas = json_decode($req->getContent());

        $job = Job::where('id', $id)->first();

        $job->title = $datas->title;
        $job->agency = $datas->agency;
        // $job->language_id = Language::where('code', $datas->language)->first()->id;
        $job->language_id = $datas->language_id;
        $job->ral = $datas->ral;
        $job->experience = $datas->experience;
        $job->location = $datas->location;
        $job->description = $datas->description;

        $job->save();
    }

    public function delete($id){
        Job::destroy($id);
    }
}
