# Fix indentations
# Remove additional blank lines
# Extract logic into the controller
# Use named routes
# Remove rotten code
# Give variables a bit spacing

<x-layout>
    <section>
        <h1 class="text-lg font-bold mb-4">
            Publish New Post
        </h1>

        <x-panel>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
           <div class="mb-6">
               <label class="block mb-2 uppercase font-bold text-xs text-gray-700"  for="title">Title</label>
               <input class="border border-gray-400 p-2 w-full" type="text" value="{{old('title')}}" name="title" id="title" required>
               @error('title')
               <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>
               @enderror
           </div>
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">Slug</label>
                <input class="border border-gray-400 p-2 w-full" type="text" value="{{old('slug')}}" name="slug" id="slug" required>
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>
                @enderror
            </div>

{{--            <div class="mb-6">--}}
{{--                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">Thumbnail</label>--}}
{{--                <input class="border border-gray-400 p-2 w-full" type="file" value="{{old('thumbnail')}}" name="thumbnail" id="thumbnail" required>--}}
{{--                @error('slug')--}}
{{--                <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full" type="text" value="{{old('excerpt')}}" name="excerpt" id="excerpt" required></textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">body</label>
                <textarea class="border border-gray-400 p-2 w-full" type="text" value="{{old('body')}}" name="body" id="body" required></textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">Category</label>
{{--                <textarea class="border border-gray-400 p-2 w-full" type="text" name="category" id="category" required></textarea>--}}
                <select  class="border border-gray-400 p-2 w-full" type="text" name="category_id" id="category_id">
                @php
                # Extract logic into controller
                $categories=App\Models\Category::all();

                @endphp
                @foreach($categories as $categori)
                        <option value="{{$categori->id}}"
                            {{old('category_id')==$categori->id ? 'selected':''}}>
                            {{$categori->name}}</option>
                    @endforeach
                </select>



                @error('category')
                <p class="text-red-500 text-xs mt-2">{{$messsage}}</p>
                @enderror
            </div>
            <x-primary_button></x-primary_button>
        </form>
        </x-panel>
    </section>
</x-layout>
