<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'skills' => Skill::count(),
            'projects' => Project::count(),
            'education' => Education::count(),
            'certificates' => Certificate::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }

    // Profile Management
    public function profile()
    {
        $profile = Profile::first();
        if (!$profile) {
            $profile = new Profile();
        }
        return view('admin.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $profile = Profile::firstOrNew([]);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'domicile' => 'required|string|max:255',
            'status' => 'required|string',
            'about' => 'required|string',
            'email' => 'required|email',
            'whatsapp' => 'required|string',
            'instagram' => 'required|string',
            'github' => 'required|string',
        ]);

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully!');
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $profile = Profile::firstOrNew([]);
        
        if ($profile->photo) {
            Storage::disk('public')->delete($profile->photo);
        }

        $path = $request->file('photo')->store('profile', 'public');
        $profile->photo = $path;
        $profile->save();

        return back()->with('success', 'Profile photo updated successfully!');
    }

    // Skills CRUD
    public function skillsIndex()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    public function skillsCreate()
    {
        return view('admin.skills.create');
    }

    public function skillsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hard,soft,tool',
            'level' => 'nullable|in:Beginner,Intermediate,Advanced',
            'logo_url' => 'nullable|url',
        ]);

        Skill::create($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully!');
    }

    public function skillsEdit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function skillsUpdate(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:hard,soft,tool',
            'level' => 'nullable|in:Beginner,Intermediate,Advanced',
            'logo_url' => 'nullable|url',
        ]);

        $skill->update($validated);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully!');
    }

    public function skillsDestroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully!');
    }

    // Projects CRUD
    public function projectsIndex()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function projectsCreate()
    {
        return view('admin.projects.create');
    }

    public function projectsStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|string',
            'tech_stack' => 'required|string',
            'github_link' => 'nullable|url',
        ]);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    public function projectsEdit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function projectsUpdate(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'features' => 'required|string',
            'tech_stack' => 'required|string',
            'github_link' => 'nullable|url',
        ]);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    public function projectsDestroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }

    public function projectsUpdateImage(Request $request, Project $project)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $path = $request->file('image')->store('projects', 'public');
        $project->image = $path;
        $project->save();

        return back()->with('success', 'Project image updated successfully!');
    }

    // Education CRUD
    // Education CRUD - PERBAIKAN: ganti $education menjadi $educations
    public function educationIndex()
    {
        $educations = Education::all();
        return view('admin.education.index', compact('educations'));
    }

    public function educationCreate()
    {
        return view('admin.education.create');
    }

    public function educationStore(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'program' => 'nullable|string|max:255',
            'year' => 'required|string|max:50',
        ]);

        Education::create($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education created successfully!');
    }

    public function educationEdit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function educationUpdate(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'program' => 'nullable|string|max:255',
            'year' => 'required|string|max:50',
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully!');
    }

    public function educationDestroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education deleted successfully!');
    }

    // Certificates CRUD
    public function certificatesIndex()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function certificatesCreate()
    {
        return view('admin.certificates.create');
    }

    public function certificatesStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Certificate::create($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate created successfully!');
    }

    public function certificatesEdit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function certificatesUpdate(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $certificate->update($validated);

        return redirect()->route('admin.certificates.index')->with('success', 'Certificate updated successfully!');
    }

    public function certificatesDestroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }
        $certificate->delete();
        return redirect()->route('admin.certificates.index')->with('success', 'Certificate deleted successfully!');
    }

    public function certificatesUpdateImage(Request $request, Certificate $certificate)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($certificate->image) {
            Storage::disk('public')->delete($certificate->image);
        }

        $path = $request->file('image')->store('certificates', 'public');
        $certificate->image = $path;
        $certificate->save();

        return back()->with('success', 'Certificate image updated successfully!');
    }
}