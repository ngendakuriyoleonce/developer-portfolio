<x-admin-layout title="Create Project">
    <div class="mb-6">
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Projects</a>
    </div>

    <div class="mx-auto max-w-3xl">
        <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            {{-- Section 1: Basic Info --}}
            <div class="rounded-lg bg-white shadow">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Basic Info</h2>
                </div>
                <div class="space-y-6 p-6">
                    <div>
                        <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required class="input-field" placeholder="Project title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="short_description" class="mb-1 block text-sm font-medium text-gray-700">Short Description</label>
                        <input type="text" id="short_description" name="short_description" value="{{ old('short_description') }}" required class="input-field" placeholder="Brief summary of the project">
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="full_description" class="mb-1 block text-sm font-medium text-gray-700">Full Description</label>
                        <textarea id="full_description" name="full_description" required rows="6" class="input-field" placeholder="Detailed description of the project">{{ old('full_description') }}</textarea>
                        @error('full_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="thumbnail" class="mb-1 block text-sm font-medium text-gray-700">Thumbnail</label>
                        <input type="file" id="thumbnail" name="thumbnail" accept="image/*" class="input-field">
                        @error('thumbnail')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Section 2: Details --}}
            <div class="rounded-lg bg-white shadow">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Details</h2>
                </div>
                <div class="space-y-6 p-6">
                    <div>
                        <label for="problem" class="mb-1 block text-sm font-medium text-gray-700">Problem</label>
                        <textarea id="problem" name="problem" rows="4" class="input-field" placeholder="What problem does this project solve?">{{ old('problem') }}</textarea>
                        @error('problem')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="solution" class="mb-1 block text-sm font-medium text-gray-700">Solution</label>
                        <textarea id="solution" name="solution" rows="4" class="input-field" placeholder="How was the problem solved?">{{ old('solution') }}</textarea>
                        @error('solution')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="features" class="mb-1 block text-sm font-medium text-gray-700">Features</label>
                        <textarea id="features" name="features" rows="4" class="input-field" placeholder="One feature per line">{{ old('features') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">One per line.</p>
                        @error('features')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="technologies" class="mb-1 block text-sm font-medium text-gray-700">Technologies</label>
                        <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}" class="input-field" placeholder="Laravel, Vue.js, MySQL">
                        <p class="mt-1 text-xs text-gray-500">Comma separated.</p>
                        @error('technologies')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Section 3: Links & Dates --}}
            <div class="rounded-lg bg-white shadow">
                <div class="border-b border-gray-200 px-6 py-4">
                    <h2 class="text-lg font-semibold text-gray-900">Links & Dates</h2>
                </div>
                <div class="space-y-6 p-6">
                    <div>
                        <label for="github_url" class="mb-1 block text-sm font-medium text-gray-700">GitHub URL</label>
                        <input type="url" id="github_url" name="github_url" value="{{ old('github_url') }}" class="input-field" placeholder="https://github.com/...">
                        @error('github_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="live_demo_url" class="mb-1 block text-sm font-medium text-gray-700">Live Demo URL</label>
                        <input type="url" id="live_demo_url" name="live_demo_url" value="{{ old('live_demo_url') }}" class="input-field" placeholder="https://...">
                        @error('live_demo_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="start_date" class="mb-1 block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="input-field">
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="completion_date" class="mb-1 block text-sm font-medium text-gray-700">Completion Date</label>
                            <input type="date" id="completion_date" name="completion_date" value="{{ old('completion_date') }}" class="input-field">
                            @error('completion_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center">
                            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="is_featured" class="ml-2 text-sm text-gray-700">Featured</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary">Create Project</button>
            </div>
        </form>
    </div>
</x-admin-layout>
