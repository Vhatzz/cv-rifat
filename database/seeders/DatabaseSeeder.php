<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Certificate;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Vhatz Admin',
            'email' => 'vhatz@cv.com',
            'username' => 'vhatz',
            'password' => bcrypt('cvvhatz'),
        ]);

        // Profile
        Profile::create([
            'name' => 'Rifat Pratama',
            'domicile' => 'Sukabumi',
            'status' => 'Mahasiswa Teknik Informatika — Universitas Muhammadiyah Sukabumi',
            'about' => 'Mahasiswa Teknik Informatika dengan minat di web dan mobile development. Memiliki pengalaman dalam pengembangan aplikasi web menggunakan Laravel dan React Native. Selalu bersemangat untuk mempelajari teknologi baru dan berkontribusi dalam proyek-proyek yang menantang.',
            'email' => 'rifatpratamaa@gmail.com',
            'whatsapp' => '085863441987',
            'instagram' => '_rifatpratamaa',
            'github' => 'Vhatzz',
        ]);

        // Hard Skills
        Skill::create(['name' => 'Laravel', 'type' => 'hard', 'level' => 'Intermediate']);
        Skill::create(['name' => 'PHP', 'type' => 'hard', 'level' => 'Intermediate']);
        Skill::create(['name' => 'JavaScript', 'type' => 'hard', 'level' => 'Intermediate']);
        Skill::create(['name' => 'MySQL', 'type' => 'hard', 'level' => 'Intermediate']);
        Skill::create(['name' => 'React Native', 'type' => 'hard', 'level' => 'Beginner']);
        Skill::create(['name' => 'React', 'type' => 'hard', 'level' => 'Beginner']);
        Skill::create(['name' => 'UI/UX Design', 'type' => 'hard', 'level' => 'Beginner']);

        // Soft Skills
        Skill::create(['name' => 'Communication', 'type' => 'soft']);
        Skill::create(['name' => 'Teamwork', 'type' => 'soft']);
        Skill::create(['name' => 'Problem Solving', 'type' => 'soft']);
        Skill::create(['name' => 'Adaptability', 'type' => 'soft']);
        Skill::create(['name' => 'Time Management', 'type' => 'soft']);

        // Tools Skills
        Skill::create(['name' => 'VSCode', 'type' => 'tool', 'level' => 'Intermediate', 'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg']);
        Skill::create(['name' => 'Figma', 'type' => 'tool', 'level' => 'Beginner', 'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg']);
        Skill::create(['name' => 'Git', 'type' => 'tool', 'level' => 'Intermediate', 'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg']);
        Skill::create(['name' => 'Photoshop', 'type' => 'tool', 'level' => 'Intermediate', 'logo_url' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/photoshop/photoshop-plain.svg']);

        // Projects
        Project::create([
            'name' => 'Foodinary - Mobile App',
            'description' => 'Aplikasi mobile untuk eksplorasi kuliner dengan fitur pencarian restoran dan menu makanan terpopuler.',
            'features' => 'Pencarian restoran, review pengguna, sistem rating, favorit menu',
            'tech_stack' => 'React Native, Firebase, Node.js',
            'github_link' => 'https://github.com/Vhatzz/foodinary',
        ]);

        Project::create([
            'name' => 'E-Commerce Website',
            'description' => 'Website e-commerce lengkap dengan sistem pembayaran dan manajemen produk.',
            'features' => 'Keranjang belanja, pembayaran online, manajemen produk, sistem user',
            'tech_stack' => 'Laravel, MySQL, Bootstrap, Midtrans API',
            'github_link' => 'https://github.com/Vhatzz/ecommerce',
        ]);

        // Education
        Education::create([
            'institution' => 'Universitas Muhammadiyah Sukabumi (UMMI)', 
            'program' => 'Teknik Informatika', 
            'year' => '2023 – Sekarang'
        ]);
        Education::create([
            'institution' => 'SMKN 1 Kota Sukabumi', 
            'program' => 'Teknik Komputer dan Jaringan', 
            'year' => '2019 – 2022'
        ]);
        Education::create([
            'institution' => 'SMPN 1 Cisaat', 
            'year' => '2016 – 2019'
        ]);

        // Certificates
        Certificate::create(['name' => 'Junior Photographer — BNSP']);
        Certificate::create(['name' => 'Video Editor — BNSP']);
        Certificate::create(['name' => 'Camera Operator — BNSP']);
    }
}