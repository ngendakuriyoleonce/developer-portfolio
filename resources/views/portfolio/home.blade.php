<x-portfolio-layout>
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center bg-gradient-to-br from-gray-50 to-blue-50 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">
                    Hi, I'm <span class="text-blue-600 dark:text-blue-400">{{ $profile->user->name ?? 'Developer' }}</span>
                </h1>
                <h2 class="text-2xl md:text-3xl text-gray-600 dark:text-gray-400 mb-6">
                    {{ $profile->title ?? 'Full-Stack Developer' }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto mb-8">
                    {{ $profile->short_bio ?? 'Building modern, secure and scalable web applications.' }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('projects') }}" class="btn-primary">View Projects</a>
                    <a href="{{ route('resume') }}" class="btn-outline">Download CV</a>
                </div>
                <div class="flex justify-center space-x-4 mt-8">
                    @foreach(\App\Models\SocialLink::where('is_active', true)->orderBy('order_column')->get() as $link)
                        <a href="{{ $link->url }}" target="_blank" class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                            {{ ucfirst($link->platform) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Preview -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="section-title text-center">My Skills</h2>
            <p class="section-subtitle text-center">Technologies I work with</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($skillCategories as $category)
                    <div class="card text-center">
                        <h3 class="text-xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ $category->name }}</h3>
                        <div class="flex flex-wrap justify-center gap-2 mt-4">
                            @foreach($category->skills as $skill)
                                <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full text-sm">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="py-20 bg-gray-100 dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="section-title text-center">Featured Projects</h2>
            <p class="section-subtitle text-center">Some of my recent work</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <div class="card">
                        <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $project->short_description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->technologies ?? [] as $tech)
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded text-xs">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <a href="{{ route('projects.show', $project->slug) }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">View Details →</a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('projects') }}" class="btn-outline">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="section-title text-center">Services</h2>
            <p class="section-subtitle text-center">What I can do for you</p>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="card text-center">
                        <div class="text-4xl text-blue-600 dark:text-blue-400 mb-4">
                            @if($service->icon === 'code') &lt;/&gt;
                            @elseif($service->icon === 'globe') 🌐
                            @elseif($service->icon === 'database') 🗄️
                            @elseif($service->icon === 'server') ⚙️
                            @elseif($service->icon === 'shield') 🛡️
                            @elseif($service->icon === 'wrench') 🔧
                            @else 🔹
                            @endif
                        </div>
                        <h3 class="text-xl font-bold mb-2">{{ $service->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ Str::limit($service->description, 120) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Let's Work Together</h2>
            <p class="text-lg mb-8 opacity-90">I'm currently open to Full-Stack Laravel / Web development opportunities.</p>
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 font-semibold py-3 px-8 rounded-lg hover:bg-gray-100 transition-all duration-300">Get In Touch</a>
        </div>
    </section>
</x-portfolio-layout>
