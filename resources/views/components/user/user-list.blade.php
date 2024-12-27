{{-- @extends('layouts.default') --}}

{{-- @section('content') --}}
<div {{ $attributes }}> {{-- tudo que não passa pela classe, vai para o elemento raíz do template.--}}
    <h1 class="h1">Lista de usuários!</h1>
    <br>
    {{-- {{ $curso }} --}}
    <br>
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
            <div class="card shadow mb-2 bg-{{ $isSelected($user->id) ? 'info' : $cardClass }}">
                <div class="card-body">
                    {{ $user->name }}
                </div>
            </div>
        @endforeach
    
    @endif

</div>

{{-- @endsection --}}