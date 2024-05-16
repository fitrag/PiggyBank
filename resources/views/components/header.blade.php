<div class="bg-gradient-to-t from-violet-700 to-violet-900 pt-5 pb-44 flex py-3 text-white px-4 items-center space-x-3">
    <div class="w-10 flex-none">
        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->nama }}&background=random" alt="" class="rounded-full">
    </div>
    <h3 class="text-sm font-medium flex-auto">Halo!, {{ auth()->user()->nama }}</h3>
    <i class='bx bx-log-in-circle text-2xl'></i>

</div>