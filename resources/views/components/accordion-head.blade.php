<div
:class="show == '{{ $attributes['show'] }}' ? 'text-sky-500 font-bold' : ''"
class="p-4 shadow rounded flex items-center justify-between cursor-pointer mt-3 bg-slate-100"
@click="
show = show == '{{ $attributes['show'] }}' ? null : '{{ $attributes['show'] }}'
">
    <h2>{{ $title }}</h2>
    <i :class="show == '{{ $attributes['show'] }}' ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas"></i>
</div>