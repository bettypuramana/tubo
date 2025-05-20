@extends('layouts.user.user_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/contactus.css') }}" />
@endsection
@section('content')

        <section class="contact">
            <h2>CONTACT US</h2>

            <div class="details">
                <div class="left-side">
                    <h4>QATAR</h4>
                    <p>West Bay <strong>|</strong> Al Reem Tower <strong>|</strong> Building Number 37</p>
                    <p>11th Floor <strong>|</strong> Doha - Qatar <strong>|</strong> <strong>Tel :</strong> +974 4411
                        2536</p>
                    <p><strong>Fax :</strong> +974 4463 1861 <strong>|</strong> <strong>P.O.Box :</strong> 24355</p>
                    <p><strong>Email :</strong> info@tubo.qa <strong>|</strong> <strong>Web :</strong> www.tubo.qa</p>
                    <br>
                    <h4>OMAN</h4>
                    <p>Alfardan Heights <strong>|</strong> Fourth Floor <strong>|</strong> Ghala <strong>|</strong>
                        Muscat</p>
                    <p>Sultanate of Oman <strong>|</strong> <strong>Tel :</strong> +968 2413 7442</p>
                    <p><strong>P.O.Box :</strong> 47 <strong>| Postal Code :</strong> 138</p>
                    <p><strong>Email :</strong> info@tubo.qa <strong>| Web :</strong> www.tubo.qa</p>
                    <br>
                    <div class="social-linkedin">
                        <a href="https://www.linkedin.com/company/tubo-trading-contracting/" target="_blank">
                            <img src="{{ asset('assets/user/images/socials/linkedin (1) black.png') }}" alt="linkedin" height="25px" width="25px">
                        </a>
                    </div>
                </div>
                <div class="right-side">
                    <form method="POST" action="{{ route('contact.store') }}">
                        @csrf
                        <div class="input-container">
                            <input type="text" name="name" class="input" required placeholder="Full Name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input type="text" name="email" class="input" required placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <input type="text" name="subject" class="input" required placeholder="Subject">
                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-container">
                            <textarea name="message" class="input" required placeholder="Message" maxlength="1000"></textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </section>

@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
            });
        </script>
    @endif

    @if(session('fail'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: @json(session('fail')),
            });
        </script>
    @endif
@endsection 