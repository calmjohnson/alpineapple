---
extends: _layouts.component
title: Dropdown Menu
author: Nonso Mbah
image: dropdown
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
                        <button class="" @click="copied = true, setTimeout(() => copied = false, 2000), $refs.code.firstElementChild.removeAttribute('x-ignore'), copyToClipboard($refs.code.firstElementChild.outerHTML)
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
<!--Code to copy-->
<div x-ref="code" class="invisible absolute">
<div class="flex justify-center">
    <div x-data="{open : false}" class="flex flex-col px-2 py-20 md:px-52 space-y-1 text-slate-800">
        <div class="mt-1 w-40">
            <button @click="open = true" class="flex items-center rounded bg-white shadow space-x-1 px-3 py-2">
                <span>Actions</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </button>
        </div>
        <!--Options-->
        <div x-show="open === true" x-transition @click.outside="open = false" class="flex flex-col text-sm w-40 left-0 mt-2 bg-white rounded-sm shadow-md overflow-hidden">
            <div>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Add Task</a>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">View Tasks</a>
            </div>
            <div class="border-t border-slate-400">
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Edit Task</a>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Delete Tasks</a>
            </div>
        </div>
        <!--Options-->
    </div>
</div>
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-purple-600 to-violet-700">
                    <div class="flex justify-center">
                        <div x-data="{open : false}" class="flex flex-col px-2 py-20 md:px-52 space-y-1 text-slate-800">
                            <div class="mt-1 w-40">
                                <button @click="open = true" class="flex items-center rounded bg-white shadow space-x-1 px-3 py-2">
                                    <span>Actions</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                                </button>
                            </div>
                            <!--Options-->
                            <div x-show="open === true" x-transition @click.outside="open = false" class="flex flex-col text-sm w-40 left-0 mt-2 bg-white rounded-sm shadow-md overflow-hidden">
                                <div>
                                    <a class="w-full block hover:bg-slate-200 p-2" href="#">Add Task</a>
                                    <a class="w-full block hover:bg-slate-200 p-2" href="#">View Tasks</a>
                                </div>
                                <div class="border-t border-slate-400">
                                    <a class="w-full block hover:bg-slate-200 p-2" href="#">Edit Task</a>
                                    <a class="w-full block hover:bg-slate-200 p-2" href="#">Delete Tasks</a>
                                </div>
                            </div>
                            <!--Options-->
                        </div>
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div class="flex justify-center">
    <div x-data="{open : false}" class="flex flex-col px-2 py-20 md:px-52 space-y-1 text-slate-800">
        <div class="mt-1 w-40">
            <button @click="open = true" class="flex items-center rounded bg-white shadow space-x-1 px-3 py-2">
                <span>Actions</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </button>
        </div>
        <!--Options-->
        <div x-show="open === true" x-transition @click.outside="open = false" class="flex flex-col text-sm w-40 left-0 mt-2 bg-white rounded-sm shadow-md overflow-hidden">
            <div>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Add Task</a>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">View Tasks</a>
            </div>
            <div class="border-t border-slate-400">
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Edit Task</a>
                <a class="w-full block hover:bg-slate-200 p-2" href="#">Delete Tasks</a>
            </div>
        </div>
        <!--Options-->
    </div>
</div>1
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