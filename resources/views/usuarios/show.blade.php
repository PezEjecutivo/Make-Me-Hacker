@extends('usuarios.layouts')

@section('content')

<div style="display:flex; justify-content: flex-start; align-items: center; min-width: 800px; min-height:500px; background-color:aliceblue; margin: 100px; border-radius: 10px">
    <div style="display:flex; width:200px; height:200px; border-radius: 100%; background-color:skyblue; margin: 30px;"></div>

    <div style="display: flex; flex-direction: column; gap:10px; margin-right: 100px">
        <label for="code"><strong>Nombre:</strong></label>
        <div>
            {{ $user->name }}
        </div>
    </div>

    <div style="display: flex; flex-direction: column; gap:10px; margin-right: 100px">
        <label for="type"><strong>Email:</strong></label>
        <div>
            {{ $user->email }}
        </div>
    </div>
</div>

@endsection
