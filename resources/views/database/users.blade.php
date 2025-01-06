@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <div>
        @if(is_countable($users) && count($users) > 1)
            <ul>
                @foreach ($users as $user)
                    <li class="badge text-bg-secondary">{{ $user->email_verified_at }} --- {{ $user->name }} </li><br>
                @endforeach
            </ul>
        @else
            <ul>
                <li class="badge text-bg-secondary">
                    {{ is_object($users) ? $users->name : 'Nenhum usuário encontrado' }}
                </li>
            </ul>
        @endif
    </div>
@endsection