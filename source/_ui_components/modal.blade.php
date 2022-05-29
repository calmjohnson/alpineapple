---
extends: _layouts.component
title: Modal
author: Nonso Mbah
image: modal
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
                        <button class="" @click="copied = true, setTimeout(() => copied = false, 2000), $refs.code.firstElementChild.removeAttribute('x-ignore'), copyToClipboard($refs.code.firstElementChild.outerHTML)">
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
<div x-data="{ open: true }" class="absolute inset-0 flex items-center justify-center">
    <div class="mt-1 w-40">
        <button @click="open = true" class="flex items-center rounded text-white text-sm bg-white bg-opacity-25 border border-white border-opacity-50 shadow space-x-1 px-3 py-2">
            Open dialog
        </button>
    </div>
    <div x-transition x-show="open === true" class="flex justify-center items-center p-5 fixed inset-0 bg-black bg-opacity-50 z-50">
        <div @click.outside="open = false" class="flex flex-col relative max-w-2xl w-full rounded-lg shadow-lg p-12 bg-white">
            <h1 class="text-3xl font-semibold text-slate-900">Confirm</h1>
            <p class="mt-2 text-sm text-slate-700">
                Are you really sure you want to do that?
            </p>
            <div class="mt-4 flex space-x-5">
                <button @click="open = false" class="text-sm bg-blue-500 bg-opacity-25 text-blue-500 p-2 rounded-sm shadow-sm">
                    Yes, please
                </button>
                <button @click="open = false" class="text-sm bg-red-500 bg-opacity-25 text-red-400 p-2 rounded-sm shadow-sm">
                    Oh No
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-purple-600 to-violet-700">
                    <div x-data="{ open: true }" class="absolute inset-0 flex items-center justify-center">
                        <div class="mt-1 w-40">
                            <button @click="open = true" class="flex items-center rounded text-white text-sm bg-white bg-opacity-25 border border-white border-opacity-50 shadow space-x-1 px-3 py-2">
                                Open dialog
                            </button>
                        </div>
                        <div x-transition x-show="open === true" class="flex justify-center items-center p-5 fixed inset-0 bg-black bg-opacity-50 z-50">
                            <div @click.outside="open = false" class="flex flex-col relative max-w-2xl w-full rounded-lg shadow-lg p-12 bg-white">
                                <h1 class="text-3xl font-semibold text-slate-900">Confirm</h1>
                                <p class="mt-2 text-sm text-slate-700">
                                    Are you really sure you want to do that?
                                </p>
                                <div class="mt-4 flex space-x-5">
                                    <button @click="open = false" class="text-sm bg-blue-500 bg-opacity-25 text-blue-500 p-2 rounded-sm shadow-sm">
                                        Yes, please
                                    </button>
                                    <button @click="open = false" class="text-sm bg-red-500 bg-opacity-25 text-red-400 p-2 rounded-sm shadow-sm">
                                        Oh No
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="{ open: true }" class="absolute inset-0 flex items-center justify-center">
    <div class="mt-1 w-40">
        <button @click="open = true" class="flex items-center rounded text-white text-sm bg-white bg-opacity-25 border border-white border-opacity-50 shadow space-x-1 px-3 py-2">
            Open dialog
        </button>
    </div>
    <div x-transition x-show="open === true" class="flex justify-center items-center p-5 fixed inset-0 bg-black bg-opacity-50 z-50">
        <div @click.outside="open = false" class="flex flex-col relative max-w-2xl w-full rounded-lg shadow-lg p-12 bg-white">
            <h1 class="text-3xl font-semibold text-slate-900">Confirm</h1>
            <p class="mt-2 text-sm text-slate-700">
                Are you really sure you want to do that?
            </p>
            <div class="mt-4 flex space-x-5">
                <button @click="open = false" class="text-sm bg-blue-500 bg-opacity-25 text-blue-500 p-2 rounded-sm shadow-sm">
                    Yes, please
                </button>
                <button @click="open = false" class="text-sm bg-red-500 bg-opacity-25 text-red-400 p-2 rounded-sm shadow-sm">
                    Oh No
                </button>
            </div>
        </div>
    </div>
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