---
extends: _layouts.component
title: Combobox
description: How to build a combobox ui component using Alpine.js and Tailwind Css
author: Nonso Mbah
image: combobox
---

@section('body')

        <!--BEGIN: Component-->
        <div class="col-span-12 w-auto md:col-span-7">
            <h1 class="font-bold text-3xl md:text-4xl text-white">{{ $page->title }}</h1>
            
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
                <div x-show="tab === 'preview'" x-ref="code" class="px-2 h-96 rounded-lg bg-gradient-to-r from-red-600 to-orange-700">
                    <div x-data="{ selected : '', open : false }" class="flex flex-col justify-center items-center px-2 py-20 md:px-52 space-y-1 text-slate-800">
                        <div class="w-full relative mt-1">
                            <div class="flex items-center cursor-default shadow bg-white rounded-lg">
                                <input x-model="selected" @input="open = true" class="w-full h-10 px-3 border-none text-sm rounded-lg focus:ring-0 outline-none" type="text">
                                <button @click="open = ! open" class="px-1 h-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l3 3a1 1 0 0 1-1.414 1.414L10 5.414 7.707 7.707a1 1 0 0 1-1.414-1.414l3-3A1 1 0 0 1 10 3zm-3.707 9.293a1 1 0 0 1 1.414 0L10 14.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                                </button>
                            </div>
                        </div>
                        <pre><x-torchlight-code language='php'>

                            echo "hello world";
                        
                        </x-torchlight-code></pre>
                        <!--Options-->
                        <div x-show="open === true" @click.outside="open = false" class="flex flex-col justify-start w-full bg-white list-none px-5 py-2 rounded-lg shadow-md">
                            <template>
                                <div>Nothing found...</div>
                            </template>
                            
                            <template x-for="framework in frameworks" :key="framework.id">
                                <li @click="selected = framework.name" tabindex="0" class="relative cursor-default focus:text-red-900 select-none py-1 pr-4">
                                    <span class="blcok truncate" x-text="framework.name"></span>
                                </li>
                            </template>
                            
                        </div>
                        <!--Options-->
                    </div>
                    <!--JS-->
                    <script>
                        const frameworks = [
                            { id: 1, name: 'Alpine js'},
                            { id: 2, name: 'Vue js'},
                            { id: 3, name: 'Laravel'},
                            { id: 4, name: 'Tailwind css'},
                            { id: 5, name: 'Svelte js'},
                            { id: 6, name: 'Statamic'}
                        ]
                    </script>
                    <!--JS-->
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
    
@endsection