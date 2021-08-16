@auth
    <x-panel>
        <form action="/posts/{{ $posts->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center    ">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="Avatar Not Found"
                     width="40px" height="40" class="rounded-full">
                <h2 class="ml-4">Want To Partisipate</h2>
            </header>
            <div class="mt-6">
         <textarea name="body" class="w-full text-sm focus:outline-none focus:ring"
                   cols="30" rows="5" placeholder="Quick Comment Something" required>

         </textarea>
                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-10 border-t border-gray-200 pt-6">
                <x-primary_button></x-primary_button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/login" style="color: blue">Log In To Partisipate In The Comments</a>
    </p>
@endauth
