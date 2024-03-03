@extends('layouts.app')

@section('content')
<h1>This is Foods Page</h1>
<a href=/foods/create
 class="btn btn-primary"
  role="button">
    Create a new Food
</a>

<ul class="list-group">
    @foreach ($foods as $food)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">
                    <a href="/foods/{{ $food->id }}">
                        {{ $food->name }}
                    </a>
                </div>
                {{ $food->descriptions }}

            </div>
            <span class="badge bg-primary rounded-pill">
                {{ $food->count }}
            </span>

        <a href="foods/{{ $food->id }}/edit">
            Edit
        </a>    
        {{-- Delete food  --}}
        <form action="/foods/{{ $food->id }}" method="POST">
            @CSRF
            @method('delete')
            <button type="submit" class="btn btn-danger"  onclick="return confirm('Bạn có chắc chắn muốn xoá không?');">
                DELETE
            </button>
        </form>

        </li>
    @endforeach
</ul>

@endsection



{{-- @section('content')
<div class="container">
    <h1>Danh Sách Món Ăn</h1>
    <ol class="list-group">
        @foreach ($foods as $food)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $food->name }} - {{ $food->descriptions }}</div>                      
                    </div>
                    <span class="badge bg-primary rounded-pill">{{ $food->count }}</span>
                </div>
            </li>
        @endforeach
    </ol>
</div>
@endsection --}}
