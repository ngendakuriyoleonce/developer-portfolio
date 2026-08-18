<x-portfolio-layout title="Services">
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Services</h1>
            <p class="section-subtitle text-center">Professional services I offer</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="card">
                        <h3 class="text-xl font-bold mb-3">{{ $service->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $service->description }}</p>
                        @if($service->features)
                            <ul class="space-y-1">
                                @foreach($service->features as $feature)
                                    <li class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-portfolio-layout>
