<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Food Recipe</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#f5f5f5;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold fs-3"
           href="/recipes">

            🍔 Food Recipe

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-center">

                <li class="nav-item me-3">

                    <a href="/recipes"
                       class="nav-link active">

                        Home

                    </a>

                </li>

                @if(session()->has('admin'))

                <li class="nav-item me-3">

                    <a href="/admin"
                       class="btn btn-warning rounded-pill px-4">

                        Admin

                    </a>

                </li>

                <li class="nav-item">

                <a href="/logout"
   onclick="confirmLogout()"
   class="btn btn-danger rounded-pill px-4">

    Logout

</a>

                </li>

                @else

                <li class="nav-item">

                    <a href="/login"
                       class="btn btn-success rounded-pill px-4">

                        Admin

                    </a>

                </li>

                @endif

            </ul>

        </div>

    </div>

</nav>

<div class="container py-5">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

function confirmLogout() {

    Swal.fire({

        title: 'Logout?',
        text: "Yakin ingin keluar dari admin?",
        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',

        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'

    }).then((result) => {

        if (result.isConfirmed) {

            window.location.href = "/logout";

        }

    });

}

</script>
<script>

function confirmDelete(id) {

    Swal.fire({

        title: 'Hapus Resep?',
        text: "Data yang dihapus tidak bisa dikembalikan.",
        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',

        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'

    }).then((result) => {

        if (result.isConfirmed) {

            document.getElementById('delete-form-' + id).submit();

        }

    });

}

</script>
@if(session('success'))

<script>

Swal.fire({

    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    showConfirmButton: false,
    timer: 2000

});

</script>

@endif
<script>

function confirmEdit(url) {

    Swal.fire({

        title: 'Edit Resep?',
        text: "Kamu akan masuk ke halaman edit resep.",
        icon: 'question',

        showCancelButton: true,

        confirmButtonColor: '#f0ad4e',
        cancelButtonColor: '#6c757d',

        confirmButtonText: 'Ya, Edit',
        cancelButtonText: 'Batal'

    }).then((result) => {

        if (result.isConfirmed) {

            window.location.href = url;

        }

    });

}

</script>
</body>
</html>