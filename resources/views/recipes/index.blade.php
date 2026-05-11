@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<div class="bg-dark text-white rounded-4 p-5 mb-5 shadow-lg position-relative overflow-hidden">

    <div class="row align-items-center">

        <div class="col-lg-7">

            <h1 class="display-4 fw-bold mb-3">
                🍴 Temukan Resep Makanan Favoritmu
            </h1>

            <p class="lead text-light mb-4">
                Jelajahi berbagai resep makanan lezat, mudah dibuat,
                dan cocok untuk keluarga setiap hari.
            </p>

            <a href="#recipes"
               class="btn btn-warning btn-lg rounded-pill px-4">

                Lihat Resep

            </a>

        </div>

        <div class="col-lg-5 text-center">

            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop"
                 class="img-fluid rounded-4 shadow"
                 style="max-height:300px; object-fit:cover;">

        </div>

    </div>

</div>

{{-- HEADER --}}
<div id="recipes"
     class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">

    <div>

        <h2 class="fw-bold mb-1">
            Daftar Resep Makanan
        </h2>

        <p class="text-muted">
            Total {{ $recipes->count() }} resep tersedia
        </p>

    </div>

    {{-- SEARCH --}}
    <form action=""
          method="GET"
          class="d-flex">

        <input type="text"
               name="search"
               class="form-control rounded-pill me-2 px-4"
               placeholder="Cari resep makanan..."
               value="{{ request('search') }}">

        <button class="btn btn-dark rounded-pill px-4">
            Cari
        </button>

    </form>

</div>

{{-- ALERT --}}
@if(session('success'))

<div class="alert alert-success border-0 shadow-sm rounded-4">

    {{ session('success') }}

</div>

@endif

{{-- RECIPE LIST --}}
<div class="row">

    @forelse($recipes as $recipe)

    <div class="col-md-6 col-lg-4 mb-4">

        <div class="card border-0 shadow-lg h-100 rounded-4 overflow-hidden recipe-card">

            {{-- IMAGE --}}
            @if($recipe->image)

            <a href="{{ route('recipes.show', $recipe->id) }}"
               class="text-decoration-none">

                <div class="overflow-hidden">

                    <img src="{{ asset('images/'.$recipe->image) }}"
                         class="card-img-top recipe-image"
                         style="height:250px; object-fit:cover; transition:0.4s;">

                </div>

            </a>

            @endif

            {{-- CONTENT --}}
            <div class="card-body d-flex flex-column">

                <div class="mb-3">

                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                        {{ $recipe->category }}

                    </span>

                </div>

                <h4 class="fw-bold mb-3">

                    {{ $recipe->title }}

                </h4>

                <p class="text-muted small flex-grow-1">

                    {{ \Illuminate\Support\Str::limit($recipe->ingredients, 100) }}

                </p>

                <div class="mt-3">

                    <a href="{{ route('recipes.show', $recipe->id) }}"
                       class="btn btn-dark rounded-pill px-4">

                        🍽️ Lihat Detail

                    </a>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-warning rounded-4 shadow-sm">

            Resep tidak ditemukan.

        </div>

    </div>

    @endforelse

</div>

{{-- PAGINATION --}}
<div class="d-flex justify-content-center mt-4">

    {{ $recipes->links() }}

</div>

{{-- CUSTOM STYLE --}}
<style>

.recipe-card:hover .recipe-image{
    transform: scale(1.08);
}

.recipe-card{
    transition:0.3s;
}

.recipe-card:hover{
    transform:translateY(-5px);
}

</style>

@endsection