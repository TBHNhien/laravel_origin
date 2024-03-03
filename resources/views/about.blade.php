@extends('layouts.app')

@section('content')
<h1>This is About Page</h1>
{{ $x=10 }}
@if($x> 2)
    <h3>x is greater than 2</h3>
@elseif($x <  10)
    <h3>x is less than 2</h3>
@else
    <h3>All conditions are not match</h3>
@endif

{{-- @unless (empty($name))
    <h3>Name is not empty</h3>   
@endunless --}}
{{-- @if(!empty($name))
    <h3>Name is not empty2</h3>   
@endif --}}

{{-- @empty(!$name)
    <h3>Name is not empty3</h3>   
@endempty

@empty($age)
    <h3>Age is empty3</h3>   
@endempty

@isset($name)
    <h3>Name has been set</h3> 
@endisset

@switch($name)
    @case('Nhien')
        <h3>This is me</h3>
        @break
    @case('2')
        <h3>This is not me</h3>
        @break
    @default
        <h3>No one chose</h3>
@endswitch --}}

{{-- @for ($i = 0; $i < 20; $i++)
    <h2>i = {{ $i }}</h2>
@endfor --}}

{{-- @foreach ($names as $eachName)
    <h3>each name : {{ $eachName }}</h3>
@endforeach --}}

{{-- @forelse ($names as $eachName)
    <h3>each name 1 : {{ $eachName }}</h3>
@empty
    <h3>The array is empty</h3>
@endforelse --}}

{{ $i = 0 }}
@while ($i < 10)
    <h3>i = {{ $i }}</h3>
    {{ $i++; }}
@endwhile

@endsection