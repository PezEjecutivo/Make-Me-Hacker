@extends('../layouts')

@section('content')
<head>
    <title>Make me hacker! - Inicio</title>
</head>
<body>
    <div style="background-color: aliceblue; width: 40%; height: 80%; display: flex; justify-content: center; margin: auto; margin-top: 5%; border-radius: 5px">
        <div style="display: flex; flex-direction: column; ">
            <div style="display: flex; flex-direction: row; gap: 10px; justify-content:center; font-size:2rem; color:goldenrod">
                Dinero: <div id="display-score"></div>
            </div>
            <img src="{{ asset('images/menu/Logo.svg') }}" alt="Logo" onclick="getScore()">
            <form action="{{ route('save-score') }}" method="post">
                @csrf
                <div style="display: none">
                    <input type="text" class="form-control @error('score') is-invalid @enderror" id="input-score" name="score" value="">
                </div>

                <div class="mb-3 row">
                    <input type="submit" style="background-color: rgb(49,39,138); border: none; border-radius:5px; min-height:50px; min-width: 500px; font-size:3rem; color:white" value="Guardar progreso">
                </div>
            </form>
        </div>
    </div>

    <script>
        var score = "{{ $user->score }}";

        document.getElementById("display-score").innerHTML = score + "$";
        document.getElementById("input-score").value = score;

        const getScore = () => {
            ++score;
            document.getElementById("display-score").innerHTML = score + "$";
            document.getElementById("input-score").value = score;
        };
    </script>
</body>
@endsection
