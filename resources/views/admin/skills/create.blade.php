<x-admin-layout title="Create Skill">
    <div class="mb-6">
        <a href="{{ route('admin.skills.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Skills</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Create New Skill</h1>
            </div>

            <form method="POST" action="{{ route('admin.skills.store') }}" class="space-y-6 p-6">
                @csrf

                <div>
                    <label for="category_id" class="mb-1 block text-sm font-medium text-gray-700">Category</label>
                    <select id="category_id" name="category_id" class="input-field">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="input-field" placeholder="e.g. Laravel, JavaScript">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="proficiency" class="mb-1 block text-sm font-medium text-gray-700">Proficiency (0–100)</label>
                    <input type="number" id="proficiency" name="proficiency" value="{{ old('proficiency', 0) }}" min="0" max="100" class="input-field">
                    @error('proficiency')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order_column" class="mb-1 block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" id="order_column" name="order_column" value="{{ old('order_column', 0) }}" min="0" class="input-field">
                    @error('order_column')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Create Skill</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
