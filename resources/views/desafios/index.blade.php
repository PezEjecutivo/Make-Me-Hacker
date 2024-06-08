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
    <article class="card">
      <div class="card__preview">
        <img src="{{asset("images/desafios/css.png")}}" alt="Lakeview Elegance preview">
        <div class="card__price">
          $1000
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (CSS)</h2>
        <p class="card__address">
          Consigue ese dinero en 3 minutos!
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en 2000!
        </p>
      </div>
    </article>
    <article class="card">
      <div class="card__preview">
        <img src="{{asset("images/desafios/java.png")}}" alt="Vista Paradiso">
        <div class="card__price">
          $200
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (JAVA)</h2>
        <p class="card__address">
          Consigue ese dinero en 3 minutos!
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en 400!
        </p>
      </div>
    </article>
    <article class="card">
      <div class="card__preview">
        <img src="{{asset("images/desafios/js.png")}}" alt="Skyline Oasis">
        <div class="card__price">
          $150
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (JS)</h2>
        <p class="card__address">
          Consigue ese dinero en 3 minutos!
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en 300!
        </p>
      </div>
    </article>
    <article class="card">
      <div class="card__preview">
        <img src="{{asset("images/desafios/php.png")}}" alt="Skyline Oasis">
        <div class="card__price">
          $300
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (PHP)</h2>
        <p class="card__address">
          Consigue ese dinero en 3 minutos!
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en 600!
        </p>
      </div>
    </article>
    <article class="card">
      <div class="card__preview">
        <img src="{{asset("images/desafios/python.png")}}" alt="Skyline Oasis">
        <div class="card__price">
          $500
        </div>
      </div>
      <div class="card__content">
        <h2 class="card__title">Desafio normal (PYTHON)</h2>
        <p class="card__address">
          Consigue ese dinero en 3 minutos!
        </p>
        <p class="card__description">
          Escogue este desafio y aumentaras tu dinero en 1000!
        </p>
      </div>
    </article>
  </div>
  <script src="script.js"></script>
</body>

@endsection