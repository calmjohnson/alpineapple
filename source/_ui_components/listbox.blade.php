---
extends: _layouts.component
title: Listbox
author: Nonso Mbah
image: listbox
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
                        <button class="" @click="copied = true, setTimeout(() => copied = false, 2000), $refs.code.firstElementChild.removeAttribute('x-ignore'), copyToClipboard($refs.code.firstElementChild.outerHTML+'\n'+$refs.code.lastElementChild.outerHTML)">
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
<div x-ignore x-data="listbox" class="flex flex-col justify-center items-center px-2 py-20 md:px-52 space-y-1 text-slate-800">
    <div class="w-full relative mt-1">
        <button @click="toggle" class="flex items-center w-full h-10 px-3 border-none text-sm rounded-lg focus:ring-0 outline-none cursor-default shadow bg-white rounded-lg">
            <span x-text="selected"></span>
            <span class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l3 3a1 1 0 0 1-1.414 1.414L10 5.414 7.707 7.707a1 1 0 0 1-1.414-1.414l3-3A1 1 0 0 1 10 3zm-3.707 9.293a1 1 0 0 1 1.414 0L10 14.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </span>
        </button>
    </div>
    <!--Options-->
    <div x-show="open === true" @click.outside="open = false" class="flex flex-col justify-start w-full bg-white list-none py-2 rounded-lg shadow-md">
        <template x-for="person in people" :key="person.id">
            <li @click="selected = person.name, open = false, query = ''" tabindex="0" 
                class="relative cursor-default hover:bg-blue-600 hover:bg-opacity-75 hover:text-white select-none py-1 pl-10 px-5">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg x-show="selected === person.name" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="block truncate" x-text="person.name"></span>
            </li>
        </template>
    </div>
    <!--Options-->
</div>
<!--JS-->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('listbox', () => ({
            open : false,
            
            init(){
                this.selected = this.people[0].name;
            },
            
            people : [
                { id: 1, name: 'Adam Wathan'},
                { id: 2, name: 'Caleb Porzio'},
                { id: 3, name: 'Freek Van Der Herten'},
                { id: 4, name: 'Taylor Otwell'},
                { id: 5, name: 'Jason McCreary'},
                { id: 6, name: 'Jack Mcdade'}
            ],
            
            toggle() {
                this.open = ! this.open
            },      
        }))
    })
</script>
<!--JS-->
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-blue-600 to-sky-700">
                    <div x-data="listbox" class="flex flex-col justify-center items-center px-2 py-20 md:px-52 space-y-1 text-slate-800">
                        <div class="w-full relative mt-1">
                            <button @click="toggle" class="flex items-center w-full h-10 px-3 border-none text-sm rounded-lg focus:ring-0 outline-none cursor-default shadow bg-white rounded-lg">
                                <span x-text="selected"></span>
                                <span class="ml-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l3 3a1 1 0 0 1-1.414 1.414L10 5.414 7.707 7.707a1 1 0 0 1-1.414-1.414l3-3A1 1 0 0 1 10 3zm-3.707 9.293a1 1 0 0 1 1.414 0L10 14.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
                                </span>
                            </button>
                        </div>
                        <!--Options-->
                        <div x-show="open === true" @click.outside="open = false" class="flex flex-col justify-start w-full bg-white list-none py-2 rounded-lg shadow-md">
                            <template x-for="person in people" :key="person.id">
                                <li @click="selected = person.name, open = false, query = ''" tabindex="0" 
                                    class="relative cursor-default hover:bg-blue-600 hover:bg-opacity-75 hover:text-white select-none py-1 pl-10 px-5">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg x-show="selected === person.name" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span class="block truncate" x-text="person.name"></span>
                                </li>
                            </template>
                        </div>
                        <!--Options-->
                    </div>
                    <!--JS-->
                    <script>
                        document.addEventListener('alpine:init', () => {
                            Alpine.data('listbox', () => ({
                                open : false,
                                
                                init(){
                                    this.selected = this.people[0].name;
                                },
                                
                                people : [
                                    { id: 1, name: 'Adam Wathan'},
                                    { id: 2, name: 'Caleb Porzio'},
                                    { id: 3, name: 'Freek Van Der Herten'},
                                    { id: 4, name: 'Taylor Otwell'},
                                    { id: 5, name: 'Jason McCreary'},
                                    { id: 6, name: 'Jack Mcdade'}
                                ],
                                
                                toggle() {
                                    this.open = ! this.open
                                },      
                            }))
                        })
                    </script>
                    <!--JS-->
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="listbox" class="flex flex-col justify-center items-center px-2 py-20 md:px-52 space-y-1 text-slate-800">
    <div class="w-full relative mt-1">
        <button @click="toggle" class="flex items-center w-full h-10 px-3 border-none text-sm rounded-lg focus:ring-0 outline-none cursor-default shadow bg-white rounded-lg">
            <span x-text="selected"></span>
            <span class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a1 1 0 0 1 .707.293l3 3a1 1 0 0 1-1.414 1.414L10 5.414 7.707 7.707a1 1 0 0 1-1.414-1.414l3-3A1 1 0 0 1 10 3zm-3.707 9.293a1 1 0 0 1 1.414 0L10 14.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" clip-rule="evenodd"/></svg>
            </span>
        </button>
    </div>
    <!--Options-->
    <div x-show="open === true" @click.outside="open = false" class="flex flex-col justify-start w-full bg-white list-none py-2 rounded-lg shadow-md">
        <template x-for="person in people" :key="person.id">
            <li @click="selected = person.name, open = false, query = \'\'" tabindex="0" 
                class="relative cursor-default hover:bg-blue-600 hover:bg-opacity-75 hover:text-white select-none py-1 pl-10 px-5">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg x-show="selected === person.name" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                <span class="block truncate" x-text="person.name"></span>
            </li>
        </template>
    </div>
    <!--Options-->
</div>
<!--JS-->
<script>
    document.addEventListener(\'alpine:init\', () => {
        Alpine.data(\'listbox\', () => ({
            open : false,
            
            init(){
                this.selected = this.people[0].name;
            },
            
            people : [
                { id: 1, name: \'Adam Wathan\'},
                { id: 2, name: \'Caleb Porzio\'},
                { id: 3, name: \'Freek Van Der Herten\'},
                { id: 4, name: \'Taylor Otwell\'},
                { id: 5, name: \'Jason McCreary\'},
                { id: 6, name: \'Jack Mcdade\'}
            ],
            
            toggle() {
                this.open = ! this.open
            },      
        }))
    })
</script>
<!--JS-->
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