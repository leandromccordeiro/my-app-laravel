{{-- @extends('layouts.default') --}}

{{-- @section('content') --}}
    <button 
        {{ $attributes->merge(['class' => 'btn btn-'.$variant]) }}>
        {{-- {{ $attributes->class(['btn', 'btn-danger' => $isRed]) }}> --}}

        {{ $name }}
    </button>
{{-- @endsection --}}