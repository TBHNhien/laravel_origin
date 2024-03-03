@extends('layouts.app')

@section('content')
    <h1>Update food </h1>

<form action="/foods/{{ $food->id }}" method="POST"> 
    {{-- nơi nhận request này là route foods và phương thức POST --}}
    {{-- không chạy vì liên quan tới CSRF-cross site request forgery(cơ chế bảo mật-prevent CSRF attack) --}}
    @csrf

    @method('PUT')
    <input 
    class="form-control"
    type="text"
    name="name"
    value="{{ $food->name }}"
    placeholder="Enter food's name">

    <input 
    class="form-control"
    type="text"
    name="descriptions"
    value="{{ $food->descriptions }}"
    placeholder="Enter food's descriptions">

    <input 
    class="form-control"
    type="text"
    name="count"
    value="{{ $food->count }}"
    placeholder="Enter food's count">

    <button 
    class="btn btn-primary"
    type="submit">
        Update Food
    </button>
</form>

@endsection