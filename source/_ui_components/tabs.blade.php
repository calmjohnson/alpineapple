---
extends: _layouts.component
title: Tabs
author: Nonso Mbah
image: tabs
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
<div x-data="{selected : 'first'}" class="w-full">
    <!--Buttons-->
    <div @keydown.right="$focus.wrap().next()"
        @keydown.left="$focus.wrap().previous()" 
        class="flex items-center space-x-5 bg-fuchsia-900 bg-opacity-50 text-white rounded-md">
        <button @click="selected = 'first'" @focus="selected = 'first'"
            class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
            :class="selected === 'first' ? 'bg-white text-fuchsia-900' : ''">
            First
        </button>
        <button @click="selected = 'second'" @focus="selected = 'second'"
                class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                :class="selected === 'second' ? 'bg-white text-fuchsia-900' : ''">
            Second
        </button>
        <button @click="selected = 'third'" @focus="selected = 'third'"
                class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                :class="selected === 'third' ? 'bg-white text-fuchsia-900' : ''">
            Third
        </button>
    </div>
    <!--Buttons-->
    <!--Contents-->
    <div x-show="selected === 'first'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>First Tab</h1>
        <p class="text-sm text-slate-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Sunt asperiores saepe eos ullam magni</p>
    </div>
    <div x-show="selected === 'second'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>Second Tab</h1>
        <p class="text-sm text-slate-600">Tempore ratione 
            aspernatur fugiat ex debitis provident voluptas id, 
            obcaecati repellat rem sapiente fugit animi ad.</p>
    </div>
    <div x-show="selected === 'third'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>Third Tab</h1>
        <p class="text-sm text-slate-600">Dolor sit amet consectetur, adipisicing elit. 
            Sunt asperiores saepe eos ullam magni, voluptas id, 
            obcaecati repellat rem sapiente fugit animi ad.</p>
    </div>
    <!--Contents-->
</div>
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-fuchsia-600 to-pink-700">
                    <div class="flex justify-center">
                        <div class="flex px-2 py-20 md:px-32 w-full">
                            <div x-data="{selected : 'first'}" class="w-full">
                                <!--Buttons-->
                                <div @keydown.right="$focus.wrap().next()"
                                    @keydown.left="$focus.wrap().previous()" 
                                    class="flex items-center space-x-5 bg-fuchsia-900 bg-opacity-50 text-white rounded-md">
                                    <button @click="selected = 'first'" @focus="selected = 'first'"
                                        class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                                        :class="selected === 'first' ? 'bg-white text-fuchsia-900' : ''">
                                        First
                                    </button>
                                    <button @click="selected = 'second'" @focus="selected = 'second'"
                                            class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                                            :class="selected === 'second' ? 'bg-white text-fuchsia-900' : ''">
                                        Second
                                    </button>
                                    <button @click="selected = 'third'" @focus="selected = 'third'"
                                            class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                                            :class="selected === 'third' ? 'bg-white text-fuchsia-900' : ''">
                                        Third
                                    </button>
                                </div>
                                <!--Buttons-->
                                <!--Contents-->
                                <div x-show="selected === 'first'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
                                    <h1>First Tab</h1>
                                    <p class="text-sm text-slate-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                                        Sunt asperiores saepe eos ullam magni</p>
                                </div>
                                <div x-show="selected === 'second'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
                                    <h1>Second Tab</h1>
                                    <p class="text-sm text-slate-600">Tempore ratione 
                                        aspernatur fugiat ex debitis provident voluptas id, 
                                        obcaecati repellat rem sapiente fugit animi ad.</p>
                                </div>
                                <div x-show="selected === 'third'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
                                    <h1>Third Tab</h1>
                                    <p class="text-sm text-slate-600">Dolor sit amet consectetur, adipisicing elit. 
                                        Sunt asperiores saepe eos ullam magni, voluptas id, 
                                        obcaecati repellat rem sapiente fugit animi ad.</p>
                                </div>
                                <!--Contents-->
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
<div x-data="{selected : \'first\'}" class="w-full">
    <!--Buttons-->
    <div @keydown.right="$focus.wrap().next()"
        @keydown.left="$focus.wrap().previous()" 
        class="flex items-center space-x-5 bg-fuchsia-900 bg-opacity-50 text-white rounded-md">
        <button @click="selected = \'first\'" @focus="selected = \'first\'"
            class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
            :class="selected === \'first\' ? \'bg-white text-fuchsia-900\' : \'\'">
            First
        </button>
        <button @click="selected = \'second\'" @focus="selected = \'second\'"
                class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                :class="selected === \'second\' ? \'bg-white text-fuchsia-900\' : \'\'">
            Second
        </button>
        <button @click="selected = \'third\'" @focus="selected = \'third\'"
                class="w-full rounded-lg py-2 text-sm leading-5 ring-white ring-opacity-50 ring-offset-2 ring-offset-fuchsia-400 focus:outline-none focus:ring-2"
                :class="selected === \'third\' ? \'bg-white text-fuchsia-900\' : \'\'">
            Third
        </button>
    </div>
    <!--Buttons-->
    <!--Contents-->
    <div x-show="selected === \'first\'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>First Tab</h1>
        <p class="text-sm text-slate-600">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Sunt asperiores saepe eos ullam magni</p>
    </div>
    <div x-show="selected === \'second\'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>Second Tab</h1>
        <p class="text-sm text-slate-600">Tempore ratione 
            aspernatur fugiat ex debitis provident voluptas id, 
            obcaecati repellat rem sapiente fugit animi ad.</p>
    </div>
    <div x-show="selected === \'third\'" class="mt-2 p-5 rounded-lg shadow-sm bg-white text-slate-900">
        <h1>Third Tab</h1>
        <p class="text-sm text-slate-600">Dolor sit amet consectetur, adipisicing elit. 
            Sunt asperiores saepe eos ullam magni, voluptas id, 
            obcaecati repellat rem sapiente fugit animi ad.</p>
    </div>
    <!--Contents-->
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