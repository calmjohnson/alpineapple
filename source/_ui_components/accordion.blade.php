---
extends: _layouts.component
title: Accordion
author: Nonso Mbah
image: accordion
---

@section('body')
    <h1 class="font-bold text-4xl text-white">{{ $page->title }}</h1>
    <x-torchlight-code language='php'>
        echo 'hello world'
    </x-torchlight-code>
    <x-torchlight-code language='css'>
        .fuck{
            background-color: #ffffff;
        }
    </x-torchlight-code>
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
            <button>
                Copy
            </button>
        </div>
        <!--END: Tabs -->
        <!--BEGIN: Preview -->
        <div x-show="tab === 'preview'" class="absolute w-full h-auto rounded-lg bg-gradient-to-r from-yellow-600 to-amber-700">
            <div x-data="{ selected : 2 }" class="flex flex-col justify-center items-center my-20 mx-20 space-y-1 text-slate-800">
                <!--Question-->
                <div class="flex flex-col w-full space-y-1">
                    <button @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
                        <span class="mr-auto text-sm">First question</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                    </button>
                    <div x-show="selected === 2" x-collapse class="p-2 text-sm rounded bg-white">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                    </div>
                </div>
                <!--Question-->
            </div>
        </div>
        <!--END: Preview -->
        <!--BEGIN: Code -->
        <div x-show="tab === 'code'" class="absolute w-full rounded-lg bg-black text-white">
            <pre>
                <x-torchlight-code language='html'>
                    <div x-data="{ selected : 2 }" class="flex flex-col justify-center items-center my-20 mx-20 space-y-1 text-slate-800">
                        <!--Question-->
                        <div class="flex flex-col w-full space-y-1">
                            <button @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md">
                                <span class="mr-auto text-sm">First question</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <div x-show="selected === 2" x-collapse class="p-2 text-sm rounded bg-white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                            </div>
                        </div>
                        <!--Question-->
                    </div>
                </x-torchlight-code>
            </pre>
        </div>
        <!--END: Code -->
    </div>
    <!--END: Code Block-->
@endsection