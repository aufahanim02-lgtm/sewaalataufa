@extends('layouts.apptamu')

@section('title', 'Login Penyewa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card">
            <div class="card-header text-center">
                <b>Login Penyewa</b>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('auth.penyewa.proses') }}">
                    @csrf
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="form-group mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100">
                        Login
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('auth.penyewa.register') }}">
                            Belum punya akun? Daftar
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

@endsection