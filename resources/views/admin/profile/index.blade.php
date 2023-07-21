@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
            </div>
            @include('admin.layouts.message')
        </div>
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Update</h3>
                        </div>

                        
                        <form action="{{ route('admin.profile_update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" 
                                        class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('name', $admin->name) }}"
                                        placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" 
                                        id="email"
                                        name="email"
                                        class="form-control @error('email')
                                            is-invalid
                                        @enderror" 
                                        value="{{ old('email', $admin->email) }}"
                                        placeholder="Enter email">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Mobile</label>
                                    <input type="number" 
                                        id="phone"
                                        name="phone"
                                        class="form-control @error('phone')
                                            is-invalid
                                        @enderror"
                                        value="{{ old('phone', $admin->phone) }}" 
                                        placeholder="Enter phone">
                                     @error('phone')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        
                        <form action="{{ route('admin.password_update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $admin->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="current-password">Current Password</label>
                                    <input type="password" 
                                        id="current-password"
                                        name="current_password"
                                        class="form-control @error('current_password')
                                            is-invalid
                                        @enderror"
                                        placeholder="Enter password">
                                     @error('current_password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" 
                                        id="password"
                                        name="password"
                                        class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                        placeholder="Enter new password">
                                     @error('password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" 
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        class="form-control @error('password_confirmation')
                                            is-invalid
                                        @enderror"
                                        placeholder="Confirm password">
                                     @error('password_confirmation')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection


