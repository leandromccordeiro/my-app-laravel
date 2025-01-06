@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <div>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection