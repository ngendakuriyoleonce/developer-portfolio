<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resume - {{ $profile->user->name ?? 'Developer' }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Helvetica', sans-serif; font-size: 11pt; color: #333; line-height: 1.5; }
        .header { background: #2563eb; color: white; padding: 25px 30px; }
        .header h1 { font-size: 24pt; margin-bottom: 5px; }
        .header p { font-size: 12pt; opacity: 0.9; }
        .header .contact { font-size: 9pt; margin-top: 8px; opacity: 0.85; }
        .content { padding: 20px 30px; }
        .section { margin-bottom: 18px; }
        .section h2 { font-size: 14pt; color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 4px; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px; }
        .item { margin-bottom: 12px; }
        .item h3 { font-size: 12pt; font-weight: bold; }
        .item .subtitle { color: #2563eb; font-size: 10pt; }
        .item .date { color: #666; font-size: 9pt; }
        .item .desc { font-size: 10pt; color: #555; margin-top: 4px; }
        .skills-grid { display: flex; flex-wrap: wrap; gap: 8px; }
        .skill-category { margin-bottom: 8px; width: 100%; }
        .skill-category h3 { font-size: 10pt; font-weight: bold; color: #2563eb; margin-bottom: 4px; }
        .skill-tag { display: inline-block; background: #eff6ff; color: #1e40af; padding: 2px 8px; border-radius: 3px; font-size: 9pt; margin: 2px; }
        .features { list-style: none; padding: 0; }
        .features li { font-size: 10pt; padding: 1px 0; }
        .features li::before { content: "\2713 "; color: #2563eb; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $profile->user->name ?? 'Developer' }}</h1>
        <p>{{ $profile->title }}</p>
        <div class="contact">
            @if($profile->email) {{ $profile->email }} @endif
            @if($profile->phone) | {{ $profile->phone }} @endif
            @if($profile->location) | {{ $profile->location }} @endif
        </div>
    </div>
    
    <div class="content">
        @if($profile->bio)
        <div class="section">
            <h2>Professional Summary</h2>
            <p style="font-size: 10pt;">{{ $profile->bio }}</p>
        </div>
        @endif

        <div class="section">
            <h2>Skills</h2>
            @foreach($skillCategories as $category)
                <div class="skill-category">
                    <h3>{{ $category->name }}</h3>
                    @foreach($category->skills as $skill)
                        <span class="skill-tag">{{ $skill->name }} ({{ $skill->proficiency }}%)</span>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="section">
            <h2>Experience</h2>
            @foreach($experiences as $exp)
                @if($exp->company === 'E-Commerce Management System')
                    <div class="item" style="page-break-before: always;">
                @else
                    <div class="item">
                @endif
                    <h3>{{ $exp->job_title }}</h3>
                    <div class="subtitle">{{ $exp->company }}{{ $exp->location ? ' · ' . $exp->location : '' }}</div>
                    <div class="date">{{ $exp->start_date->format('M Y') }} - {{ $exp->is_current ? 'Present' : $exp->end_date?->format('M Y') }}</div>
                    @if($exp->description)
                        <div class="desc">{{ $exp->description }}</div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="section">
            <h2>Education</h2>
            @foreach($educations as $edu)
                <div class="item">
                    <h3>{{ $edu->degree }} in {{ $edu->field_of_study }}</h3>
                    <div class="subtitle">{{ $edu->institution }}</div>
                    <div class="date">{{ $edu->start_date->format('M Y') }} - {{ $edu->is_current ? 'Present' : $edu->end_date?->format('M Y') }}</div>
                </div>
            @endforeach
        </div>

        @if($projects->count())
        <div class="section">
            <h2>Featured Projects</h2>
            @foreach($projects as $project)
                <div class="item">
                    <h3>{{ $project->title }}</h3>
                    <div class="desc">{{ $project->short_description }}</div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
