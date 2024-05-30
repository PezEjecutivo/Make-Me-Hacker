@extends('usuarios.layouts')

@section('content')

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/information.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>

<body>

    <div style="display: flex; justify-content:center; align-items: flex-start; max-width: 450px; min-height: 700px; background-color:aliceblue; padding: auto; margin: auto; margin-top: 100px; border-radius: 10px;">
        <table style="margin-top: 20px; margin-left: 100px">
            <thead>
                <tr>
                    <th style="padding-right:  100px;" scope="col"><u>Usuario</u></th>
                    <th style="padding-right:  100px;" scope="col"><u>Score</u></th>
                    <th style="padding-right:  100px;" scope="col"><u>Ranking</u></th>
                </tr>
            </thead>
            <tbody>
            <?php $counter=0?>
                @foreach ($users as $user)
                <?php $counter++ ?>
                @if ($toppers==3)

                <tr>
                    <td style="padding-right:  10px; color: goldenrod">{{ $user->name }}</td>
                    <td style="padding-right:  20px; color: goldenrod">{{ $user->score }}</td>
                    <td style="padding-right:  20px; color: goldenrod">{{ $counter }}</td>
                </tr>

                <?php $toppers-- ?>

                @elseif($toppers==2)

                <tr>
                    <td style="padding-right:  10px; color: silver">{{ $user->name }}</td>
                    <td style="padding-right:  20px; color: silver">{{ $user->score }}</td>
                    <td style="padding-right:  20px; color: silver">{{ $counter }}</td>

                </tr>

                <?php $toppers-- ?>

                @elseif($toppers==1)

                <tr>
                    <td style="padding-right:  10px; color: brown">{{ $user->name }}</td>
                    <td style="padding-right:  20px; color: brown">{{ $user->score }}</td>
                    <td style="padding-right:  20px; color: brown">{{ $counter }}</td>

                </tr>

                <?php $toppers-- ?>

                @else

                <tr>
                    <td style="padding-right:  10px;">{{ $user->name }}</td>
                    <td style="padding-right:  20px;">{{ $user->score }}</td>
                    <td style="padding-right:  20px;">{{ $counter }}</td>

                </tr>

                @endif
                
                @endforeach

            </tbody>
        </table>
    </div>

</body>

@endsection