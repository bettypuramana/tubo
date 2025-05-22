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
        <section class="projects">
            <h2>Company Profile</h2>
            <a href="{{ asset('./assets/user/files/TUBO Company Profile.pdf') }}" download>
                <button type="button" class="button2">
                    <span class="button2__text">Download</span>
                    <span class="button2__icon"><svg class="svg" data-name="Layer 2" id="bdd05811-e15d-428c-bb53-8661459f9307" viewBox="0 0 35 35" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path>
                            <path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path>
                            <path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path>
                        </svg></span>
                </button>
            </a>
        </section>
        <section class="iso">
            <h2>Accreditations</h2>
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