@php
    use Illuminate\Support\Str;
@endphp
<div class="">
    @foreach ($ui_components as $component)
        <a href="{{ $component->getUrl() }}" class="mb-3 flex text-white">
            <span @class(['text-base font-normal', 'text-white' => Str::of($page->getPath())->slug('-') == Str::of($component->title)->slug('-') ])>{{ $component->title }}</span>
        </a>
    @endforeach
</div>