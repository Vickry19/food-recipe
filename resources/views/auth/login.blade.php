@extends('layouts.app')

@section('content')

<div class="row justify-content-center align-items-center"
     style="min-height:80vh;">

    <div class="col-lg-10">

        <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

            <div class="row g-0">

                {{-- LEFT SIDE --}}
                <div class="col-lg-6 d-none d-lg-block position-relative">

                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?q=80&w=1200&auto=format&fit=crop"
                         class="w-100 h-100"
                         style="object-fit:cover; min-height:700px;">

                    <div class="position-absolute top-0 start-0 w-100 h-100"
                         style="background:rgba(0,0,0,0.55);">

                        <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white p-5">

                            <h1 class="fw-bold display-5 text-center mb-4">

                                🍴 Food Recipe Admin

                            </h1>

                            <p class="lead text-center">

                                Kelola resep makanan favorit dengan
                                dashboard admin modern dan mudah digunakan.

                            </p>

                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-lg-6 bg-white">

                    <div class="p-5 p-lg-6">

                        {{-- TITLE --}}
                        <div class="text-center mb-5">

                            <h2 class="fw-bold mb-2">

                                Login Admin

                            </h2>

                            <p class="text-muted">

                                Masuk untuk mengelola resep makanan

                            </p>

                        </div>

                        {{-- ERROR --}}
                        @if(session('error'))

                        <div class="alert alert-danger border-0 shadow-sm rounded-4">

                            {{ session('error') }}

                        </div>

                        @endif

                        {{-- FORM --}}
                        <form action="/login"
                              method="POST">

                            @csrf

                            {{-- EMAIL --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">

                                    Email

                                </label>

                                <input type="email"
                                       name="email"
                                       class="form-control form-control-lg rounded-4"
                                       placeholder="Masukkan email admin">

                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-4">

    <label class="form-label fw-semibold">

        Password

    </label>

    <div class="input-group">

        <input type="password"
               name="password"
               id="password"
               class="form-control form-control-lg rounded-start-4"
               placeholder="Masukkan password">

        <button type="button"
                class="btn btn-outline-secondary rounded-end-4 px-4"
                onclick="togglePassword()">

            👁️

        </button>

    </div>

</div>

                            {{-- BUTTON --}}
                            <button class="btn btn-dark btn-lg w-100 rounded-4 shadow-sm">

                                🔐 Login Sekarang

                            </button>

                        </form>

                        {{-- BACK --}}
                        <div class="text-center mt-4">

                            <a href="/recipes"
                               class="text-decoration-none text-muted">

                                ← Kembali ke halaman user

                            </a>

                        </div>

                        {{-- LOGIN INFO --}}
                        <div class="mt-5 p-4 bg-light rounded-4">

                            <h6 class="fw-bold mb-3">

                                Demo Login Admin

                            </h6>

                            <p class="mb-1">
                                <strong>Email:</strong>
                                admin@gmail.com
                            </p>

                            <p class="mb-0">
                                <strong>Password:</strong>
                                admin123
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword() {

    const password = document.getElementById('password');

    if (password.type === 'password') {

        password.type = 'text';

    } else {

        password.type = 'password';

    }

}

</script>

@endsection