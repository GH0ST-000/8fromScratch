<!doctype html>
<html lang="en">
<head>
   <link rel="stylesheet" href="/app.css">
</head>
<body>

<article>
    <h1>
        {{$post->title}}

    </h1>
    <p>
        <a href="">By Luka Work</a>  <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
    </p>
    <div class="div">
        {!! $post->body !!}
    </div>
</article>
<a href="/">GO BACK</a>
</body>
</html>
