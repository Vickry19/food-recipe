@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-lg-10">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold mb-1">
                    🍳 Tambah Resep Baru
                </h2>

                <p class="text-muted">
                    Tambahkan resep makanan favoritmu dengan mudah
                </p>

            </div>

            <a href="{{ route('recipes.admin') }}"
               class="btn btn-dark rounded-pill px-4">

                ← Kembali

            </a>

        </div>

        {{-- ERROR --}}
        @if ($errors->any())

        @endif

        {{-- CARD --}}
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- HEADER IMAGE --}}
            <div class="bg-dark text-white p-5">

                <h1 class="fw-bold">
                    👨‍🍳 Create New Recipe
                </h1>

                <p class="mb-0 text-light">
                    Lengkapi informasi resep makanan dengan benar
                </p>

            </div>

            {{-- FORM --}}
            <div class="card-body p-5">

            <form id="recipeForm"
      action="{{ route('recipes.store') }}"
      method="POST"
      enctype="multipart/form-data">

                    @csrf

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
           class="form-control form-control-lg rounded-3 @error('title') is-invalid @enderror"
           placeholder="Contoh: Nasi Goreng"
           value="{{ old('title') }}">

    @error('title')

    <div class="text-danger mt-2">

        {{ $message }}

    </div>

    @enderror

</div>

                            {{-- CATEGORY --}}
                            <div class="mb-4">

<label class="form-label fw-semibold">
    Kategori
</label>

<select name="category"
        class="form-select form-select-lg rounded-3 @error('category') is-invalid @enderror">

    <option value="">
        -- Pilih Kategori --
    </option>

    <option value="Makanan "
        {{ old('category') == 'Makanan ' ? 'selected' : '' }}>
        Makanan 
    </option>

    <option value="Dessert"
        {{ old('category') == 'Dessert' ? 'selected' : '' }}>
        Dessert
    </option>

    <option value="Minuman"
        {{ old('category') == 'Minuman' ? 'selected' : '' }}>
        Minuman
    </option>

    <option value="Seafood"
        {{ old('category') == 'Seafood' ? 'selected' : '' }}>
        Seafood
    </option>

    <option value="Junk Food"
        {{ old('category') == 'Junk Food' ? 'selected' : '' }}>
        Junk Food
    </option>

    <option value="Healthy Food"
        {{ old('category') == 'Healthy Food' ? 'selected' : '' }}>
        Healthy Food
    </option>

    <option value="Cemilan"
        {{ old('category') == 'Cemilan' ? 'selected' : '' }}>
        Cemilan
    </option>

</select>

@error('category')

<div class="invalid-feedback">

    {{ $message }}

</div>

@enderror

</div>

                            {{-- IMAGE --}}
                            <div class="mb-4">

    <label class="form-label fw-semibold">
        Upload Gambar
    </label>

    <input type="file"
           name="image"
           class="form-control form-control-lg rounded-3 @error('image') is-invalid @enderror">

    <small class="text-muted">
        Wajib upload gambar (JPG, JPEG, PNG)
    </small>

    @error('image')

    <div class="text-danger mt-2">

        {{ $message }}

    </div>

    @enderror

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
              class="form-control rounded-3 @error('ingredients') is-invalid @enderror"
              placeholder="Masukkan bahan-bahan resep...">{{ old('ingredients') }}</textarea>

    @error('ingredients')

    <div class="text-danger mt-2">

        {{ $message }}

    </div>

    @enderror

</div>

                            {{-- INSTRUCTIONS --}}
                            <div class="mb-4">

    <label class="form-label fw-semibold">
        Langkah Memasak
    </label>

    <textarea name="instructions"
              rows="6"
              class="form-control rounded-3 @error('instructions') is-invalid @enderror"
              placeholder="Masukkan langkah memasak...">{{ old('instructions') }}</textarea>

    @error('instructions')

    <div class="text-danger mt-2">

        {{ $message }}

    </div>

    @enderror

</div>

                        </div>

                    </div>

                    {{-- BUTTON --}}
                    <div class="mt-4 d-flex gap-3">

                    <button class="btn btn-success btn-lg rounded-pill px-5">

    💾 Simpan Resep

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