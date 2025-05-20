@extends('layouts.user.user_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/services.css') }}" />
@endsection
@section('content')


        <section class="last-section">
            @if (!empty($services))
                @php $i = 1; @endphp
                @foreach ($services as $row)
                    @if ($i%2==0)
                    <div class="value-item2" id="{{ $row->title }}{{ $row->id }}">
                        <div class="safety-image">
                            <img src="{{ asset('uploads/services/'.$row->image) }}" alt="{{ $row->title }}">
                        </div>
                        <div class="safety-text">
                            <h2>{{ strtoupper($row->title) }}</h2>
                            <p class="text">{{ $row->description }}</p>
                        </div>
                    </div>
                    @else

                    <div class="value-item2" id="{{ $row->title }}{{ $row->id }}">
                        <div class="training-text">
                            <h2>{{ $row->title }}</h2>
                            <p class="text">{{ $row->description }}</p>
                        </div>
                        <div class="training-image">
                            <img src="{{ asset('uploads/services/'.$row->image) }}" alt="{{ $row->title }}">
                        </div>
                    </div>
                @endif
                @php $i++; @endphp
                @endforeach
            @endif
            
        </section>

@endsection
@section('js')
@endsection 