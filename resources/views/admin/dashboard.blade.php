@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Dashboard</h1>
    <p class="text-gray-600 dark:text-gray-400 mt-2">Welcome to your admin panel - Manage your CV content easily</p>
</div>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 text-cyan-500">
                <i class="bi bi-star text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Skills</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['skills'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30 text-green-500">
                <i class="bi bi-folder text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Projects</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['projects'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-blue-500">
                <i class="bi bi-mortarboard text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Education</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['education'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-900/30 text-purple-500">
                <i class="bi bi-award text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Certificates</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['certificates'] }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="{{ route('admin.profile') }}" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200 cursor-pointer hover:border-cyan-200 dark:hover:border-cyan-800">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-cyan-100 dark:bg-cyan-900/30 text-cyan-500 group-hover:bg-cyan-500 group-hover:text-white transition duration-200">
                    <i class="bi bi-person text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Profile</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Update personal information</p>
                </div>
            </div>
            <i class="bi bi-arrow-right text-gray-400 group-hover:text-cyan-500 text-xl transition duration-200"></i>
        </div>
    </a>

    <a href="{{ route('admin.skills.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200 cursor-pointer hover:border-green-200 dark:hover:border-green-800">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30 text-green-500 group-hover:bg-green-500 group-hover:text-white transition duration-200">
                    <i class="bi bi-star text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Skills</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Manage skills & tools</p>
                </div>
            </div>
            <i class="bi bi-arrow-right text-gray-400 group-hover:text-green-500 text-xl transition duration-200"></i>
        </div>
    </a>

    <a href="{{ route('admin.projects.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200 cursor-pointer hover:border-blue-200 dark:hover:border-blue-800">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-blue-500 group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                    <i class="bi bi-folder text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Projects</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Manage portfolio projects</p>
                </div>
            </div>
            <i class="bi bi-arrow-right text-gray-400 group-hover:text-blue-500 text-xl transition duration-200"></i>
        </div>
    </a>

    <a href="{{ route('admin.education.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200 cursor-pointer hover:border-purple-200 dark:hover:border-purple-800">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-purple-100 dark:bg-purple-900/30 text-purple-500 group-hover:bg-purple-500 group-hover:text-white transition duration-200">
                    <i class="bi bi-mortarboard text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Education</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Manage education history</p>
                </div>
            </div>
            <i class="bi bi-arrow-right text-gray-400 group-hover:text-purple-500 text-xl transition duration-200"></i>
        </div>
    </a>

    <a href="{{ route('admin.certificates.index') }}" class="group bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition duration-200 cursor-pointer hover:border-yellow-200 dark:hover:border-yellow-800">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-yellow-100 dark:bg-yellow-900/30 text-yellow-500 group-hover:bg-yellow-500 group-hover:text-white transition duration-200">
                    <i class="bi bi-award text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Certificates</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Manage certificates</p>
                </div>
            </div>
            <i class="bi bi-arrow-right text-gray-400 group-hover:text-yellow-500 text-xl transition duration-200"></i>
        </div>
    </a>
</div>

<!-- Recent Activity -->
<div class="mt-12">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Quick Guide</h2>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Getting Started</h3>
                <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                    <li class="flex items-center">
                        <i class="bi bi-check-circle text-cyan-500 mr-3"></i>
                        <span>Start by updating your profile information</span>
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-check-circle text-cyan-500 mr-3"></i>
                        <span>Add your skills and expertise</span>
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-check-circle text-cyan-500 mr-3"></i>
                        <span>Showcase your projects with images</span>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Tips</h3>
                <ul class="space-y-3 text-gray-600 dark:text-gray-400">
                    <li class="flex items-center">
                        <i class="bi bi-lightbulb text-yellow-500 mr-3"></i>
                        <span>Keep your information up to date</span>
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-lightbulb text-yellow-500 mr-3"></i>
                        <span>Use high-quality images for projects</span>
                    </li>
                    <li class="flex items-center">
                        <i class="bi bi-lightbulb text-yellow-500 mr-3"></i>
                        <span>Regularly update your achievements</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection