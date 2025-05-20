@extends('layouts.user.user_layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user/css/careers.css') }}" />
@endsection
@section('content')

        <section class="main-career-section">
            <div class="careers-description">
                <h2>CAREERS</h2>
                <p>At TUBO, we adopt friendliness in the workplace and encourage having a sense of ownership among all
                    employees. We are proud to have a conflict-free atmosphere and a diverse team where every member
                    feels values, and every opinion is heard and respected.</p>
            </div>
            <form method="POST" action="{{ route('career.store') }}" enctype="multipart/form-data">
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
                <div class="input-container custom-dropdown">
                    <div class="selected">Position</div>
                    <div class="options-container">
                        <div class="option">Engineer</div>
                        <div class="option">Manager</div>
                        <div class="option">Technician</div>
                        <div class="option">Supervisor</div>
                    </div>
                    <input type="hidden" name="position" id="position-input" required>
                    @error('position')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-container">
                    <input type="file" name="image" class="input" required id="file-upload" data-placeholder="Attach your CV">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <span class="icon">
                        <img src="{{ asset('assets/user/images/attach-file.png') }}" alt="icon" height="20px" width="20px">
                    </span>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </section>

@endsection
@section('js')
<script>
    const dropdown = document.querySelector('.custom-dropdown');
    const selected = dropdown.querySelector('.selected');
    const optionsContainer = dropdown.querySelector('.options-container');
    const options = dropdown.querySelectorAll('.option');
    const positionInput = document.getElementById('position-input');

    selected.addEventListener('click', () => {
        dropdown.classList.toggle('active');
        optionsContainer.style.display = dropdown.classList.contains('active') ? 'block' : 'none';
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            selected.textContent = option.textContent;
            positionInput.value = option.textContent; // set hidden input
            dropdown.classList.remove('active');
            optionsContainer.style.display = 'none';
        });
    });

    document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target)) {
            dropdown.classList.remove('active');
            optionsContainer.style.display = 'none';
        }
    });

</script>
<script>
    const fileUpload = document.getElementById('file-upload');

    fileUpload.addEventListener('change', function () {
        if (this.files.length > 0) {
            this.setAttribute('data-placeholder', 'File Uploaded');
        }
    });
</script>
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