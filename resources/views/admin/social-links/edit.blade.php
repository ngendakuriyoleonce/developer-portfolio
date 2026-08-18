<x-admin-layout title="Edit Social Link">
    <div class="mb-6">
        <a href="{{ route('admin.social-links.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Social Links</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Edit Social Link</h1>
            </div>

            <form method="POST" action="{{ route('admin.social-links.update', $socialLink) }}" class="space-y-6 p-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="platform" class="mb-1 block text-sm font-medium text-gray-700">Platform</label>
                    <input type="text" id="platform" name="platform" value="{{ old('platform', $socialLink->platform) }}" required class="input-field">
                    @error('platform')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="url" class="mb-1 block text-sm font-medium text-gray-700">URL</label>
                    <input type="url" id="url" name="url" value="{{ old('url', $socialLink->url) }}" required class="input-field">
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="mb-1 block text-sm font-medium text-gray-700">Icon</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon', $socialLink->icon) }}" class="input-field">
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="order_column" class="mb-1 block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" id="order_column" name="order_column" value="{{ old('order_column', $socialLink->order_column) }}" min="0" class="input-field">
                    @error('order_column')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $socialLink->is_active) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.social-links.index') }}" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="btn-primary">Update Link</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
