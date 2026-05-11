@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    ✏️ Edit Resep
                </h2>

                <p class="text-muted">
                    Update data resep makanan dengan mudah
                </p>

            </div>

            <a href="{{ route('recipes.admin') }}"
               class="btn btn-dark rounded-pill px-4">

                ← Kembali

            </a>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-sm rounded-4">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

        @endif

        {{-- CARD --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- TOP IMAGE --}}
            @if($recipe->image)

            <img src="{{ asset('images/'.$recipe->image) }}"
                 class="w-100"
                 style="height:350px; object-fit:cover;">

            @endif

            <div class="card-body p-5">

                <form action="{{ route('recipes.update', $recipe->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- LEFT --}}
                        <div class="col-lg-6">

                            {{-- TITLE --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Nama Makanan
                                </label>

                                <input type="text"
                                       name="title"
                                       class="form-control form-control-lg rounded-3"
                                       value="{{ $recipe->title }}">

                            </div>

                            {{-- CATEGORY --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Kategori
                                </label>

                                <select name="category"
                                        class="form-select form-select-lg rounded-3">

                                    <option value="Makanan "
                                        {{ $recipe->category == 'Makanan ' ? 'selected' : '' }}>
                                        Makanan 
                                    </option>

                                    <option value="Dessert"
                                        {{ $recipe->category == 'Dessert' ? 'selected' : '' }}>
                                        Dessert
                                    </option>

                                    <option value="Minuman"
                                        {{ $recipe->category == 'Minuman' ? 'selected' : '' }}>
                                        Minuman
                                    </option>

                                    <option value="Seafood"
                                        {{ $recipe->category == 'Seafood' ? 'selected' : '' }}>
                                        Seafood
                                    </option>

                                    <option value="Junk Food"
                                        {{ $recipe->category == 'Junk Food' ? 'selected' : '' }}>
                                        Junk Food
                                    </option>

                                    <option value="Healthy Food"
                                        {{ $recipe->category == 'Healthy Food' ? 'selected' : '' }}>
                                        Healthy Food
                                    </option>

                                    <option value="Cemilan"
                                        {{ $recipe->category == 'Cemilan' ? 'selected' : '' }}>
                                        Cemilan
                                    </option>

                                </select>

                            </div>

                            {{-- IMAGE --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Upload Gambar Baru
                                </label>

                                <input type="file"
                                       name="image"
                                       class="form-control form-control-lg rounded-3">

                                <small class="text-muted">
                                    Format: JPG, JPEG, PNG
                                </small>

                            </div>

                        </div>

                        {{-- RIGHT --}}
                        <div class="col-lg-6">

                            {{-- INGREDIENTS --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Bahan-Bahan
                                </label>

                                <textarea name="ingredients"
                                          rows="6"
                                          class="form-control rounded-3">{{ $recipe->ingredients }}</textarea>

                            </div>

                            {{-- INSTRUCTIONS --}}
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Langkah Memasak
                                </label>

                                <textarea name="instructions"
                                          rows="6"
                                          class="form-control rounded-3">{{ $recipe->instructions }}</textarea>

                            </div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4 d-flex gap-3">

                        <button class="btn btn-warning btn-lg rounded-pill px-5">

                            💾 Update Resep

                        </button>

                        <a href="{{ route('recipes.admin') }}"
                           class="btn btn-secondary btn-lg rounded-pill px-5">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection