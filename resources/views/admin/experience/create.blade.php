<x-admin-layout title="Create Experience">
    <div class="mb-6">
        <a href="{{ route('admin.experience.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Experience</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Create New Experience</h1>
            </div>

            <form method="POST" action="{{ route('admin.experience.store') }}" class="space-y-6 p-6">
                @csrf

                <div>
                    <label for="job_title" class="mb-1 block text-sm font-medium text-gray-700">Job Title *</label>
                    <input type="text" id="job_title" name="job_title" value="{{ old('job_title') }}" required class="input-field" placeholder="e.g. Full-Stack Developer">
                    @error('job_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company" class="mb-1 block text-sm font-medium text-gray-700">Company *</label>
                    <input type="text" id="company" name="company" value="{{ old('company') }}" required class="input-field" placeholder="e.g. Acme Corp">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="mb-1 block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}" class="input-field" placeholder="e.g. New York, NY / Remote">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="input-field" placeholder="Brief description of your role...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="responsibilities" class="mb-1 block text-sm font-medium text-gray-700">Responsibilities</label>
                    <textarea id="responsibilities" name="responsibilities" rows="4" class="input-field" placeholder="One responsibility per line...">{{ old('responsibilities') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Enter one responsibility per line.</p>
                    @error('responsibilities')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="technologies" class="mb-1 block text-sm font-medium text-gray-700">Technologies</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}" class="input-field" placeholder="e.g. Laravel, Vue.js, MySQL">
                    <p class="mt-1 text-xs text-gray-500">Comma separated list of technologies used.</p>
                    @error('technologies')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="mb-1 block text-sm font-medium text-gray-700">Start Date *</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required class="input-field">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ isCurrent: false }">
                        <label for="end_date" class="mb-1 block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="input-field" :disabled="isCurrent" :class="isCurrent && 'bg-gray-100'">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div x-data="{ isCurrent: false }">
                    <div class="flex items-center">
                        <input type="hidden" name="is_current" value="0">
                        <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current') ? 'checked' : '' }} x-model="isCurrent" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="is_current" class="ml-2 text-sm text-gray-700">I currently work here</label>
                    </div>
                    <script>
                        document.addEventListener('alpine:init', () => {
                            Alpine.data('currentJob', () => ({
                                isCurrent: false,
                                init() {
                                    this.$watch('isCurrent', (value) => {
                                        const endDate = document.getElementById('end_date');
                                        if (value) {
                                            endDate.value = '';
                                        }
                                    });
                                }
                            }));
                        });
                    </script>
                </div>

                <div class="flex items-center">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
                </div>

                <div>
                    <label for="order_column" class="mb-1 block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" id="order_column" name="order_column" value="{{ old('order_column', 0) }}" min="0" class="input-field">
                    @error('order_column')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Create Experience</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
