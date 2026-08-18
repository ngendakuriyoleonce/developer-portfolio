<x-portfolio-layout title="About">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">About Me</h1>

            <div class="card mb-8">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Professional Biography</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed whitespace-pre-line">{{ $profile->bio }}</p>
            </div>

            <div class="card mb-8">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Career Objective</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $profile->career_objective }}</p>
            </div>

            <div class="card mb-8">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Developer Journey</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $profile->developer_journey }}</p>
            </div>

            <div class="card mb-8">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Current Focus</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">{{ $profile->current_focus }}</p>
            </div>

            <div class="card">
                <h2 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Personal Statement</h2>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed italic">"{{ $profile->personal_statement }}"</p>
            </div>
        </div>
    </section>
</x-portfolio-layout>
