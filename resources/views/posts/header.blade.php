<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>
    <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg"
                                                       alt="Head of Lary the mascot"></h2>
    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing the popular Laravel series with new content.
        I'm going to keep you guys up to speed with what's going on!
    </p>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex  bg-gray-100 rounded-xl">
            <div x-data="{show:false}" @click.away="show=false">
                <button @click="show=! show"  class=" w-32 py-2 pl-3 pr-9 text-sm lg:w-32 lg:inline-flex font-semibold text-left">
                    {{isset($currentCategory) ? ucwords($currentCategory->name ): 'categories'}}
                     @include('components.svg.headersvg');
                </button>
                <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display:none">
                    @foreach($categories as $categori)
                        <a  href="/categories/{{ $categori->slug }}"
                            class="block text-left px-3 text-sm leading-6 hover:bg-blue-500
                  focus:bg-gray-300 hover:text-white focus:text-white
                  ">
                            {{ucwords( $categori->name )}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Other Filters -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                <option value="category" disabled selected>Other Filters</option>
                <option value="foo">Foo</option>
                <option value="bar">Bar</option>
            </select>
          @include('components.svg.headersvg')
        </div>
        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/category/{{ $categori->slug }}">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif
                <input type="text" name="search" placeholder="Find something"
                       value="{{request('search')}}"
                       class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
