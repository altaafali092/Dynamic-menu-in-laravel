@extends('frontend.layouts.master')
@section('content')


<div class="login-container">
    <h2 class="login-title">Login</h2>
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="mt-3 text-center">
            <a href="#" class="text-decoration-none">Forgot password?</a>
        </div>
    </form>
</div>
<style>

    .login-container {
        background: white;
        margin: 0rem 6rem 2rem 30rem;
        padding: 14rem 10rem 10rem 10rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-title {
        margin-bottom: 1.5rem;
        font-weight: bold;
        text-align: center;
    }
    .form-control {
        border-radius: 0.5rem;
    }
    .btn-primary {
        border-radius: 0.5rem;
    }
</style>
@endsection
