<x-portfolio-layout title="Experience">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Work Experience</h1>
            <p class="section-subtitle text-center">My professional journey</p>

            <div class="relative">
                <div class="absolute left-0 md:left-1/2 transform md:-translate-x-px h-full w-0.5 bg-blue-200 dark:bg-blue-800"></div>

                @foreach($experiences as $index => $exp)
                    <div class="relative mb-8 {{ $index % 2 === 0 ? 'md:pr-1/2' : 'md:pl-1/2' }}">
                        <div class="card ml-8 md:ml-0">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="w-3 h-3 bg-blue-600 rounded-full absolute -left-4 md:left-1/2 md:-translate-x-1/2 mt-1"></span>
                                <span class="text-sm text-blue-600 dark:text-blue-400 font-semibold">
                                    {{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Present' : $exp->end_date?->format('M Y') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold">{{ $exp->job_title }}</h3>
                            <p class="text-blue-600 dark:text-blue-400 font-semibold">{{ $exp->company }}</p>
                            @if($exp->location)
                                <p class="text-gray-500 dark:text-gray-500 text-sm mb-2">{{ $exp->location }}</p>
                            @endif
                            <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $exp->description }}</p>

                            @if($exp->responsibilities)
                                <div class="mb-4">
                                    <h4 class="font-semibold mb-2">Responsibilities:</h4>
                                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-1">
                                        @foreach($exp->responsibilities as $r)
                                            <li>{{ $r }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if($exp->technologies)
                                <div class="flex flex-wrap gap-2">
                                    @foreach($exp->technologies as $tech)
                                        <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded text-xs">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-portfolio-layout>
