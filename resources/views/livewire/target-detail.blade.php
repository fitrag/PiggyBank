<div>
    <div class="bg-gradient-to-t from-violet-700 to-violet-900 pt-4 pb-44 flex text-white px-4 items-center justify-between">
        <div class="flex-none cursor-pointer" @click="window.history.back()">
            <i class='bx bx-arrow-back text-xl' ></i>
        </div>
        <div class="text-sm font-semibold">
            {{ $target->nama }}
        </div>
        <div class="flex-none">
            <a href="{{ url('target/create') }}" wire:navigate class="">
                <i class='bx bx-pencil text-xl' ></i>
            </a>
        </div>
    </div>
    <div class="mx-4 my-3 relative top-[-9em]">
        <div class="bg-white rounded-2xl px-4 py-4">
            <div class="flex flex-col space-y-3">
                <img src="{{ $target->foto ? $target->foto : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg'}}" alt="" class="rounded-lg object-cover h-[50%] object-cover">
                <div class="flex justify-between items-center">
                    <div class="">
                        <h3 class="text-base font-semibold">{{ $target->nama }}</h3>
                        <h6 class="text-sm font-medium">Rp {{ number_format($target->target,0,',','.') }}</h6>
                    </div>
                    <div class="relative size-20">
                        <svg class="size-full" width="10" height="10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                            <!-- Progress Circle inside a group with rotation -->
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-slate-200" stroke-width="2"></circle>
                            <!-- Background Circle -->
                            <g class="origin-center -rotate-90 transform">
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-blue-500" stroke-width="2"  stroke-dasharray="100" stroke-dashoffset="{{ 100-round(($target->nabungs->sum('nilai')/$target->target)*100,1) }}"></circle>
                            </g>
                        </svg>
                        <!-- Percentage Text -->
                        <div class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                            <span class="text-center text-sm font-bold text-gray-800 text-dark">{{ round(($target->nabungs->sum('nilai')/$target->target)*100,1) }}%</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-around py-4 items-center">
                    <div class="">
                        <h3 class="text-sm text-center font-medium text-gray-500">Terkumpul</h3>
                        <h1 class="text-lg text-center text-green-500 font-semibold">Rp {{ number_format($target->nabungs->sum('nilai'),0,',','.') }}</h1>
                    </div>
                    <div class="">
                        <h3 class="text-sm text-center font-medium text-gray-500">Kurang</h3>
                        <h1 class="text-lg text-center text-red-500 font-semibold">Rp {{ number_format($target->target - $target->nabungs->sum('nilai'),0,',','.') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-3" x-data="{ show : false }">
            <div class="" x-show="show" @close-form.window="show=false">
                <form wire:submit="nabung" method="post">
                    <div class="flex bg-white rounded-lg shadow mb-4">
                        <input type="number" wire:model="jumlah" id="" class="w-full outline-none rounded-lg px-3 text-sm text-gray-600 placeholder:text-sm" placeholder="Masukkan jumlah uang yang akan ditabung">
                        <div class="p-2">
                            <i class='bx bx-money text-2xl'></i>
                        </div>
                    </div>
                </form>
            </div>
            <button class="bg-blue-500 p-2 rounded-lg text-white w-full text-sm" @click="show = !show" x-text="show ? 'Tutup' : 'Tambah tabungan'"></button>
        </div>

        <div class="bg-white rounded-2xl px-4 py-4 mt-3">
            <div class="flex justify-between">
                <h3 class="text-sm font-medium mb-4 text-dark">Riwayat Menabung</h3>
                <!-- <a href="" class="text-blue-500 text-xs">Lihat semua</a> -->
            </div>
            <div class="flex flex-col space-y-5">
                @forelse($target->nabungs()->latest()->get() as $nabung)
                <div class="flex space-x-3 items-center">
                    <div class="w-12 flex-none">
                        <div class="bg-slate-200 flex items-center justify-center p-3 rounded-xl text-slate-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z" />
                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <h3 class="text-sm font-medium mb-1">{{ $nabung->target->nama }}</h3>
                        <p class="text-slate-500 text-xs">{{ date_format(date_create($nabung->created_at), 'd M Y H:i:s') }}</p>
                    </div>
                    <div class="flex-none text-green-500 text-sm">
                        + Rp {{ number_format($nabung->nilai,0,',','.') }}
                    </div>
                </div>
                @empty
                <div class="text-center text-xs text-slate-500 py-5">Belum ada transaksi</div>

                @endforelse
            </div>
        </div>
    </div>
</div>
