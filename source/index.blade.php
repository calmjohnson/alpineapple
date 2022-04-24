---
extends: _layouts.main
title: Alpine JS UI Components
---
@extends('_layouts.main')

@section('body')
<main class="mx-10">

    <!--BEGIN: Intro-->
    <div class="mt-5 sm:mt-10 flex justify-center">
        <h1
          class="bg-gradient-to-r from-red-500 to-blue-500 bg-clip-text text-center text-lg md:text-6xl font-black text-transparent"
        >
          Accessible Alpine JS UI Components styled with Tailwind Css
        </h1>
    </div>
    <!--END: Intro-->

    <!--BEGIN: Components-->
    <div class="mt-10 sm:mt-20 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
        @foreach ($ui_components as $component)
            <a href="{{ $component->getUrl() }}" class="flex justify-center flex-col space-y-2">
                @include('_partials.svgs.image', ['component' => $component->image])
                <span class="text-base text-white font-medium">{{ $component->title }}</span>
            </a>
        @endforeach
    </div>
    <!--END: Components-->

</main>
@endsection
