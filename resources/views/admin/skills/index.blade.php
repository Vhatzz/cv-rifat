@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-8 action-buttons">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Skills Management</h1>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Manage your skills, soft skills, and tools</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-lg transition duration-200 flex items-center shadow-md">
        <i class="bi bi-plus-circle mr-2"></i> Add New Skill
    </a>
</div>

<!-- Skills Tabs -->
<div class="mb-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4">
    <div class="border-b border-gray-200 dark:border-gray-700">
        <nav class="-mb-px flex space-x-8" role="tablist" aria-label="Skill categories">
            <button onclick="showTab(event, 'all')" data-type="all" class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap text-cyan-500 border-cyan-500" role="tab" aria-selected="true">
                All Skills ({{ $skills->count() }})
            </button>
            <button onclick="showTab(event, 'hard')" data-type="hard" class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300" role="tab" aria-selected="false">
                Hard Skills ({{ $skills->where('type', 'hard')->count() }})
            </button>
            <button onclick="showTab(event, 'soft')" data-type="soft" class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300" role="tab" aria-selected="false">
                Soft Skills ({{ $skills->where('type', 'soft')->count() }})
            </button>
            <button onclick="showTab(event, 'tool')" data-type="tool" class="tab-button py-4 px-1 border-b-2 font-medium text-sm whitespace-nowrap text-gray-500 dark:text-gray-400 border-transparent hover:text-gray-700 dark:hover:text-gray-300" role="tab" aria-selected="false">
                Tools ({{ $skills->where('type', 'tool')->count() }})
            </button>
        </nav>
    </div>
</div>

<!-- Skills Table -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full table-auto">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Skill Name</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Type</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Level</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 dark:text-gray-300">Logo</th>
                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($skills as $skill)
                <tr class="skill-row hover:bg-gray-50 dark:hover:bg-gray-700 transition" data-type="{{ $skill->type }}">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if($skill->logo_url)
                                <img src="{{ $skill->logo_url }}" alt="{{ $skill->name }}" class="w-8 h-8 rounded mr-3 object-contain">
                            @else
                                <div class="w-8 h-8 rounded mr-3 bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                                    <i class="bi bi-patch-question"></i>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $skill->name }}</div>
                                @if($skill->type === 'tool' && $skill->logo_url)
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Tool</div>
                                @endif
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            {{ ucfirst($skill->type) }}
                        </span>
                    </td>

                    <td class="px-6 py-4">
                        @if($skill->level)
                            <span class="text-sm text-gray-700 dark:text-gray-300">{{ $skill->level }}</span>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        @if($skill->logo_url)
                            <div class="w-10 h-10 rounded bg-gray-100 dark:bg-gray-600 flex items-center justify-center">
                                <img src="{{ $skill->logo_url }}" alt="{{ $skill->name }}" class="w-6 h-6 object-contain">
                            </div>
                        @else
                            <span class="text-gray-400 text-sm">No logo</span>
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center space-x-3">
                            <a href="{{ route('admin.skills.edit', $skill) }}"
                               class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 flex items-center px-3 py-1 rounded border border-blue-200 dark:border-blue-800 hover:bg-blue-50 dark:hover:bg-blue-900/30">
                                <i class="bi bi-pencil-square mr-2"></i> Edit
                            </a>

                            <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this skill?')"
                                        class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition duration-200 flex items-center px-3 py-1 rounded border border-red-200 dark:border-red-800 hover:bg-red-50 dark:hover:bg-red-900/30">
                                    <i class="bi bi-trash mr-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($skills->isEmpty())
    <div class="text-center py-12">
        <i class="bi bi-star text-4xl text-gray-400 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No skills added yet</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-4">Start by adding your first skill to showcase your expertise.</p>
        <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center bg-cyan-500 hover:bg-cyan-600 text-white px-4 py-2 rounded-lg transition duration-200">
            <i class="bi bi-plus-circle mr-2"></i>Add Your First Skill
        </a>
    </div>
    @endif
</div>

<!-- Tab scripting (fixed: explicit event parameter, better selection handling) -->
<script>
function showTab(event, type) {
    // determine the button element (supports being called from .click())
    const targetBtn = event ? (event.currentTarget || event.target) : document.querySelector(`.tab-button[data-type="${type}"]`);
    if (!targetBtn) return;

    // remove active state from all tabs
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('text-cyan-500', 'border-cyan-500');
        button.classList.add('text-gray-500', 'dark:text-gray-400', 'border-transparent');
        button.setAttribute('aria-selected', 'false');
    });

    // set active state on clicked tab
    targetBtn.classList.add('text-cyan-500', 'border-cyan-500');
    targetBtn.classList.remove('text-gray-500', 'dark:text-gray-400', 'border-transparent');
    targetBtn.setAttribute('aria-selected', 'true');

    // show/hide rows by data-type
    document.querySelectorAll('.skill-row').forEach(row => {
        const rowType = row.dataset.type;
        if (type === 'all' || rowType === type) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Initialize: click the first tab (All Skills) to set initial state
document.addEventListener('DOMContentLoaded', function() {
    const firstTab = document.querySelector('.tab-button');
    if (firstTab) firstTab.click();
});
</script>
@endsection
