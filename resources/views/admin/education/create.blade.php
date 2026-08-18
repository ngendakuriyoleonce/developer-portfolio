<x-admin-layout title="Add Education">
    <div class="max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Education</h1>

        <form action="{{ route('admin.education.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            @csrf

            <div>
                <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Institution <span class="text-red-500">*</span></label>
                <input type="text" id="institution" name="institution" value="{{ old('institution') }}" required class="input-field w-full" placeholder="e.g. University of Oxford">
                @error('institution') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="degree" class="block text-sm font-medium text-gray-700 mb-1">Degree <span class="text-red-500">*</span></label>
                    <input type="text" id="degree" name="degree" value="{{ old('degree') }}" required class="input-field w-full" placeholder="e.g. Bachelor of Science">
                    @error('degree') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="field_of_study" class="block text-sm font-medium text-gray-700 mb-1">Field of Study <span class="text-red-500">*</span></label>
                    <input type="text" id="field_of_study" name="field_of_study" value="{{ old('field_of_study') }}" required class="input-field w-full" placeholder="e.g. Computer Science">
                    @error('field_of_study') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="input-field w-full" placeholder="Optional description of your studies...">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Start Date <span class="text-red-500">*</span></label>
                    <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required class="input-field w-full">
                    @error('start_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                    <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="input-field w-full">
                    @error('end_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center gap-2" x-data="{ isCurrent: {{ old('is_current') ? 'true' : 'false' }} }">
                <input type="hidden" name="is_current" value="0">
                <input type="checkbox" id="is_current" name="is_current" value="1" x-model="isCurrent" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_current" class="text-sm text-gray-700">Currently studying here</label>
            </div>

            <div>
                <label for="order_column" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" id="order_column" name="order_column" value="{{ old('order_column', 0) }}" class="input-field w-full sm:w-32" min="0">
                @error('order_column') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-3">
                <button type="submit" class="btn-primary">Save Education</button>
                <a href="{{ route('admin.education.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-admin-layout>
