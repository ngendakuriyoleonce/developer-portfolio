<x-admin-layout title="Message">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.messages.index') }}" class="text-sm text-indigo-600 hover:text-indigo-900">&larr; Back to Messages</a>
        <form x-data="{ open: false }" method="POST" action="{{ route('admin.messages.destroy', $message) }}">
            @csrf
            @method('DELETE')
            <button type="button" @click="open = true" class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Delete</button>
            <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-xl" @click.away="open = false">
                    <h2 class="text-lg font-semibold text-gray-900">Confirm Delete</h2>
                    <p class="mt-2 text-sm text-gray-600">Are you sure you want to delete this message? This action cannot be undone.</p>
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="open = false" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Cancel</button>
                        <button type="submit" class="rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="mx-auto max-w-2xl">
        <div class="rounded-lg bg-white shadow">
            <div class="border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-gray-900">{{ $message->subject }}</h1>
                    @if ($message->read_at)
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                            Read
                        </span>
                    @else
                        <span class="inline-flex items-center rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                            Unread
                        </span>
                    @endif
                </div>
            </div>

            <div class="p-6">
                <div class="mb-6 grid grid-cols-2 gap-4 border-b border-gray-100 pb-6">
                    <div>
                        <p class="text-xs font-medium uppercase text-gray-500">From</p>
                        <p class="mt-1 text-sm font-medium text-gray-900">{{ $message->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase text-gray-500">Email</p>
                        <p class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $message->email }}" class="text-indigo-600 hover:text-indigo-900">{{ $message->email }}</a>
                        </p>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase text-gray-500">Date</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->created_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                </div>

                <div class="prose prose-sm max-w-none text-gray-700">
                    {!! nl2br(e($message->message)) !!}
                </div>

                <div class="mt-8">
                    <form method="POST" action="{{ route('admin.messages.toggle-read', $message) }}">
                        @csrf
                        @method('PATCH')
                        @if ($message->read_at)
                            <button type="submit" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Mark as Unread
                            </button>
                        @else
                            <button type="submit" class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Mark as Read
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
