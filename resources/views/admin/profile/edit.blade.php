<x-admin-layout :title="'Edit Profile'">
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Basic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">Basic Information</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Your personal and contact details.</p>
            </div>
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Title <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title', $profile->title ?? '') }}" required
                        class="input-field @error('title') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="e.g. Full Stack Developer">
                    @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
                        class="input-field @error('phone') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="+1 234 567 890">
                    @error('phone')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
                        class="input-field @error('email') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $profile->location ?? '') }}"
                        class="input-field @error('location') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="City, Country">
                    @error('location')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Bio -->
                <div class="md:col-span-2">
                    <label for="short_bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Short Bio</label>
                    <input type="text" id="short_bio" name="short_bio" value="{{ old('short_bio', $profile->short_bio ?? '') }}"
                        class="input-field @error('short_bio') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="A brief one-liner about yourself" maxlength="500">
                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Max 500 characters</p>
                    @error('short_bio')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Upload -->
                <div class="md:col-span-2">
                    <label for="photo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Profile Photo</label>
                    <div class="flex items-center gap-4">
                        @if (!empty($profile->photo))
                            <img src="{{ asset('storage/' . $profile->photo) }}" alt="Current photo" class="w-16 h-16 rounded-full object-cover border-2 border-gray-200 dark:border-gray-600">
                        @else
                            <div class="w-16 h-16 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-500">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" id="photo" name="photo" accept="image/*"
                                class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 dark:file:bg-blue-900/30 file:text-blue-700 dark:file:text-blue-400 hover:file:bg-blue-100 dark:hover:file:bg-blue-900/50">
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">JPG, PNG up to 2MB</p>
                        </div>
                    </div>
                    @error('photo')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Biography -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-5 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">Biography</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Tell visitors about yourself in detail.</p>
            </div>
            <div class="p-5 space-y-5">
                <!-- Bio -->
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Full Biography</label>
                    <textarea id="bio" name="bio" rows="5"
                        class="input-field @error('bio') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="Tell your full story...">{{ old('bio', $profile->bio ?? '') }}</textarea>
                    @error('bio')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Career Objective -->
                <div>
                    <label for="career_objective" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Career Objective</label>
                    <textarea id="career_objective" name="career_objective" rows="3"
                        class="input-field @error('career_objective') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="What are your career goals?">{{ old('career_objective', $profile->career_objective ?? '') }}</textarea>
                    @error('career_objective')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Developer Journey -->
                <div>
                    <label for="developer_journey" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Developer Journey</label>
                    <textarea id="developer_journey" name="developer_journey" rows="3"
                        class="input-field @error('developer_journey') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="How did you become a developer?">{{ old('developer_journey', $profile->developer_journey ?? '') }}</textarea>
                    @error('developer_journey')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Focus -->
                <div>
                    <label for="current_focus" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Current Focus</label>
                    <textarea id="current_focus" name="current_focus" rows="3"
                        class="input-field @error('current_focus') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="What are you currently working on or learning?">{{ old('current_focus', $profile->current_focus ?? '') }}</textarea>
                    @error('current_focus')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Personal Statement -->
                <div>
                    <label for="personal_statement" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Personal Statement</label>
                    <textarea id="personal_statement" name="personal_statement" rows="3"
                        class="input-field @error('personal_statement') border-red-500 focus:ring-red-500 @enderror"
                        placeholder="A personal statement or philosophy...">{{ old('personal_statement', $profile->personal_statement ?? '') }}</textarea>
                    @error('personal_statement')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                Save Profile
            </button>
        </div>
    </form>
</x-admin-layout>
