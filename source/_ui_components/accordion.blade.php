---
extends: _layouts.component
title: Accordion
description: How to build an accessible accordion ui component using Alpine.js and Tailwind Css
author: Nonso Mbah
image: accordion
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
                <div x-show="tab === 'preview'" x-ref="code" class="px-2 h-96 rounded-lg bg-gradient-to-r from-yellow-600 to-amber-700">
                    <div x-data="{ selected : 1 }">
                        <ul aria-label="Accordion Control Group Buttons" class="flex flex-col justify-center items-center px-2 py-20 md:p-20 space-y-1 text-slate-800">
                            <!--Question-->
                            <li class="flex flex-col w-full space-y-1">
                                <button aria-controls="content-1" aria-expanded="false" id="accordion-control-1"
                                    @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md"
                                    :aria-expanded="selected === 1 ? 'true' : 'false'">
                                    <span class="mr-auto text-sm">First question</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                        :class="selected === 1 ? 'rotate-180' : ''"
                                        class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                                </button>
                                <div aria-hidden="true" id="content-1" x-show="selected === 1" class="p-2 text-sm rounded bg-white"
                                    :aria-hidden="selected === 1 ? 'false' : 'true'">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                                </div>
                            </li>
                            <!--Question-->
                            <!--Question-->
                            <li class="flex flex-col w-full space-y-1">
                                <button aria-controls="content-2" aria-expanded="false" id="accordion-control-2"
                                    @click="selected !== 2 ? selected = 2 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md"
                                    :aria-expanded="selected === 2 ? 'true' : 'false'">
                                    <span class="mr-auto text-sm">Second question</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                                        :class="selected === 2 ? 'rotate-180' : ''"
                                        class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                                </button>
                                <div aria-hidden="true" id="content-2" x-show="selected === 2" class="p-2 text-sm rounded bg-white"
                                    :aria-hidden="selected === 2 ? 'false' : 'true'">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
                                </div>
                            </li>
                            <!--Question-->
                        </ul>
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="{ selected : 1 }">
    <ul aria-label="Accordion Control Group Buttons" class="flex flex-col justify-center items-center px-2 py-20 md:p-20 space-y-1 text-slate-800">
        <!--Question-->
        <li class="flex flex-col w-full space-y-1">
            <button aria-controls="content-1" aria-expanded="false" id="accordion-control-1"
                @click="selected !== 1 ? selected = 1 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md"
                :aria-expanded="selected === 1 ? \'true\' : \'false\'">
                <span class="mr-auto text-sm">First question</span>
                <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                    :class="selected === 1 ? \'rotate-180\' : \'\'"
                    class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </button>
            <div aria-hidden="true" id="content-1" x-show="selected === 1" class="p-2 text-sm rounded bg-white"
                :aria-hidden="selected === 1 ? \'false\' : \'true\'">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
            </div>
        </li>
        <!--Question-->
        <!--Question-->
        <li class="flex flex-col w-full space-y-1">
            <button aria-controls="content-2" aria-expanded="false" id="accordion-control-2"
                @click="selected !== 2 ? selected = 2 : selected = null" class="flex items-center w-full bg-white p-3 rounded-md"
                :aria-expanded="selected === 2 ? \'true\' : \'false\'">
                <span class="mr-auto text-sm">Second question</span>
                <svg xmlns="http://www.w3.org/2000/svg" aria-label="chevron"
                    :class="selected === 2 ? \'rotate-180\' : \'\'"
                    class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </button>
            <div aria-hidden="true" id="content-2" x-show="selected === 2" class="p-2 text-sm rounded bg-white"
                :aria-hidden="selected === 2 ? \'false\' : \'true\'">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod risus sit amet dolor luctus rutrum. Proin et condimentum est. Duis ac pulvinar magna, quis tincidunt eros.
            </div>
        </li>
        <!--Question-->
    </ul>
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