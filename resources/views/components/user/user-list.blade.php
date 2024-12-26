@extends('layouts.default')

@section('content')
<div>
    <h1>Lista de usuários</h1>
    
    @if($type === 'lista')
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    {{ $user->name }}
                </li>
            @endforeach
        </ul>
    @elseif($type === 'card')
        @foreach($users as $user)
            <div class="card shadow mb-2">
                <div class="card-body">
                    {{ $user->name }}
                </div>
            </div>
        @endforeach
    
    @endif
    
</div>

@endsection