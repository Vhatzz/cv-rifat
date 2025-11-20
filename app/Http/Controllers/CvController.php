<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Certificate;

class CvController extends Controller
{
    public function index()
    {
        // Ambil data dari database (pastikan ada data)
        $profile = Profile::first() ?? new Profile();
        $hardSkills = Skill::where('type', 'hard')->get();
        $softSkills = Skill::where('type', 'soft')->get();
        $tools = Skill::where('type', 'tool')->get();
        $projects = Project::all();
        $educations = Education::orderByDesc('year')->get();
        $certificates = Certificate::all();

        return view('cv.index', compact(
            'profile',
            'hardSkills',
            'softSkills',
            'tools',
            'projects',
            'educations',
            'certificates'
        ));
    }
}