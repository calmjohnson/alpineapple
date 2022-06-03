---
extends: _layouts.component
title: Toggle
author: Nonso Mbah
image: toggle
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
<div x-data="{ toggle : false }" 
    @click="toggle = ! toggle" 
    class="relative cursor-pointer h-6 w-12 rounded-full transition-all duration-300 ease-in-out bg-cyan-400" :class=" toggle ? 'bg-cyan-400' : 'bg-slate-400' ">
    <span class="absolute h-6 w-6 rounded-full bg-white transition-all duration-300 ease-in-out" :class=" toggle ? 'translate-x-7' : '' "></span>
</div>
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-cyan-600 to-sky-700">
                    <div class="flex justify-center px-2 md:px-52 py-32">
                        <div x-data="{ toggle : false }" 
                            @click="toggle = ! toggle" 
                            class="relative cursor-pointer h-6 w-12 rounded-full transition-all duration-300 ease-in-out bg-cyan-400" :class=" toggle ? 'bg-cyan-400' : 'bg-slate-400' ">
                            <span class="absolute h-6 w-6 rounded-full bg-white transition-all duration-300 ease-in-out" :class=" toggle ? 'translate-x-7' : '' "></span>
                        </div>
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="{ toggle : false }" 
    @click="toggle = ! toggle" 
    class="relative cursor-pointer h-6 w-12 rounded-full transition-all duration-300 ease-in-out bg-cyan-400" :class=" toggle ? \'bg-cyan-400\' : \'bg-slate-400\' ">
    <span class="absolute h-6 w-6 rounded-full bg-white transition-all duration-300 ease-in-out" :class=" toggle ? \'translate-x-7\' : \'\' "></span>
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