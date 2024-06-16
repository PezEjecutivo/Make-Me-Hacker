@extends('../layouts')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Developers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/developers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="cards">
        @foreach ($developers as $developer)
        <article class="card" data-developer-id="{{ $developer->id }}">
            <div class="card__preview">
                <img src="{{ asset('images/developers/' . strtolower($developer->especialidad) . '.png') }}" alt="{{ $developer->especialidad }} Developer">
                <div class="card__price">
                    ${{ $developer->precio }}
                </div>
            </div>
            <div class="card__content">
                <h2 class="card__title">{{ $developer->nombre }}</h2>
                <p class="card__address">
                    {{ $developer->mejora }}
                </p>
                <p class="card__description">
                    Especialidad: {{ $developer->especialidad }}
                </p>
            </div>
        </article>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {
            $('.card').on('click', function() {
                var developerId = $(this).data('developer-id');
                $.ajax({
                    url: "{{ route('developers.show', ['developer' => '']) }}/" + developerId,
                    method: 'GET',
                    success: function(response) {
                        Swal.fire({
                            title: 'Developer Info',
                            html: '<p>Nombre: ' + response.nombre + '</p><p>Precio: $' + response.precio + '</p><p>Mejora: ' + response.mejora + '</p><p>Especialidad: ' + response.especialidad + '</p>',
                            icon: 'info',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            title: 'Error',
                            text: 'No se pudo cargar la información del developer.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
</body>

@endsection