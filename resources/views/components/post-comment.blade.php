
{{--@dd($post)--}}

@foreach($post->comments as $comment)
<article class="flex bg-gray-100 p-6 border border-gray-200 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="Avatar Not Found" width="60px" height="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold"> John Doe</h3>
            <p class="text-sm">Poseted
                <time>{{$comment->created_at->diffForhumans()}}</time></p>
        </header>
        <p>
           {{$comment->body}}
        </p>
    </div>
</article>
@endforeach
