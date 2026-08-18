<x-portfolio-layout title="Certifications">
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="section-title text-center mb-8">Certifications</h1>
            <p class="section-subtitle text-center">Professional certifications and achievements</p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certifications as $cert)
                    <div class="card">
                        <h3 class="text-xl font-bold mb-2">{{ $cert->name }}</h3>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold mb-2">{{ $cert->issuing_organization }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-500 mb-2">
                            Issued: {{ $cert->issue_date->format('M Y') }}
                            @if($cert->expiry_date)
                                · Expires: {{ $cert->expiry_date->format('M Y') }}
                            @endif
                        </p>
                        @if($cert->credential_id)
                            <p class="text-sm text-gray-500 mb-2">ID: {{ $cert->credential_id }}</p>
                        @endif
                        @if($cert->credential_url)
                            <a href="{{ $cert->credential_url }}" target="_blank" class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:underline">View Credential →</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-portfolio-layout>
