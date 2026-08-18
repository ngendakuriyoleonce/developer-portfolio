<x-admin-layout title="Education">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Education</h1>
        <a href="{{ route('admin.education.create') }}" class="btn-primary">Add Education</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($educations as $education)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">{{ $education->degree }}</h2>
                    <p class="text-indigo-600 font-medium">{{ $education->field_of_study }}</p>
                    <p class="text-gray-500 mt-1">{{ $education->institution }}</p>
                    <p class="text-sm text-gray-400 mt-2">
                        {{ \Carbon\Carbon::parse($education->start_date)->format('M Y') }}
                        –
                        @if($education->is_current)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-700">Current</span>
                        @else
                            {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('M Y') : 'N/A' }}
                        @endif
                    </p>
                    @if($education->description)
                        <p class="text-sm text-gray-500 mt-3 line-clamp-3">{{ $education->description }}</p>
                    @endif
                </div>
                <div class="flex items-center gap-3 mt-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('admin.education.edit', $education->id) }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Edit</a>
                    <form action="{{ route('admin.education.destroy', $education->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this education record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="sm:col-span-2 lg:col-span-3 text-center py-12 text-gray-400">
                No education records found. Click <strong>Add Education</strong> to create one.
            </div>
        @endforelse
    </div>
</x-admin-layout>
