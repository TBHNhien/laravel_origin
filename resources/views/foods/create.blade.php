@extends('layouts.app')

@section('content')
    <h1>Enter food information</h1>

<form action="/foods" method="POST" enctype="multipart/form-data"> 
    
    {{-- nơi nhận request này là route foods và phương thức POST --}}
    {{-- không chạy vì liên quan tới CSRF-cross site request forgery(cơ chế bảo mật-prevent CSRF attack) --}}
    @csrf
    {{-- the key is generated at every session start --}}
    {{-- only apply to non-read routes --}}
    {{-- if sone hacker access to this site from his/her site  --}}

    <input 
    class="form-control"
    type="file"
    name="image"
    >  

    <input 
    class="form-control"
    type="text"
    name="name"
    placeholder="Enter food's name">

    <input 
    class="form-control"
    type="text"
    name="descriptions"
    placeholder="Enter food's descriptions">

    <input 
    class="form-control"
    type="text"
    name="count"
    placeholder="Enter food's count">

    {{-- FAKE UI --}}
    <div>
        <label> Choose a categories:</label>
        <select name="category_id" >
            {{-- truyền dannh sách categories lên  --}}
            @foreach($categories as $category) 
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
            @endforeach

        </select>
    </div>

    <button 
    class="btn btn-primary"
    type="submit">
        Submit
    </button>
</form>
{{-- $errors->any() nghia la khac null --}}
    @if($errors->any())
    <div>
        {{-- error nhu 1 mang array nên dùng foreach --}}
        @foreach($errors->all() as $error)
            <p class="text-danger">
                {{ $error }}
            </p>
        @endforeach
    </div>
    @endif

@endsection