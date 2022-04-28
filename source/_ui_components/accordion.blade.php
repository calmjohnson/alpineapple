---
extends: _layouts.component
title: Accordion
description: How to build an accordion ui component using Alpine.js and Taiwind Css
author: Nonso Mbah
image: accordion
---

@section('body')
<main class="mx-10 relative">

    <div class="mt-10 grid grid-cols-12 gap-10">
        <!--BEGIN: Sidebar-->
        <div class="col-span-2">
            @include('_partials.sidebar')
        </div>
        <!--END: Sidebar-->
        <!--BEGIN: Component-->
        <div class="col-span-7 relative">
            <h1 class="font-bold text-4xl text-white">{{ $page->title }}</h1>
            
            <!--BEGIN: Code Block-->
            <div x-data="{ tab : 'preview' }" class="relative w-full mt-5">
                
                <!--BEGIN: Tabs -->
                <div class="absolute z-10 px-5 mt-2 text-xs text-white top-0 right-0 flex justify-end items-center space-x-3">
                    <button @click="tab = 'preview'" :class="tab === 'preview' ? 'bg-black bg-opacity-50 p-2 rounded-md shadow' : ''">
                        Preview
                    </button>
                    <button @click="tab = 'code'" :class="tab === 'code' ? 'bg-slate-600 bg-opacity-50 p-2 rounded-md shadow' : ''">
                        Code
                    </button>
                    <span class="font-bold text-slate-100">|</span>
                    <div x-data="{ copied : false }" class="relative flex flex-col items-center space-x-1">
                        <span x-show="copied" class="absolute -mt-10 text-slate-500">Copied!</span>
                        <button class="" @click="copied = true, setTimeout(() => copied = false, 2000), copyToClipboard($refs.code.firstElementChild.outerHTML)
                        ">
                            Copy
                        </button>
                    </div>
                    <script>
                        function copyToClipboard($data)
                        {
                            var input = document.createElement('textarea');
                            input.innerHTML = $data;
                            document.body.appendChild(input);
                            input.select();
                            document.execCommand('copy');
                            document.body.removeChild(input);
                        }
                    </script>
                </div>
                <!--END: Tabs -->
                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" x-ref="code" class="px-20 w-full h-96 rounded-lg bg-gradient-to-r from-yellow-600 to-amber-700">
                    <div x-data="{ selected : 1 }" class="flex flex-col justify-center items-center p-20 space-y-1 text-slate-800">
                        <!--Question-->
                        <div class="flex flex-col w-full space-y-1">
                            <button @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
                                <span class="mr-auto text-sm">First question</span>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    :class="selected === 1 ? 'rotate-180' : ''"
                                    class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <div x-show="selected === 1" class="p-2 text-sm rounded bg-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                            </div>
                        </div>
                        <!--Question-->
                        <!--Question-->
                        <div class="flex flex-col w-full space-y-1">
                            <button @click="selected !== 2 ? selected = 2 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
                                <span class="mr-auto text-sm">Second question</span>
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                    :class="selected === 2 ? 'rotate-180' : ''"
                                    class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <div x-show="selected === 2" class="p-2 text-sm rounded bg-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                            </div>
                        </div>
                        <!--Question-->
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="{ selected : 2 }" class="flex flex-col justify-center items-center my-20 mx-20 space-y-1 text-slate-800">
    <!--Question-->
    <div class="flex flex-col w-full space-y-1">
        <button @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
            <span class="mr-auto text-sm">First question</span>
            <svg xmlns="http://www.w3.org/2000/svg" 
                :class="selected === 1 ? \'rotate-180\' : \'\'"
                class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
        </button>
        <div x-show="selected === 1" x-collapse class="p-2 text-sm rounded bg-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
        </div>
    </div>
    <!--Question-->
    <!--Question-->
    <div class="flex flex-col w-full space-y-1">
        <button @click="selected !== 2 ? selected = 2 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
            <span class="mr-auto text-sm">Second question</span>
            <svg xmlns="http://www.w3.org/2000/svg" 
                :class="selected === 2 ? \'rotate-180\' : \'\'"
                class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
        </button>
        <div x-show="selected === 2" x-collapse class="p-2 text-sm rounded bg-white">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
        </div>
    </div>
    <!--Question-->
</div>
'}}
                        </code>
                    </pre>
                </div>
                <!--END: Code -->
            </div>
            <!--END: Code Block-->

        </div>
        <!--END: Component-->
    </div>
    
</main>
@endsection