<x-admin-layout title="Messages">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Messages</h1>
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($messages as $message)
                    <tr class="{{ $message->read_at ? '' : 'bg-indigo-50' }}">
                        <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $message->name }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                            {{ $message->subject }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                            {{ $message->created_at->format('M d, Y') }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if ($message->read_at)
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                                    Read
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                                    Unread
                                </span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <form x-data="{ open: false }" method="POST" action="{{ route('admin.messages.destroy', $message) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="open = true" class="text-red-600 hover:text-red-900">Delete</button>
                                    <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                                        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl" @click.away="open = false">
                                            <h2 class="text-lg font-semibold text-gray-900">Confirm Delete</h2>
                                            <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete this message from <strong>{{ $message->name }}</strong>? This action cannot be undone.</p>
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
                            No messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>
</x-admin-layout>
