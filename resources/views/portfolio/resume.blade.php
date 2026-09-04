<x-portfolio-layout title="Resume">
    <style>
        .print-resume { display: none; }
        @media print {
            @page { margin: 12mm; }
            nav, footer, main .no-print { display: none !important; }
            body { background: white !important; }
            main { padding-top: 0 !important; }
            .screen-resume { display: none !important; }
            .print-resume { display: block !important; color: #111; }
            .print-resume h2 { font-size: 14pt; color: #1e40af; border-bottom: 2px solid #1e40af; padding-bottom: 3px; margin: 14px 0 6px; text-transform: uppercase; letter-spacing: 1px; }
            .print-resume h3 { font-size: 11pt; margin: 8px 0 2px; }
            .print-resume p, .print-resume li { font-size: 10pt; color: #333; }
            .print-resume .header { margin-bottom: 8px; }
            .print-resume .header h1 { font-size: 22pt; margin-bottom: 2px; }
            .print-resume .header .title { font-size: 13pt; color: #1e40af; }
            .print-resume .contact { font-size: 9pt; color: #555; margin-top: 4px; }
            .print-resume ul { padding-left: 16px; }
            .print-resume .tech { font-size: 9pt; color: #555; }
        }
    </style>

    <!-- Screen design (previous/embedded) -->
    <section class="py-20 screen-resume">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8 no-print">
                <h1 class="section-title">Resume</h1>
                <div class="flex gap-3">
                    <a href="{{ route('resume.pdf') }}" class="btn-outline text-sm py-2 px-4">Download PDF</a>
                    <button onclick="window.print()" class="btn-primary text-sm py-2 px-4">Print</button>
                </div>
            </div>

            <div class="card mb-6">
                <h2 class="text-3xl font-bold">{{ $profile->user->name ?? 'Developer' }}</h2>
                <p class="text-xl text-blue-600 dark:text-blue-400">{{ $profile->title }}</p>
                <div class="flex flex-wrap gap-4 mt-2 text-sm text-gray-500">
                    @if($profile->email) <span>{{ $profile->email }}</span> @endif
                    @if($profile->phone) <span>{{ $profile->phone }}</span> @endif
                    @if($profile->location) <span>{{ $profile->location }}</span> @endif
                </div>
            </div>

            @if($profile->bio)
                <div class="card mb-6">
                    <h2 class="text-2xl font-bold mb-4 text-blue-600 dark:text-blue-400 uppercase tracking-wide">Professional Summary</h2>
                    <p class="text-gray-700 dark:text-gray-300">{{ $profile->bio }}</p>
                </div>
            @endif

            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4 text-blue-600 dark:text-blue-400 uppercase tracking-wide">Technical Skills</h2>
                @foreach($skillCategories as $category)
                    <div class="mb-4">
                        <h3 class="font-bold text-blue-600 dark:text-blue-400 mb-2">{{ $category->name }}</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($category->skills as $skill)
                                <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 rounded-full text-sm">{{ $skill->name }} ({{ $skill->proficiency }}%)</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4 text-blue-600 dark:text-blue-400 uppercase tracking-wide">Professional Experience</h2>
                @foreach($experiences as $exp)
                    <div class="mb-4 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700 pb-4' : '' }}">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="font-bold">{{ $exp->job_title }} | {{ $exp->company }}</h3>
                                <p class="text-blue-600 dark:text-blue-400 text-sm">{{ $exp->location }}</p>
                            </div>
                            <span class="text-sm text-gray-500">{{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Present' : $exp->end_date?->format('M Y') }}</span>
                        </div>
                        @if($exp->description)
                            <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm italic">{{ $exp->description }}</p>
                        @endif
                        @if($exp->responsibilities)
                            <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 mt-2 space-y-1">
                                @foreach($exp->responsibilities as $r)
                                    <li>{{ $r }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="card mb-6">
                <h2 class="text-2xl font-bold mb-4 text-blue-600 dark:text-blue-400 uppercase tracking-wide">Education</h2>
                @foreach($educations as $edu)
                    <div class="mb-4 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700 pb-4' : '' }}">
                        <h3 class="font-bold">{{ $edu->degree }}</h3>
                        <p class="text-blue-600 dark:text-blue-400">{{ $edu->institution }}</p>
                        <p class="text-sm text-gray-500">{{ $edu->start_date->format('M Y') }} - {{ $edu->is_current ? 'Present' : $edu->end_date?->format('M Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Print-only clean resume (current design) -->
    <div class="print-resume">
        <div class="header">
            <h1>{{ $profile->user->name ?? 'Developer' }}</h1>
            <div class="title">{{ $profile->title }}</div>
            <div class="contact">
                {{ $profile->email }}{{ $profile->phone ? ' | ' . $profile->phone : '' }}{{ $profile->location ? ' | ' . $profile->location : '' }}
            </div>
        </div>

        @if($profile->bio)
            <h2>Professional Summary</h2>
            <p>{{ $profile->bio }}</p>
        @endif

        <h2>Technical Skills</h2>
        @foreach($skillCategories as $category)
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->skills->pluck('name')->join(', ') }}</p>
        @endforeach

        <h2>Professional Experience</h2>
        @foreach($experiences as $exp)
            <h3>{{ $exp->job_title }} | {{ $exp->company }} <span class="tech">({{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Present' : $exp->end_date?->format('M Y') }})</span></h3>
            @if($exp->description)
                <p><em>{{ $exp->description }}</em></p>
            @endif
            @if($exp->responsibilities)
                <ul>
                    @foreach($exp->responsibilities as $r)
                        <li>{{ $r }}</li>
                    @endforeach
                </ul>
            @endif
        @endforeach

        <h2>Education</h2>
        @foreach($educations as $edu)
            <h3>{{ $edu->degree }}</h3>
            <p>{{ $edu->institution }} | {{ $edu->start_date->format('M Y') }} - {{ $edu->is_current ? 'Present' : $edu->end_date?->format('M Y') }}</p>
        @endforeach
    </div>
</x-portfolio-layout>
