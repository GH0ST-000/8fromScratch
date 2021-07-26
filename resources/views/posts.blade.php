<x-layout>
<x-slot name="slot">
    @include('_post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
 <x-post-featured-card :post="$posts[0]"/>

        <div class="lg:grid lg:grid-cols-2">
            @foreach($posts->skip(1) as $post)
       <x-post-card :post="$post" />
            @endforeach


        </div>

{{--        <div class="lg:grid lg:grid-cols-3">--}}
{{--            <!-- =====================================================================================  -->--}}
{{--            <!-- BLADE COMPONENT -->--}}
{{--            <x-post-card />--}}
{{--            <x-post-card />--}}
{{--            <x-post-card />--}}


{{--        </div>--}}
    </main>

    </x-slot>
</x-layout>
