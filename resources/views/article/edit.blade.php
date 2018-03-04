<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - 白俊遥博客</title>
</head>
<body>
<form action="{{ url('view/update', $article->id) }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="title" value="{{ $article->title }}"> <br>
    <input type="text" name="content" value="{{ $article->content }}"> <br>
    <button type="submit">提交</button>
</form>
</body>
</html>