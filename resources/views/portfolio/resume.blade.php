<x-portfolio-layout title="Resume">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="section-title">Resume</h1>
                <button onclick="window.print()" class="btn-outline text-sm py-2 px-4 no-print">Print / Save PDF</button>
            </div>

            <!-- Header -->
            <div class="card mb-6">
                <h2 class="text-3xl font-bold">{{ $profile->user->name ?? 'Developer' }}</h2>
                <p class="text-xl text-blue-600 dark:text-blue-400">{{ $profile->title }}</p>
                <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-500">
                    @if($profile->email) <span>{{ $profile->email }}</span> @endif
                    @if($profile->phone) <span>{{ $profile->phone }}</span> @endif
                    @if($profile->location) <span>{{ $profile->location }}</span> @endif
                </div>
            </div>

            <!-- Skills -->
            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4">Skills</h2>
                @foreach($skillCategories as $category)
                    <div class="mb-4">
                        <h3 class="font-bold text-blue-600 dark:text-blue-400 mb-2">{{ $category->name }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($category->skills as $skill)
                                <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full text-sm">{{ $skill->name }} ({{ $skill->proficiency }}%)</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Experience -->
            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4">Experience</h2>
                @foreach($experiences as $exp)
                    <div class="mb-4 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700 pb-4' : '' }}">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold">{{ $exp->job_title }}</h3>
                                <p class="text-blue-600 dark:text-blue-400">{{ $exp->company }} · {{ $exp->location }}</p>
                            </div>
                            <span class="text-sm text-gray-500">{{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Present' : $exp->end_date?->format('M Y') }}</span>
                        </div>
                        @if($exp->description)
                            <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm">{{ $exp->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Education -->
            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4">Education</h2>
                @foreach($educations as $edu)
                    <div class="mb-4 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700 pb-4' : '' }}">
                        <h3 class="font-bold">{{ $edu->degree }} in {{ $edu->field_of_study }}</h3>
                        <p class="text-blue-600 dark:text-blue-400">{{ $edu->institution }}</p>
                        <p class="text-sm text-gray-500">{{ $edu->start_date->format('M Y') }} - {{ $edu->is_current ? 'Present' : $edu->end_date?->format('M Y') }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Projects -->
            @if($projects->count())
                <div class="card mb-6">
                    <h2 class="text-2xl font-bold mb-4">Featured Projects</h2>
                    @foreach($projects as $project)
                        <div class="mb-4 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700 pb-4' : '' }}">
                            <h3 class="font-bold">{{ $project->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">{{ $project->short_description }}</p>
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach($project->technologies ?? [] as $tech)
                                    <span class="px-2 py-0.5 bg-gray-100 dark:bg-gray-700 rounded text-xs">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-portfolio-layout>
