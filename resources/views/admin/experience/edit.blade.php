<x-admin-layout title="Edit Experience">
    <div class="mb-6">
        <a href="{{ route('admin.experience.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Experience</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Edit Experience</h1>
            </div>

            <form method="POST" action="{{ route('admin.experience.update', $experience) }}" class="space-y-6 p-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="job_title" class="mb-1 block text-sm font-medium text-gray-700">Job Title *</label>
                    <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $experience->job_title) }}" required class="input-field">
                    @error('job_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="company" class="mb-1 block text-sm font-medium text-gray-700">Company *</label>
                    <input type="text" id="company" name="company" value="{{ old('company', $experience->company) }}" required class="input-field">
                    @error('company')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="location" class="mb-1 block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $experience->location) }}" class="input-field">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" class="input-field">{{ old('description', $experience->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="responsibilities" class="mb-1 block text-sm font-medium text-gray-700">Responsibilities</label>
                    <textarea id="responsibilities" name="responsibilities" rows="4" class="input-field">{{ old('responsibilities', $experience->responsibilities) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Enter one responsibility per line.</p>
                    @error('responsibilities')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="technologies" class="mb-1 block text-sm font-medium text-gray-700">Technologies</label>
                    <input type="text" id="technologies" name="technologies" value="{{ old('technologies', $experience->technologies) }}" class="input-field">
                    <p class="mt-1 text-xs text-gray-500">Comma separated list of technologies used.</p>
                    @error('technologies')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="start_date" class="mb-1 block text-sm font-medium text-gray-700">Start Date *</label>
                        <input type="date" id="start_date" name="start_date" value="{{ old('start_date', $experience->start_date ? \Carbon\Carbon::parse($experience->start_date)->format('Y-m-d') : '') }}" required class="input-field">
                        @error('start_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ isCurrent: {{ $experience->is_current ? 'true' : 'false' }} }">
                        <label for="end_date" class="mb-1 block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" name="end_date" value="{{ old('end_date', $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('Y-m-d') : '') }}" class="input-field" :disabled="isCurrent" :class="isCurrent && 'bg-gray-100'">
                        @error('end_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center">
                        <input type="hidden" name="is_current" value="0">
                        <input type="checkbox" id="is_current" name="is_current" value="1" {{ old('is_current', $experience->is_current) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="is_current" class="ml-2 text-sm text-gray-700">I currently work here</label>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $experience->is_published) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
                </div>

                <div>
                    <label for="order_column" class="mb-1 block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" id="order_column" name="order_column" value="{{ old('order_column', $experience->order_column) }}" min="0" class="input-field">
                    @error('order_column')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.experience.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="btn-primary">Update Experience</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
