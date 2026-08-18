<x-admin-layout title="Edit Service">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Services</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Edit Service</h1>
            </div>

            <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-6 p-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" required class="input-field">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="4" required class="input-field">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="mb-1 block text-sm font-medium text-gray-700">Icon</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" class="input-field">
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="features" class="mb-1 block text-sm font-medium text-gray-700">Features</label>
                    <textarea id="features" name="features" rows="4" class="input-field">{{ old('features', $service->features) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Enter one feature per line.</p>
                    @error('features')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order_column" class="mb-1 block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" id="order_column" name="order_column" value="{{ old('order_column', $service->order_column) }}" min="0" class="input-field">
                    @error('order_column')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $service->is_published) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_published" class="ml-2 text-sm text-gray-700">Published</label>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.services.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="btn-primary">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
