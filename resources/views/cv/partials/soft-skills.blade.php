<section class="py-16 bg-gray-50 dark:bg-gray-900/50 rounded-3xl my-16">
    <h2 class="text-3xl font-bold text-center mb-12 text-light-cyan dark:text-dark-yellow">Soft Skills</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 px-6">
        @foreach(App\Models\Skill::where('type','soft')->get() as $skill)
        @php $icons = ['Communication','Teamwork','Brain','Star','Clock','Rocket','Lightbulb','Target']; @endphp
        @php $icon = ['Communication','Teamwork','Brain','Star','Clock','Rocket','Lightbulb','Target'][array_rand($icons)]; @endphp
        <div class="bg-white dark:bg-gray-900 rounded-2xl p-6 text-center shadow-lg hover:shadow-2xl transition hover:-translate-y-3 border border-gray-200 dark:border-gray-800">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-light-cyan/20 dark:bg-dark-yellow/30 flex items-center justify-center text-3xl">
                {{ $icon == 'Communication' ? 'Communication' : ($icon == 'Teamwork' ? 'Teamwork' : ($icon == 'Brain' ? 'Brain' : ($icon == 'Star' ? 'Star' : ($icon == 'Clock' ? 'Clock' : ($icon == 'Rocket' ? 'Rocket' : ($icon == 'Lightbulb' ? 'Lightbulb' : 'Target')))))) }}
            </div>
            <h3 class="font-bold text-lg">{{ $skill->name }}</h3>
            <div class="mt-4 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                <div class="bg-gradient-to-r from-light-cyan to-cyan-600 dark:from-dark-yellow dark:to-yellow-600 h-2 rounded-full w-full"></div>
            </div>
        </div>
        @endforeach
    </div>
</section>