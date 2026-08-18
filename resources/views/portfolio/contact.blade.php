<x-portfolio-layout title="Contact">
    <section class="py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Get In Touch</h1>
            <p class="section-subtitle text-center">Have a project in mind? Let's talk.</p>

            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <div class="card mb-6">
                        <h3 class="font-bold text-lg mb-4">Contact Information</h3>
                        <div class="space-y-3">
                            @if($profile->email)
                                <div class="flex items-center gap-3">
                                    <span class="text-blue-600">📧</span>
                                    <a href="mailto:{{ $profile->email }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600">{{ $profile->email }}</a>
                                </div>
                            @endif
                            @if($profile->phone)
                                <div class="flex items-center gap-3">
                                    <span class="text-blue-600">📱</span>
                                    <a href="tel:{{ $profile->phone }}" class="text-gray-600 dark:text-gray-400 hover:text-blue-600">{{ $profile->phone }}</a>
                                </div>
                            @endif
                            @if($profile->location)
                                <div class="flex items-center gap-3">
                                    <span class="text-blue-600">📍</span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $profile->location }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    @if(session('success'))
                        <div class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 p-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="card">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold mb-1">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="input-field" required>
                                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="input-field" required>
                                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}" class="input-field" required>
                                @error('subject') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-1">Message</label>
                                <textarea name="message" rows="5" class="input-field" required>{{ old('message') }}</textarea>
                                @error('message') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn-primary w-full">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-portfolio-layout>
