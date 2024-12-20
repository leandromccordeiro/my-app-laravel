<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Usuários</h1>

    {{-- @unless (count($users))
        <p>Nenhum usuário cadastrado</p>
    @endunless
        
    @foreach ($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach --}}

    <br><br>

    @forelse($users as $user)
        <p>{{ $user->name }}</p>
    @empty
        <p>Nenhum usuário cadastrado</p>
    @endforelse

</body>
</html>