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
</head>

<body>

  <div class="cards">

    @foreach ($desafios as $desafio)

    <article class="card">
      <div class="card__preview">
        @if ($desafio->nombre=="css")
        <img src="{{asset("images/desafios/css.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (CSS)</h2>

        @elseif($desafio->nombre=="java")

        <img src="{{asset("images/desafios/java.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (JAVA)</h2>
        
        @elseif($desafio->nombre=="js")

        <img src="{{asset("images/desafios/js.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (JS)</h2>

        @elseif($desafio->nombre=="php")

        <img src="{{asset("images/desafios/php.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (PHP)</h2>

        @else

        <img src="{{asset("images/desafios/python.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          {{$desafio->dificultad}}
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (PYTHON)</h2>
        
        @endif

        <p class="card__address">
          {{$desafio->descripcion}}
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en {{$desafio->recompensa}}!
        </p>
      </div>
    </article>

    @endforeach
  </div>
</body>

@endsection