@extends('../layouts')

@section('content')

<head>
  <meta charset="UTF-8">
  <title>Cards</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/desafios.css') }}">
  <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="cards">
    @foreach ($desafios as $desafio)
    <article class="card" data-desafio-id="{{ $desafio->id }}">
      <div class="card__preview">
        @if ($desafio->nombre == "css")
        <img src="{{ asset('images/desafios/css.png') }}" alt="CSS Desafio">
        @elseif($desafio->nombre == "java")
        <img src="{{ asset('images/desafios/java.png') }}" alt="Java Desafio">
        @elseif($desafio->nombre == "js")
        <img src="{{ asset('images/desafios/js.png') }}" alt="JS Desafio">
        @elseif($desafio->nombre == "php")
        <img src="{{ asset('images/desafios/php.png') }}" alt="PHP Desafio">
        @else
        <img src="{{ asset('images/desafios/python.png') }}" alt="Python Desafio">
        @endif
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal ({{ strtoupper($desafio->nombre) }})</h2>
        <p class="card__address">
          {{$desafio->descripcion}}
        </p>
        <p class="card__description">
          Escoge este desafio y aumentaras tu dinero en {{$desafio->recompensa}}!
        </p>
      </div>
    </article>
    @endforeach
  </div>

  <script>
    $(document).ready(function() {
      $('.card').on('click', function() {
        var desafioId = $(this).data('desafio-id');
        $.ajax({
          url: "{{ route('click.store') }}",
          method: 'POST',
          data: {
            _token: "{{ csrf_token() }}",
            desafio_id: desafioId,
            active: 1,
            complete: 0
          },
          success: function(response) {
            if (response.success) {
              alert('Desafio added successfully.');
            }
          },
          error: function(xhr) {
            alert('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
          }
        });
      });
    });
  </script>
</body>

@endsection
