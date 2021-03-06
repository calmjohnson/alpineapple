---
extends: _layouts.component
title: Radio Group
author: Nonso Mbah
image: radio-group
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
<div x-ignore x-data="radioGroup"
    @keydown.down.stop.prevent="selectNext" 
    @keydown.right.stop.prevent="selectNext" 
    @keydown.up.stop.prevent="selectPrev" 
    @keydown.left.stop.prevent="selectPrev"
>
    <template x-trap="selected != ''" x-for="(plan, index) in plans" :key="index">
        <div @click="selected = plan.name" tabindex="1" role="radio" aria-hidden="true" 
                class="flex items-center justify-between cursor-pointer space-y-1 bg-white border-2 mt-2 py-2 px-5 rounded-lg shadow-sm"
                :class="selected === plan.name ? 'border-teal-100 bg-lime-900 text-white' : 'text-slate-900'">
            <div class="flex flex-col">
                <span class="text-sm font-medium" x-text="plan.name"></span>
                <span class="text-sm font-normal" x-text="plan.description"></span>
            </div>
            <span x-show="selected === plan.name" class="bg-lime-700 h-5 w-5 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
            </span>
        </div>
    </template>
</div>
<!--JS-->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('radioGroup', () => ({
            open : false,
            
            init(){
                this.selected = this.plans[0].name;
            },
            
            plans : [
                { 
                    id: 1,
                    name: 'Solo',
                    description: 'For the solo artisan, grinding it one code at a time.'
                },
                { 
                    id: 2,
                    name: 'Agency',
                    description: 'The small timers who run a tight ship.'
                },
                { 
                    id: 3,
                    name: 'Corporate',
                    description: 'The corporation prince and princesses who run things.'
                },
            ],
            
            selectNext() {
                const index = this.plans.findIndex(element => element.name === this.selected);
                if(index > this.plans.length -2)
                {
                    this.selected = this.plans[0].name;
                }
                else
                {
                    this.selected = this.plans[index+1].name;
                }
            },

            selectPrev() {
                const index = this.plans.findIndex(element => element.name === this.selected);
                if(index < this.plans.length -2)
                {
                    this.selected = this.plans[2].name;
                }
                else
                {
                    this.selected = this.plans[index-1].name;
                }
            },

        }))
    })
    
</script>
<!--JS-->
</div>
<!--Code to copy-->

                <!--BEGIN: Preview -->
                <div x-show="tab === 'preview'" class="px-2 h-96 rounded-lg bg-gradient-to-r from-lime-600 to-green-700">
                    <div class="px-2 py-20 md:p-20 w-full">
                        <div x-data="radioGroup"
                            @keydown.down.stop.prevent="selectNext" 
                            @keydown.right.stop.prevent="selectNext" 
                            @keydown.up.stop.prevent="selectPrev" 
                            @keydown.left.stop.prevent="selectPrev"
                        >
                            <template x-trap="selected != ''" x-for="(plan, index) in plans" :key="index">
                                <div @click="selected = plan.name" tabindex="1" role="radio" aria-hidden="true" 
                                        class="flex items-center justify-between cursor-pointer space-y-1 bg-white border-2 mt-2 py-2 px-5 rounded-lg shadow-sm"
                                        :class="selected === plan.name ? 'border-teal-100 bg-lime-900 text-white' : 'text-slate-900'">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium" x-text="plan.name"></span>
                                        <span class="text-sm font-normal" x-text="plan.description"></span>
                                    </div>
                                    <span x-show="selected === plan.name" class="bg-lime-700 h-5 w-5 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
                                    </span>
                                </div>
                            </template>
                        </div>
                        <!--JS-->
                        <script>
                            document.addEventListener('alpine:init', () => {
                                Alpine.data('radioGroup', () => ({
                                    open : false,
                                    
                                    init(){
                                        this.selected = this.plans[0].name;
                                    },
                                    
                                    plans : [
                                        { 
                                            id: 1,
                                            name: 'Solo',
                                            description: 'For the solo artisan, grinding it one code at a time.'
                                        },
                                        { 
                                            id: 2,
                                            name: 'Agency',
                                            description: 'The small timers who run a tight ship.'
                                        },
                                        { 
                                            id: 3,
                                            name: 'Corporate',
                                            description: 'The corporation prince and princesses who run things.'
                                        },
                                    ],
                                    
                                    selectNext() {
                                        const index = this.plans.findIndex(element => element.name === this.selected);
                                        if(index > this.plans.length -2)
                                        {
                                            this.selected = this.plans[0].name;
                                        }
                                        else
                                        {
                                            this.selected = this.plans[index+1].name;
                                        }
                                    },

                                    selectPrev() {
                                        const index = this.plans.findIndex(element => element.name === this.selected);
                                        if(index < this.plans.length -2)
                                        {
                                            this.selected = this.plans[2].name;
                                        }
                                        else
                                        {
                                            this.selected = this.plans[index-1].name;
                                        }
                                    },

                                }))
                            })
                            
                        </script>
                        <!--JS-->
                    </div>
                </div>
                <!--END: Preview -->
                <!--BEGIN: Code -->
                <div x-show="tab === 'code'" class=" w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
                    <pre>
                        <code class="language-html">
{{' 
<div x-data="radioGroup"
    @keydown.down.stop.prevent="selectNext" 
    @keydown.right.stop.prevent="selectNext" 
    @keydown.up.stop.prevent="selectPrev" 
    @keydown.left.stop.prevent="selectPrev"
>
    <template x-trap="selected != \'\'" x-for="(plan, index) in plans" :key="index">
        <div @click="selected = plan.name" tabindex="1" role="radio" aria-hidden="true" 
                class="flex items-center justify-between cursor-pointer space-y-1 bg-white border-2 mt-2 py-2 px-5 rounded-lg shadow-sm"
                :class="selected === plan.name ? \'border-teal-100 bg-lime-900 text-white\' : \'text-slate-900\'">
            <div class="flex flex-col">
                <span class="text-sm font-medium" x-text="plan.name"></span>
                <span class="text-sm font-normal" x-text="plan.description"></span>
            </div>
            <span x-show="selected === plan.name" class="bg-lime-700 h-5 w-5 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 0 1 0 1.414l-8 8a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 1.414-1.414L8 12.586l7.293-7.293a1 1 0 0 1 1.414 0z" clip-rule="evenodd"/></svg>
            </span>
        </div>
    </template>
</div>
<!--JS-->
<script>
    document.addEventListener(\'alpine:init\', () => {
        Alpine.data(\'radioGroup\', () => ({
            open : false,
            
            init(){
                this.selected = this.plans[0].name;
            },
            
            plans : [
                { 
                    name: \'Solo\',
                    description: \'For the solo artisan, grinding it one code at a time.\'
                },
                { 
                    name: \'Agency\',
                    description: \'The small timers who run a tight ship.\'
                },
                { 
                    name: \'Corporate\',
                    description: \'The corporation prince and princesses who run things.\'
                },
            ],
            
            selectNext() {
                const index = this.plans.findIndex(element => element.name === this.selected);
                if(index > this.plans.length -2)
                {
                    this.selected = this.plans[0].name;
                }
                else
                {
                    this.selected = this.plans[index+1].name;
                }
            },

            selectPrev() {
                const index = this.plans.findIndex(element => element.name === this.selected);
                if(index < this.plans.length -2)
                {
                    this.selected = this.plans[2].name;
                }
                else
                {
                    this.selected = this.plans[index-1].name;
                }
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