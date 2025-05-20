@extends('layouts.user.user_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/projects.css') }}" />
@endsection
@section('content')

<section class="section1" id="section1">
            <p>Tubo has been a trusted partner in numerous high-profile, strategic projects across the Middle East,
                consistently delivering our scope of work ahead of schedule, on budget, and to exact specifications. Our
                commitment to excellence and efficiency has not only ensured our contributions were met with sucess but
                has also played a pivotal role in the overall achievements of these landmark projects.</p>
        </section>

        <section class="projects" id="section2">
            <div class="logos">
                @foreach ($clients as $client)
                    <div class="logo-box">
                        <a href="#{{ $client->title }}{{ $client->id }}">
                            <img src="{{ asset('uploads/clients/' . $client->image) }}" alt="{{ $client->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        @foreach ($clients as $client)
            @if ($client->projects->isNotEmpty())
                
                    <section class="qatar-energy" id="{{ $client->title }}{{ $client->id }}">
                        <div class="projecto">
                            <img src="{{ asset('uploads/clients/' . $client->image) }}" alt="{{ $client->title }}">
                            <h2>{{ strtoupper($client->title) }}</h2>
                            <h4>{{ strtoupper($client->sub_title) }}</h4>
                            <div class="tablo">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="project-column">Project</th>
                                            <th class="contractor-column">Contractor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client->projects as $project)
                                        <tr>
                                            <td>{{ $project->project_name }}</td>
                                            <td>{{ $project->contractor }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                
            @endif
        @endforeach

@endsection
@section('js')
@endsection   