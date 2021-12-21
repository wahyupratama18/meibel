<div x-data="{active:false,open:false}">
    <a
    href="{{ $href ? route($href).($hashtag ? '#'.$hashtag : '') : 'javascript:void(0)' }}"
    @if (!$href)
    @click="open = !open"
    @click.away="open = false"
    @close.stop="open = false"
    @endif
    class="p-2 font-medium border-transparent border-l-4 text-sky-500 hover:text-sky-600 hover:bg-sky-100 hover:border-l-sky-400 focus:outline-none focus:text-sky-700 focus:bg-sky-200 focus:border-l-sky-500 transition flex items-center"
    :class="{'bg-sky-400': active || open}"
    >
        <span>{{ __($title) }}</span>
        @if (!$href)
        <span class="ml-auto">
            <svg class="w-4 h-4 transition-transform transform rotate-180" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </span>
        @endif
    </a>

    <div x-show="open" class="mt-2 space-y-2 px-4 mb-4">
        @foreach ($subs as $key)
        <a href="{{ route($key->link, $key->params) }}" class="block px-4 text-sm text-sky transition-colors duration-200 rounded-md hover:text-sky-600">
            <span>{{ __($key->title) }}</span>
        </a>
        @endforeach
    </div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>