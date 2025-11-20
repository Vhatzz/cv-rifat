<!-- Education — Timeline Modern & Mobile Friendly -->
<section id="education" class="py-12 sm:py-16">
    <h2 class="text-3xl sm:text-4xl font-bold text-center mb-8 sm:mb-12 text-light-cyan dark:text-dark-yellow">Pendidikan</h2>
    <div class="relative max-w-3xl mx-auto">
        <!-- Garis Timeline (sembunyi di mobile jika terlalu rumit) -->
        <div class="absolute left-4 sm:left-1/2 top-0 bottom-0 w-1 bg-light-cyan/30 dark:bg-dark-yellow/30 sm:block hidden"></div>

        @foreach($education as $index => $edu)
            <div class="relative mb-10 flex flex-col sm:flex-row {{ $index % 2 == 0 ? 'sm:justify-start' : 'sm:flex-row-reverse sm:justify-end' }}">
                <!-- Titik Timeline -->
                <div class="absolute left-4 sm:left-1/2 transform -translate-x-1/2 w-4 h-4 bg-light-cyan dark:bg-dark-yellow rounded-full border-4 border-white dark:border-gray-900 shadow-md z-10 sm:block hidden"></div>

                <!-- Card -->
                <div class="w-full sm:w-1/2 p-4 sm:p-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700">
                    <h3 class="text-xl sm:text-2xl font-bold mb-2">{{ $edu->institution }}</h3>
                    @if($edu->program)
                        <p class="text-light-cyan dark:text-dark-yellow font-semibold mb-2">{{ $edu->program }}</p>
                    @endif
                    <p class="text-sm text-gray-600 dark:text-gray-400 flex items-center gap-2 justify-center sm:justify-start">
                        <i class="bi bi-calendar-fill text-light-cyan dark:text-dark-yellow"></i> {{ $edu->year }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>