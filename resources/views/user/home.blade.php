@extends('layouts.user.user_layout')
@section('content')
                
      <!-- Hero Section -->
        <section class="hero">
            <div class="hero-text">
                <h1>TUBO is dedicated to introducing technology</h1>
                <p>Since TUBO's inception in 2014, we've grown continuously both organically and by becoming part of
                    Obsidian
                    Group.</p>
                <a href="{{ route('about_us') }}" class="btn">read more</a>
            </div>
        </section>

        <!-- Services Section -->
        <h2 class="services-title">SERVICES</h2>
        <section class="services-accordion">
            <div class="accordion-card">
                @if (!empty($services))
                    @foreach ($services as $index => $row)
                        <div class="accordion-item {{ $index === 0 ? 'active' : '' }}" data-image="{{ $row->image }}" data-description="{{ strtoupper( $row->title) }}">
                            <span>{{ formatTitleCase ($row->title) }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        @if (!empty($services))
            <div class="accordion-preview" id="accordion-preview">
                <img src="{{ asset('uploads/services/'.$services[0]->image) }}" alt="Service Preview" id="accordion-image">
                <div class="accordion-preview-caption">
                    <p id="accordion-description">{{ strtoupper($services[0]->title) ?? 'No Description' }}</p>
                </div>
            </div>
        @endif
        </section>

        <!-- Projects Section -->
        <section class="projects">
            <h2>PROJECTS</h2>
            <div class="logos">
                @if (!empty($clients))
                    @foreach ($clients as $row)
                        <div class="logo-box">
                            <a href="{{ route('projects') }}#{{ $row->title }}{{ $row->id }}">
                                <img src="{{ asset('uploads/clients/'.$row->image) }}"alt="{{ $row->title }}">
                            </a>
                        </div>
                    @endforeach
                @endif
               
            </div>
        </section>
        <section class="iso">
            <div class="iso-logos">
                <img src="{{ asset('assets/user/images/ISO/ISO 9001.jpg') }}" alt="" data-aos="fade-up">
                <img src="{{ asset('assets/user/images/ISO/ISO 14001.jpg') }}" alt="" data-aos="fade-up">
                <img src="{{ asset('assets/user/images/ISO/OHSAS 18001.jpg') }}" alt="" data-aos="fade-up">
                <img src="{{ asset('assets/user/images/ISO/AIAO BAR.jpg') }}" alt="" data-aos="fade-up">
            </div>
        </section>


@endsection
@section('js')
@endsection   