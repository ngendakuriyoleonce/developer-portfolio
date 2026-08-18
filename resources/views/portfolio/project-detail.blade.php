<x-portfolio-layout title="{{ $project->title }}">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('projects') }}" class="text-blue-600 dark:text-blue-400 hover:underline mb-8 inline-block">← Back to Projects</a>

            <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>

            @if($project->thumbnail)
                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-64 md:h-96 object-cover rounded-xl mb-8">
            @else
                <div class="w-full h-64 md:h-96 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl mb-8 flex items-center justify-center text-white text-6xl font-bold">
                    {{ substr($project->title, 0, 1) }}
                </div>
            @endif

            <div class="flex flex-wrap gap-2 mb-8">
                @foreach($project->technologies ?? [] as $tech)
                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm">{{ $tech }}</span>
                @endforeach
            </div>

            <div class="space-y-8">
                <div class="card">
                    <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">About This Project</h2>
                    <div class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">{{ $project->full_description }}</div>
                </div>

                @if($project->problem)
                    <div class="card">
                        <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Problem</h2>
                        <div class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">{{ $project->problem }}</div>
                    </div>
                @endif

                @if($project->solution)
                    <div class="card">
                        <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Solution</h2>
                        <div class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">{{ $project->solution }}</div>
                    </div>
                @endif

                @if($project->features)
                    <div class="card">
                        <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Features</h2>
                        <ul class="space-y-2">
                            @foreach($project->features as $feature)
                                <li class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="flex gap-4">
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="btn-outline">View on GitHub</a>
                    @endif
                    @if($project->live_demo_url)
                        <a href="{{ $project->live_demo_url }}" target="_blank" class="btn-primary">Live Demo</a>
                    @endif
                </div>
            </div>

            @if($relatedProjects->count())
                <div class="mt-16">
                    <h2 class="text-2xl font-bold mb-6">Related Projects</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach($relatedProjects as $related)
                            <div class="card">
                                <h3 class="font-bold mb-2">{{ $related->title }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">{{ $related->short_description }}</p>
                                <a href="{{ route('projects.show', $related->slug) }}" class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:underline">View →</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-portfolio-layout>
