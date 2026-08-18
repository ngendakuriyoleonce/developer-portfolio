<x-portfolio-layout title="Education">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Education</h1>
            <p class="section-subtitle text-center">My academic background</p>

            <div class="space-y-6">
                @foreach($educations as $edu)
                    <div class="card">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-sm text-blue-600 dark:text-blue-400 font-semibold">
                                {{ $edu->start_date->format('M Y') }} - {{ $edu->is_current ? 'Present' : $edu->end_date?->format('M Y') }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold">{{ $edu->degree }} in {{ $edu->field_of_study }}</h3>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold">{{ $edu->institution }}</p>
                        @if($edu->description)
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $edu->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-portfolio-layout>
