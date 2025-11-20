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

    // ==============================
    // PROFILE MANAGEMENT
    // ==============================
    public function profile()
    {
        $profile = Profile::first();
        if (!$profile) $profile = new Profile();
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

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $profile = Profile::firstOrCreate([]);

        // Hapus gambar lama jika ada
        if ($profile->photo && Storage::disk('public')->exists($profile->photo)) {
            Storage::disk('public')->delete($profile->photo);
        }

        // Simpan foto baru dengan nama unik
        $filename = 'profile-' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $path = $request->file('photo')->storeAs('profile', $filename, 'public');
        
        $profile->photo = $path;
        $profile->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui!');
    }


    // ==============================
    // SKILLS CRUD
    // ==============================
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

    // ==============================
    // PROJECTS CRUD
    // ==============================
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = 'project-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('projects', $filename, 'public');
        }

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
        if ($project->image && Storage::disk('public')->exists($project->image)) {
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

        // Hapus gambar lama jika ada
        if ($project->image && Storage::disk('public')->exists($project->image)) {
            Storage::disk('public')->delete($project->image);
        }

        // Simpan gambar baru dengan nama unik
        $filename = 'project-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $project->image = $request->file('image')->storeAs('projects', $filename, 'public');
        $project->save();

        return back()->with('success', 'Project image updated successfully!');
    }

    // ==============================
    // EDUCATION CRUD
    // ==============================
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

    // ==============================
    // CERTIFICATES CRUD
    // ==============================
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = 'certificate-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $validated['image'] = $request->file('image')->storeAs('certificates', $filename, 'public');
        }

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
        if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
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

        // Hapus gambar lama jika ada
        if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
            Storage::disk('public')->delete($certificate->image);
        }

        // Simpan gambar baru dengan nama unik
        $filename = 'certificate-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
        $certificate->image = $request->file('image')->storeAs('certificates', $filename, 'public');
        $certificate->save();

        return back()->with('success', 'Certificate image updated successfully!');
    }
}