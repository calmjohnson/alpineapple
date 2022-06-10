<!--BEGIN: Tutorial-->
<div class="my-10 text-slate-300">
    <h1 class="my-5 font-bold text-base md:text-xl underline underline-offset-8 text-slate-200">
        How to build an accessible accordion ui component using Alpine.js and Tailwind Css
    </h1>

    <h1 class="my-5 font-bold text-xl md:text-2xl text-white">Installation</h1>

    <p>To get started install 
        <a href="https://alpinejs.dev/essentials/installation" target="_blank" title="Install Alpine JS" class="text-sky-400">alpine js</a>
    </p>

    <div class="p-3 my-2 w-full rounded-lg bg-black text-white">
        <code>
            npm install alpinejs
        </code>
    </div>

    <p class="mt-5">
        First let's create a div with the 
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">x-data</code> 
        <a href="https://alpinejs.dev/directives/data" target="_blank" title="Alpine JS x-data directive" class="text-sky-400">Directive</a> 
        and give it a property of <span class="text-lime-400">selected</span> with the value <span class="text-lime-400">1</span>
        We can then toggle the value of selected depending on which accordion the user clicks and then show 
        the content of the selected accordion.
    </p>

<!--Code Block-->
<div class="my-5 w-full rounded-lg bg-black text-white">
<pre><code class="language-html">{{'<div x-data="{ selected : 1 }"></div>'}}</code></pre>
</div>
<!--Code Block-->

    <p class="mt-5 leading-loose">
        We will use the
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">&lt;ul&gt;</code> element to list 
        each accordion and its content. we shall also add an 
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-label</code> to the 
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">&lt;ul&gt;</code> element and
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-controls</code>
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-expanded</code> and 
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">id</code> to the 
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">button</code> element 
        as well as 
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-hidden</code> and 
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">id</code>
        to the <code class="py-1 px-2 rounded shadow bg-black text-slate-50">&lt;div&gt;</code> 
        containing the content of the accordion.
        <br><br>
        When a button is clicked, we set the value of 
        <span class="text-lime-400">selected</span> 
        to the corresponding number, the first button 
        sets it to <span class="text-lime-400">1</span> 
        and the second button sets it to 
        <span class="text-lime-400">2</span> and so on. 
        Then we toggle the visibility of each 
        content based on the value of <span class="text-lime-400">selected</span> 
        Using the 
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">x-show</code> 
        <a href="https://alpinejs.dev/directives/show" target="_blank" title="Alpine JS x-show directive" class="text-sky-400">Directive</a> 
        <br>
        If the value of <span class="text-lime-400">selected</span> 
        corresponds with the number of the button clicked, we also set the value of <span class="text-lime-400">selected</span> 
        to null, so as to collapse the clicked acccordion.

        <br><br>
        Finally we set the values
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-expanded</code> and 
        <code class="py-1 px-2 rounded shadow bg-black text-yellow-100">aria-hidden</code> attributes 
        based on the value of <span class="text-lime-400">selected</span> using the 
        <code class="py-1 px-2 rounded shadow bg-black text-slate-50">x-bind</code> 
        <a href="https://alpinejs.dev/directives/bind" target="_blank" title="Alpine JS x-bind directive" class="text-sky-400">Directive</a> 
    </p>

<!--Code Block-->
<div class="my-5 w-full h-96 overflow-y-scroll rounded-lg bg-black text-white">
<pre><code class="language-html">{{'<div x-data="{ selected : 1 }">
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
</div>'}}</code></pre>
</div>
<!--Code Block-->

</div>
<!--END: Tutotrial-->