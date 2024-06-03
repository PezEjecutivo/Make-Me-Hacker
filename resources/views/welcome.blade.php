@extends('../layouts')

@section('content')
<head>
    <title>Make me hacker! - Inicio</title>
    <style>
        @keyframes shake {
            0% { transform: translate(0, 0); }
            25% { transform: translate(-5px, -5px); }
            50% { transform: translate(5px, 5px); }
            75% { transform: translate(-5px, -5px); }
            100% { transform: translate(0, 0); }
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
    <div class="container">
        <div class="score-display">
            Dinero: <div id="display-score"></div>
        </div>
        <img id="pc" src="{{ asset('images/menu/Logo.svg') }}" alt="Logo" onclick="getScore()">
        <form action="{{ route('save-score') }}" method="post">
            @csrf
            <div class="hidden-input">
                <input type="text" class="form-control @error('score') is-invalid @enderror" id="input-score" name="score" value="">
            </div>
            <input type="submit" class="save-button" value="Guardar progreso">
        </form>
    </div>

    <script>
        var score = "{{ $user->score }}";

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
        };
    </script>
</body>
@endsection
