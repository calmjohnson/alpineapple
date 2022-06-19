<!--BEGIN: Mobile Menu-->
<div x-cloak x-data="{menu : true}" class="flex justify-center md:hidden z-50">
    <!--Menu-->
    <div class="px-5 pb-12 pt-10 overflow-y-scroll inset-0 h-full 
        transition-all ease-in-out duration-[500ms] z-40 bg-white bg-opacity-50 
        shadow-xl filter backdrop-blur rounded-t-xl fixed" 
        :class="menu ? 'fixed translate-y-[40rem]' : 'fixed'">
        <!--BEGIN: Mobile Menu Items-->
        <div class="flex flex-wrap gap-5 overflow-hidden py-10">
            @foreach ($ui_components as $component)
                <a title="{{ $component->title.' Component' }}" href="{{ $component->getUrl() }}" 
                    class="rotate-3 bg-slate-900 p-2 shadow-md shadow-pink-500">
                    <span class="text-base text-white font-medium">{{ $component->title }}</span>
                </a>
            @endforeach
        </div>
        <!--END: Mobile Menu Items-->
    </div>
    <!--Menu-->
    <div class="fixed bottom-0 h-10 w-auto rounded-full z-50 filter backdrop-blur-sm border border-pink-400 shadow-xl shadow-purple-500 bg-purple-400 bg-opacity-60 flex items-center py-1 px-5">
        <div class="px-1 py-1 shadow-md rounded-full bg-white bg-transparent">
            <a @click="menu = ! menu" href="javascript:;">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-700" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M0 0h24v24H0z" stroke="none"></path>
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>                                   
            </a>
        </div>
    </div>
</div>
<!--END: Mobile Menu-->