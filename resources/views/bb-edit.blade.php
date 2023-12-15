@extends('layouts.app')

@section('title', 'Правка объявления :: Мои объявления')

@section('content')
    <form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="txtTitle" class="form-label">Товар</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror"
                   value="{{old('title',  $bb->title) }}">

            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="txtDescription" class="form-label">Описание</label>
            <textarea name="description" id="txtDescription"
                      class="form-control @error('content') is-invalid @enderror"
                      aria-owns="3">{{old('content',  $bb->content) }}</textarea>

            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="txtPrice" class="form-label">Цена</label>
            <input name="price" id="txtPrice" class="form-control @error('price') is-invalid @enderror"
                   value="{{old('price',  $bb->price) }}">

            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
@endsection('content')
