<x-portfolio-layout title="Projects">
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">My Projects</h1>
            <p class="section-subtitle text-center">A collection of my work</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="card">
                        @if($project->thumbnail)
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover rounded-lg mb-4">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg mb-4 flex items-center justify-center text-white text-4xl font-bold">
                                {{ substr($project->title, 0, 1) }}
                            </div>
                        @endif
                        <div class="flex items-center gap-2 mb-2">
                            <h3 class="text-xl font-bold">{{ $project->title }}</h3>
                            @if($project->is_featured)
                                <span class="px-2 py-0.5 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded text-xs font-semibold">Featured</span>
                            @endif
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $project->short_description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->technologies ?? [] as $tech)
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded text-xs">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="flex gap-3">
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="text-sm text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">GitHub</a>
                            @endif
                            @if($project->live_demo_url)
                                <a href="{{ $project->live_demo_url }}" target="_blank" class="text-sm text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">Live Demo</a>
                            @endif
                            <a href="{{ route('projects.show', $project->slug) }}" class="text-sm text-blue-600 dark:text-blue-400 font-semibold hover:underline">Details →</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 dark:text-gray-400 text-lg">No projects available yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-portfolio-layout>
