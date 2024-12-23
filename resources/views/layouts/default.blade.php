<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel app</title>
    @stack('css')
</head>
<body>
    @section('content')
        Conteúdo padrão
    @show 
    <br><br>
    @yield('yield', 'Conteúdo padrão Yield')
</body>
</html>