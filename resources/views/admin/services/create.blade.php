<x-admin-layout title="Create Service">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Services</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Create New Service</h1>
            </div>

            <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-6 p-6">
                @csrf

                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="input-field" placeholder="e.g. Web Development">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" required class="input-field" placeholder="Describe the service...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="mb-1 block text-sm font-medium text-gray-700">Icon</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}" class="input-field" placeholder="e.g. code, globe, paint-brush">
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="features" class="mb-1 block text-sm font-medium text-gray-700">Features</label>
                    <textarea id="features" name="features" rows="4" class="input-field" placeholder="One feature per line...">{{ old('features') }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Enter one feature per line.</p>
                    @error('features')
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
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', '1') ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Create Service</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
