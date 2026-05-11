@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        <div class="card border-0 shadow-lg overflow-hidden">

            {{-- IMAGE --}}
            @if($recipe->image)

            <div class="position-relative">

                <img src="{{ asset('images/'.$recipe->image) }}"
                     class="w-100"
                     style="height:500px; object-fit:cover;">

                <div class="position-absolute top-0 start-0 w-100 h-100"
                     style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                </div>

                <div class="position-absolute bottom-0 start-0 p-4 text-white">

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                        {{ $recipe->category }}
                    </span>

                    <h1 class="fw-bold">
                        {{ $recipe->title }}
                    </h1>

                </div>

            </div>

            @endif

            {{-- CONTENT --}}
            <div class="card-body p-5">

                <div class="row">

                    {{-- INGREDIENTS --}}
                    <div class="col-md-5 mb-4">

                        <div class="bg-light rounded-4 p-4 h-100">

                            <h3 class="fw-bold mb-4">
                                🥘 Bahan-Bahan
                            </h3>

                            <div class="text-secondary"
                                 style="line-height: 2;">

                                {!! nl2br(e($recipe->ingredients)) !!}

                            </div>

                        </div>

                    </div>

                    {{-- INSTRUCTIONS --}}
                    <div class="col-md-7">

                        <div class="bg-light rounded-4 p-4 h-100">

                            <h3 class="fw-bold mb-4">
                                👨‍🍳 Langkah Memasak
                            </h3>

                            <div class="text-secondary"
                                 style="line-height: 2;">

                                {!! nl2br(e($recipe->instructions)) !!}

                            </div>

                        </div>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="mt-5 d-flex gap-3">

                    <a href="{{ url()->previous() }}"
                       class="btn btn-dark px-4 py-2 rounded-pill">

                        ← Kembali

                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection