<x-admin-layout title="Create Social Link">
    <div class="mb-6">
        <a href="{{ route('admin.social-links.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Social Links</a>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-900">Create New Social Link</h1>
            </div>

            <form method="POST" action="{{ route('admin.social-links.store') }}" class="space-y-6 p-6">
                @csrf

                <div>
                    <label for="platform" class="mb-1 block text-sm font-medium text-gray-700">Platform</label>
                    <input type="text" id="platform" name="platform" value="{{ old('platform') }}" required class="input-field" placeholder="e.g. GitHub, LinkedIn, Twitter">
                    @error('platform')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="url" class="mb-1 block text-sm font-medium text-gray-700">URL</label>
                    <input type="url" id="url" name="url" value="{{ old('url') }}" required class="input-field" placeholder="https://...">
                    @error('url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="mb-1 block text-sm font-medium text-gray-700">Icon</label>
                    <input type="text" id="icon" name="icon" value="{{ old('icon') }}" class="input-field" placeholder="e.g. github, linkedin, twitter">
                    @error('icon')
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
                    <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">Create Link</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
