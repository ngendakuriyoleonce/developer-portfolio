<x-portfolio-layout title="Skills">
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Skills & Expertise</h1>
            <p class="section-subtitle text-center">Technologies and tools I use to build great products</p>

            <div class="space-y-12">
                @foreach($categories as $category)
                    <div>
                        <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-6 flex items-center gap-2">
                            {{ $category->name }}
                        </h2>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($category->skills as $skill)
                                <div class="card">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="font-semibold">{{ $skill->name }}</span>
                                        <span class="text-sm text-blue-600 dark:text-blue-400">{{ $skill->proficiency }}%</span>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="skill-bar-fill" style="width: {{ $skill->proficiency }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-portfolio-layout>
