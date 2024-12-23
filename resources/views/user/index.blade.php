{
    {{-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        {{-- @include('user.heading') --}}
        {{-- @includeIf('user.heading') {{-- Incluir se existir --}}
        {{-- @includeWhen(true, 'user.heading') {{-- Incluir quando for true --}}
        {{-- @includeUnless(false, 'user.heading') {{-- Incluir quando for false --}}
        {{-- @includeFirst(['user.custom_heading', 'user.heading']) {{-- Incluir o primeiro que encontrar --}}
        {{-- @include('heading', ['title' => 'Usuários']) --}}
        {{-- @includeWhen(true, 'heading', ['title' => 'UsuáriosWhen']) {{-- Incluir quando for true --}}
        
        {{-- @foreach ($users as $user)
            @include('user.user', ['user' => $user]) {{-- ideia de componentização  
        @endforeach --}}

        {{-- @each('user.user', $users, 'user') ideia de componentização, sem necessidade de foreach --}}
        
        {{-- @unless (count($users))
            <p>Nenhum usuário cadastrado</p>
        @endunless
            
        @foreach ($users as $user)
            <p>{{ $user->name }}</p>
        @endforeach --}}

        <br><br>

        {{-- @forelse($users as $user)
            <p>{{ $user->name }}</p>
        @empty
            <p>Nenhum usuário cadastrado</p>
        @endforelse --}} 

        {{-- <?php $j = 1; ?>
        @while($j < 10)
        {{ $j++ }}
        @endwhile 

    </body>
    </html> --}}
}

@extends('layouts.default')

@section('content')
    @each('user.user', $users, 'user')
@endsection

@section('yield')
    Conteúdo Yield
@endsection