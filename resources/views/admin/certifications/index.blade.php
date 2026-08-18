<x-admin-layout title="Certifications">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Certifications</h1>
        <a href="{{ route('admin.certifications.create') }}" class="btn-primary">Add Certification</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($certifications as $certification)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                <div>
                    <div class="flex items-start justify-between gap-2">
                        <h2 class="text-lg font-semibold text-gray-800">{{ $certification->name }}</h2>
                        @if($certification->is_published)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700 shrink-0">Published</span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600 shrink-0">Draft</span>
                        @endif
                    </div>
                    <p class="text-indigo-600 font-medium mt-1">{{ $certification->issuing_organization }}</p>
                    <p class="text-sm text-gray-400 mt-2">
                        Issued: {{ \Carbon\Carbon::parse($certification->issue_date)->format('M Y') }}
                        @if($certification->expiry_date)
                            – Expires: {{ \Carbon\Carbon::parse($certification->expiry_date)->format('M Y') }}
                        @endif
                    </p>
                    @if($certification->credential_id)
                        <p class="text-sm text-gray-500 mt-1">Credential ID: {{ $certification->credential_id }}</p>
                    @endif
                </div>
                <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.certifications.edit', $certification->id) }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Edit</a>
                    <form action="{{ route('admin.certifications.destroy', $certification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this certification?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="sm:col-span-2 lg:col-span-3 text-center py-12 text-gray-400">
                No certifications found. Click <strong>Add Certification</strong> to create one.
            </div>
        @endforelse
    </div>
</x-admin-layout>
