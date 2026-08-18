<x-admin-layout title="Skills">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Skills</h1>
        <a href="{{ route('admin.skills.create') }}" class="btn-primary">
            Add Skill
        </a>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Proficiency</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($skills as $skill)
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $skill->name }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                            {{ $skill->category->name ?? '—' }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-2 w-32 overflow-hidden rounded-full bg-gray-200">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                                <span class="text-sm text-gray-500">{{ $skill->proficiency }}%</span>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if ($skill->is_active)
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form x-data="{ open: false }" method="POST" action="{{ route('admin.skills.destroy', $skill) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="open = true" class="text-red-600 hover:text-red-900">Delete</button>
                                    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                                        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl" @click.away="open = false">
                                            <h2 class="text-lg font-semibold text-gray-900">Confirm Delete</h2>
                                            <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete <strong>{{ $skill->name }}</strong>? This action cannot be undone.</p>
                                            <div class="mt-6 flex justify-end gap-3">
                                                <button type="button" @click="open = false" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</button>
                                                <button type="submit" class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                            No skills found. Click "Add Skill" to create one.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
