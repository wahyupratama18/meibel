<ol class="flex mt-3 text-white text-sm">
    <li class="inline-flex items-center">
        <a class="flex items-center gap-2" href="{{ request()->root() }}">
            <i class="fas fa-home"></i>
            Home
        </a>
        @if (isset($navs))    
        <svg
        class="h-5 w-auto text-white"
        fill="currentColor"
        viewBox="0 0 20 20">
            <path
            fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd"></path>
        </svg>
        @endif
    </li>
    @forelse ($navs ?? [] as $key => $value)
    <li class="inline-flex items-center">
        <a href="{{ route($value->route, $value->params) }}">
            {{ $value->text }}
        </a>
        @if(isset($navs[1 + $key]))
        <svg class="h-5 w-auto text-white" fill="currentColor" viewBox="0 0 20 20" > <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" ></path> </svg>
        @endif
    </li>
    @empty
    @endforelse
</ol>