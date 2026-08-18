<x-admin-layout title="Experience">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Experience</h1>
        <a href="{{ route('admin.experience.create') }}" class="btn-primary">
            Add Experience
        </a>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($experiences as $experience)
            <div class="rounded-lg bg-white shadow">
                <div class="px-6 py-5">
                    <div class="flex items-start justify-between">
                        <div class="min-w-0 flex-1">
                            <h3 class="truncate text-base font-semibold text-gray-900">
                                {{ $experience->job_title }}
                            </h3>
                            <p class="mt-1 truncate text-sm text-gray-600">
                                {{ $experience->company }}
                            </p>
                            @if ($experience->location)
                                <p class="mt-1 text-sm text-gray-500">
                                    {{ $experience->location }}
                                </p>
                            @endif
                        </div>
                        @if ($experience->is_current)
                            <span class="ml-2 inline-flex shrink-0 items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                Current
                            </span>
                        @endif
                    </div>

                    <p class="mt-3 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                        &mdash;
                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                    </p>

                    @if ($experience->technologies)
                        <div class="mt-3 flex flex-wrap gap-1.5">
                            @foreach (collect(explode(',', $experience->technologies))->take(4) as $tech)
                                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700">
                                    {{ trim($tech) }}
                                </span>
                            @endforeach
                            @if (count(explode(',', $experience->technologies)) > 4)
                                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-500">
                                    +{{ count(explode(',', $experience->technologies)) - 4 }} more
                                </span>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="flex items-center justify-between border-t border-gray-100 px-6 py-3">
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.experience.edit', $experience) }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-900">
                            Edit
                        </a>
                        <form x-data="{ open: false }" method="POST" action="{{ route('admin.experience.destroy', $experience) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" @click="open = true" class="text-sm font-medium text-red-600 hover:text-red-900">
                                Delete
                            </button>
                            <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                                <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl" @click.away="open = false">
                                    <h2 class="text-lg font-semibold text-gray-900">Confirm Delete</h2>
                                    <p class="mt-2 text-sm text-gray-600">
                                        Are you sure you want to delete <strong>{{ $experience->job_title }}</strong> at <strong>{{ $experience->company }}</strong>? This action cannot be undone.
                                    </p>
                                    <div class="mt-6 flex justify-end gap-3">
                                        <button type="button" @click="open = false" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</button>
                                        <button type="submit" class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (! $experience->is_published)
                        <span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-0.5 text-xs font-medium text-yellow-800">
                            Draft
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full px-6 py-12 text-center text-sm text-gray-500">
                No experiences found. Click "Add Experience" to create one.
            </div>
        @endforelse
    </div>
</x-admin-layout>
