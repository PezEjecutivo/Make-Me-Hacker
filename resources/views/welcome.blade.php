@extends('../layouts')

@section('content')

<head>
    <title>Make me hacker! - Inicio</title>
    <style>
        @keyframes shake {
            0% {
                transform: translate(0, 0);
            }
            25% {
                transform: translate(-5px, -5px);
            }
            50% {
                transform: translate(5px, 5px);
            }
            75% {
                transform: translate(-5px, -5px);
            }
            100% {
                transform: translate(0, 0);
            }
        }

        .shake {
            animation: shake 0.5s;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 150px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        .score-display {
            display: flex;
            flex-direction: row;
            gap: 10px;
            justify-content: center;
            font-size: 2rem;
            color: goldenrod;
            font-weight: bold;
        }

        .save-button {
            background-color: rgb(49, 39, 138);
            border: none;
            border-radius: 5px;
            min-height: 50px;
            min-width: 500px;
            font-size: 3rem;
            color: white;
            text-align: center;
            margin-top: 20px;
        }

        .hidden-input {
            display: none;
        }
    </style>
</head>

<body>
    <div style="display:flex; flex-direction: row;">

        <div class="container" style="display:flex; justify-content: flex-start; gap:10px; color: white">
            <!-- @if ($userDesafios) -->
            <p>Tienes activados los siguientes programadores: </p>
            <!-- @foreach ($userDesafios as $userDesafio)

            <div>
                <p>Desafio de {{$userDesafio->desafio->nombre}}</p>
                <p>Tienes que conseguir {{$userDesafio->desafio->dificultad}}</p>
            </div>

            @endforeach
            @endif -->
        </div>
        <div class="container">
            <div class="score-display">
                Dinero: <div id="display-score"></div>
            </div>
            <div style="color:red; font-size:32px" id="countdown-timer"></div>
            <img id="pc" src="{{ asset('images/menu/Logo.svg') }}" alt="Logo" onclick="getScore()">
            <form action="{{ route('save-score') }}" method="post" id="save-score-form">
                @csrf
                <div class="hidden-input">
                    <input type="text" class="form-control @error('score') is-invalid @enderror" id="input-score" name="score" value="">
                </div>
                <input type="submit" class="save-button" value="Guardar progreso">
            </form>
        </div>

        
        <div class="container" style="display:flex; justify-content: flex-start; gap:10px; color: white">
            @if ($userDesafios)
            <p>Tienes activados los siguientes desafios: </p>
            @foreach ($userDesafios as $userDesafio)

            <div style="background:rgba(0, 0, 0, 0.3); border-radius:10px; padding:10px">
                <p>Desafio de {{$userDesafio->desafio->nombre}}</p>
                <p>Tienes que conseguir {{$userDesafio->desafio->dificultad}}</p>
            </div>

            @endforeach
            @endif
        </div>
    </div>

    <script>
    var score = parseInt("{{ $user->score }}");
    var actualScore = score;
    var userDesafios = @json($userDesafios);
    var completedDesafios = {};
    var timer;

    document.getElementById("display-score").innerHTML = score + "$";
    document.getElementById("input-score").value = score;

    const getScore = () => {
        ++score;
        document.getElementById("display-score").innerHTML = score + "$";
        document.getElementById("input-score").value = score;

        let displayScoreDiv = document.getElementById("pc");
        displayScoreDiv.classList.add("shake");

        setTimeout(() => {
            displayScoreDiv.classList.remove("shake");
        }, 500);

        checkDesafios();
    };

    const checkDesafios = () => {
        userDesafios.forEach(desafio => {
            console.log(actualScore+parseInt(desafio.desafio.dificultad))
            if (!completedDesafios[desafio.desafio.id] && score > actualScore+parseInt(desafio.desafio.dificultad)) {
                score += parseInt(desafio.desafio.recompensa);
                document.getElementById("display-score").innerHTML = score + "$";
                document.getElementById("input-score").value = score;
                completedDesafios[desafio.desafio.id] = true;
                stopTimerAndSaveScore();
            }
        });
    };

    const penalizeUncompletedDesafios = () => {
        userDesafios.forEach(desafio => {
            if (!completedDesafios[desafio.desafio.id]) {
                score -= desafio.desafio.dificultad * 2;
                if (score < 0) {
                    score = 0;
                }
                document.getElementById("display-score").innerHTML = score + "$";
                document.getElementById("input-score").value = score;
            }
        });
        stopTimerAndSaveScore();
    };

    const stopTimerAndSaveScore = () => {
        clearInterval(timer);
        document.getElementById("save-score-form").submit();
    };

    const startCountdown = () => {
        var timeLeft = 180; 
        const timerDisplay = document.getElementById("countdown-timer");

        timer = setInterval(() => {
            timeLeft--;
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            timerDisplay.innerHTML = `Tiempo restante: ${minutes}:${seconds < 10 ? '0' + seconds : seconds}`;
            
            if (timeLeft <= 0) {
                clearInterval(timer);
                timerDisplay.innerHTML = "Se acabo el tiempo!";
                penalizeUncompletedDesafios();
            }
        }, 1000);
    };

    if (userDesafios.length > 0) {
        startCountdown();
    }
</script>

</body>
@endsection
