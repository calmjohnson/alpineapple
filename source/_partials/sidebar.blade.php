@php
    use Illuminate\Support\Str;
@endphp
<div  class="sticky top-0">
    @foreach ($ui_components as $component)
        <a href="{{ $component->getUrl() }}" class="mb-3 flex text-slate-200">
            <span @class(['text-base font-normal', 'text-white' => Str::of($page->getPath())->slug('-') == Str::of($component->title)->slug('-') ])>{{ $component->title }}</span>
        </a>
    @endforeach
</div>