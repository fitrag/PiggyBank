<div>
    <div class="bg-gradient-to-t from-violet-700 to-violet-900 pt-4 pb-44 flex text-white px-4 items-center justify-between">
        <div class="flex-none cursor-pointer" @click="window.history.back()">
            <i class='bx bx-arrow-back text-xl' ></i>
        </div>
        <div class="text-sm font-semibold">
            Semua Target
        </div>
        <div class="flex-none">
            <a href="{{ url('target/create') }}" wire:navigate class="">
                <i class='bx bx-pencil text-xl' ></i>
            </a>
        </div>
    </div>
    <div class="mx-4 my-3 relative top-[-10em]">
        <div class="my-3 bg-blue-600 text-sm text-white rounded-lg p-4 dark:bg-blue-500" role="alert">
            <span class="font-bold">Info</span> Buat target menabungmu lebih asik dan terukur
        </div>
        <div class="bg-white rounded-2xl px-4 py-4">
            <div class="flex flex-col space-y-5">
                @forelse($targets as $target)
                <a wire:navigate href="{{ route('target-view', ['id' => $target->id]) }}" class="flex space-x-3 items-center cursor-pointer">
                    <div class="w-12 flex-none">
                        <img src="{{ $target->foto ? $target->foto : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg'}}" alt="" class="rounded-lg object-cover">
                    </div>
                    <div class="flex-auto">
                        <h3 class="text-sm font-medium mb-1">{{ $target->nama }}</h3>
                        <p class="text-slate-500 text-xs">{{ date_format(date_create($target->created_at), 'd M Y') }}</p>
                    </div>
                    <div class="flex-none text-slate-7\800 font-semibold text-sm">
                        Rp {{ number_format($target->target,0,',','.') }}
                    </div>
                </a>
                @empty
                <div class="text-center text-xs text-slate-500 py-5 h-screen">Belum ada target</div>

                @endforelse
            </div>
        </div>
    </div>
</div>
