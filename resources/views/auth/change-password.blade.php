@extends('layouts.admin.admin_layout')

@section('content')

<div class="main-panel"> 
    <div class="content-wrapper"> 
        <div class="col-md-8 offset-md-2 grid-margin stretch-card"> 
            <div class="card"> 
                <div class="card-body"> 
                    <h4 class="card-title">Change Password</h4>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_password" class="form-control" required>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                            @error('new_password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Password</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection



