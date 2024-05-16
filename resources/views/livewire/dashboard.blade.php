<div class="flex-auto">
    <x-header/>
    <div class="mx-4 my-3 relative top-[-10em]">
        <!-- <div class="mb-5 bg-white rounded-xl flex items-center">
            <input type="text" class="bg-transparent w-full outline-none py-2 px-3 placeholder:text-xs text-xs" placeholder="Cari tabungan">
            <i class='bx bx-search p-3 text-gray-500'></i>
        </div> -->
        <div class="flex flex-col space-y-1 mb-5" x-data="{look : true}">
            <div class="flex items-center space-x-2">
                <h3 class="text-lg text-white font-normal">Total Nabung</h3>
                <div class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer" :class="look ? 'inline-block' : 'hidden'"  @click="look = false">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 cursor-pointer" :class="look ? 'hidden' : 'inline-block'"  @click="look = true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                </div>
            </div>
            <h1 class="font-bold text-3xl text-white" x-transition :class="look ? 'block' : 'hidden'">Rp {{ number_format(auth()->user()->nabungs->sum('nilai'),0,',','.') }}</h1>
            <h1 class="font-bold text-3xl text-white" x-transition :class="look ? 'hidden' : 'look'">Rp xxxxxx</h1>
        </div>
        @if(!$targets->isEmpty())
        <h3 class="text-sm font-medium mb-2 text-white">Dalam progress</h3>
        <div class="owl-carousel owl-theme" x-init="
            $($el).owlCarousel({
                items:1,
                center:true,
                nav:false
            })
        ">
            @foreach($targets as $target)
                <a wire:navigate href="{{ route('target-view', ['id' => $target->id]) }}" class="bg-white p-4 rounded-lg flex justify-between items-center mb-4 me-2 shadow">
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
                </a>
            @endforeach
        </div>
        @endif

        <div class="bg-white rounded-2xl px-4 py-4">
            <div class="flex justify-between">
                <h3 class="text-sm font-medium mb-4 text-dark">Transaksi</h3>
                <a wire:navigate href="{{ url('analytics') }}" class="text-blue-500 text-xs">Lihat semua</a>
            </div>
            <div class="flex flex-col space-y-5">
                @forelse($nabungs as $nabung)
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
                        <p class="text-slate-500 text-xs">{{ date_format(date_create($nabung->created_at), 'd M Y') }}</p>
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
