<x-admin-layout title="Add Certification">
    <div class="max-w-2xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add Certification</h1>

        <form action="{{ route('admin.certifications.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="input-field w-full" placeholder="e.g. AWS Certified Solutions Architect">
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="issuing_organization" class="block text-sm font-medium text-gray-700 mb-1">Issuing Organization <span class="text-red-500">*</span></label>
                <input type="text" id="issuing_organization" name="issuing_organization" value="{{ old('issuing_organization') }}" required class="input-field w-full" placeholder="e.g. Amazon Web Services">
                @error('issuing_organization') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="issue_date" class="block text-sm font-medium text-gray-700 mb-1">Issue Date <span class="text-red-500">*</span></label>
                    <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" required class="input-field w-full">
                    @error('issue_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                    <input type="date" id="expiry_date" name="expiry_date" value="{{ old('expiry_date') }}" class="input-field w-full">
                    @error('expiry_date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="credential_id" class="block text-sm font-medium text-gray-700 mb-1">Credential ID</label>
                <input type="text" id="credential_id" name="credential_id" value="{{ old('credential_id') }}" class="input-field w-full" placeholder="e.g. ABC123XYZ">
                @error('credential_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="credential_url" class="block text-sm font-medium text-gray-700 mb-1">Credential URL</label>
                <input type="url" id="credential_url" name="credential_url" value="{{ old('credential_url') }}" class="input-field w-full" placeholder="https://...">
                @error('credential_url') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-2" x-data="{ published: {{ old('is_published', 1) ? 'true' : 'false' }} }">
                <input type="hidden" name="is_published" value="0">
                <input type="checkbox" id="is_published" name="is_published" value="1" x-model="published" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="is_published" class="text-sm text-gray-700">Published</label>
            </div>

            <div>
                <label for="order_column" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <input type="number" id="order_column" name="order_column" value="{{ old('order_column', 0) }}" class="input-field w-full sm:w-32" min="0">
                @error('order_column') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4 pt-3">
                <button type="submit" class="btn-primary">Save Certification</button>
                <a href="{{ route('admin.certifications.index') }}" class="text-sm text-gray-500 hover:text-gray-700">Cancel</a>
            </div>
        </form>
    </div>
</x-admin-layout>
