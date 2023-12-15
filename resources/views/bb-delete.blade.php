<html>
<head>
    <meta charset="UTF-8">
    <title>Удаление объявления :: Мои объявления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container">
    @extends('layouts.app')
    @section('title', $bb->title)
    @section('content')
        <h2>{{ $bb->title }}</h2><br>
        <p>Описание товара:<br><i>{{ $bb->content }}</i></p>
        <p>Цена товара:<br><i>{{ $bb->price }} руб.</i></p>
        <p>Автор: <i>{{ $bb->user->name }}</i></p>
        <form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Удалить">
        </form>
    @endsection('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
