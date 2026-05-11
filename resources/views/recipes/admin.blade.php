@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-4 gap-3">

    <div>

        <h1 class="fw-bold mb-1">
            👨‍🍳 Dashboard Admin
        </h1>

        <p class="text-muted mb-0">
            Kelola semua resep makanan dengan mudah
        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('recipes.index') }}"
           class="btn btn-dark rounded-pill px-4">

            🍽️ Halaman User

        </a>

        <a href="{{ route('recipes.create') }}"
           class="btn btn-success rounded-pill px-4 shadow-sm">

            ➕ Tambah Resep

        </a>

    </div>

</div>

{{-- ALERT --}}
@if(session('success'))

<div class="alert alert-success border-0 shadow-sm rounded-4">

    {{ session('success') }}

</div>

@endif

{{-- STATISTICS --}}
<div class="row mb-4">

    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-lg rounded-4 h-100">

            <div class="card-body">

                <h5 class="text-muted">
                    Total Resep
                </h5>

                <h1 class="fw-bold">
                    {{ $recipes->total() }}
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-lg rounded-4 h-100">

            <div class="card-body">

                <h5 class="text-muted">
                    Kategori
                </h5>

                <h1 class="fw-bold">
    {{ count($categories) }}
</h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card border-0 shadow-lg rounded-4 h-100">

            <div class="card-body">

                <h5 class="text-muted">
                    Admin
                </h5>

                <h1 class="fw-bold">
                    1
                </h1>

            </div>

        </div>

    </div>

</div>

{{-- TABLE CARD --}}
<div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    <div class="card-header bg-dark text-white p-4 border-0">

        <h4 class="mb-0 fw-bold">
            📋 Daftar Resep
        </h4>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th class="px-4 py-3">No</th>

                        <th class="py-3">Gambar</th>

                        <th class="py-3">Nama Resep</th>

                        <th class="py-3">Kategori</th>

                        <th class="py-3 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recipes as $recipe)

                    <tr>

                        <td class="px-4 fw-semibold">
                            {{ $loop->iteration }}
                        </td>

                        {{-- IMAGE --}}
                        <td>

                            <img src="{{ asset('images/'.$recipe->image) }}"
                                 width="100"
                                 height="70"
                                 class="rounded-3 shadow-sm"
                                 style="object-fit:cover;">

                        </td>

                        {{-- TITLE --}}
                        <td>

                            <h6 class="fw-bold mb-1">

                                {{ $recipe->title }}

                            </h6>

                        </td>

                        {{-- CATEGORY --}}
                        <td>

                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">

                                {{ $recipe->category }}

                            </span>

                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <div class="d-flex flex-wrap justify-content-center gap-2">

                                <a href="{{ route('recipes.show', $recipe->id) }}"
                                   class="btn btn-dark btn-sm rounded-pill px-3">

                                    Detail

                                </a>

                                <a href="#"
   onclick="confirmEdit('{{ route('recipes.edit', $recipe->id) }}')"
   class="btn btn-warning btn-sm rounded-pill px-3">

    ✏️ Edit

</a>

<form id="delete-form-{{ $recipe->id }}"
      action="{{ route('recipes.destroy', $recipe->id) }}"
      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button"
        onclick="confirmDelete({{ $recipe->id }})"
        class="btn btn-danger btn-sm rounded-pill px-3">

    🗑️ Hapus

</button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5"
                            class="text-center py-5 text-muted">

                            Belum ada data resep 🍽️

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- PAGINATION --}}
<div class="d-flex justify-content-center mt-4">

    {{ $recipes->links() }}

</div>

@endsection