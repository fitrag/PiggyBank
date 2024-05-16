<div class="flex-auto">
    <x-header/>
    <div class="bg-blue-500 h-24"></div>
    <div class="mx-4 my-3 relative top-[-5em]">
        <h3 class="text-sm font-medium mb-4 text-white">Dalam progress</h3>
        <div class="owl-carousel owl-theme" x-init="
            $($el).owlCarousel({
                items:1,
                center:true,
                nav:false
            })
        ">
            <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-4 me-2 shadow">
                <div class="">
                    <h3 class="text-base font-semibold">Macbook Pro M3 PRO</h3>
                    <h6 class="text-sm font-medium">Rp 31.000.000</h6>
                </div>
                <div class="relative size-20">
                    <svg class="size-full" width="10" height="10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                        <!-- Progress Circle inside a group with rotation -->
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-slate-200" stroke-width="2"></circle>
                        <!-- Background Circle -->
                        <g class="origin-center -rotate-90 transform">
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-blue-500" stroke-width="2"  stroke-dasharray="100" stroke-dashoffset="{{ 100-round((1000000/3100000)*100,1) }}"></circle>
                        </g>
                    </svg>
                    <!-- Percentage Text -->
                    <div class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <span class="text-center text-sm font-bold text-gray-800 text-dark">{{ round((1000000/3100000)*100,1) }}%</span>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded-lg flex justify-between items-center mb-4 me-2 shadow">
                <div class="">
                    <h3 class="text-base font-semibold">Pajero Sport Dakar 4x2</h3>
                    <h6 class="text-sm font-medium">Rp 395.000.000</h6>
                </div>
                <div class="relative size-20">
                    <svg class="size-full" width="10" height="10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                        <!-- Progress Circle inside a group with rotation -->
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-slate-200" stroke-width="2"></circle>
                        <!-- Background Circle -->
                        <g class="origin-center -rotate-90 transform">
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-current text-blue-500" stroke-width="2"  stroke-dasharray="100" stroke-dashoffset="{{ 100-round((395000000/395000000)*100,1) }}"></circle>
                        </g>
                    </svg>
                    <!-- Percentage Text -->
                    <div class="absolute top-1/2 start-1/2 transform -translate-y-1/2 -translate-x-1/2">
                        <span class="text-center text-sm font-bold text-gray-800 text-dark">{{ round((395000000/395000000)*100,1) }}%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-between">
            <h3 class="text-sm font-medium mb-4 text-dark">Transaksi</h3>
            <a href="" class="text-blue-500 text-xs">Lihat semua</a>
        </div>
        <div class="flex flex-col space-y-5">
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
                    <h3 class="text-sm font-medium mb-1">Macbook Pro M3 Pro</h3>
                    <p class="text-slate-500 text-xs">12 Mei 2024</p>
                </div>
                <div class="flex-none text-green-500 text-sm">
                    + Rp 10.000
                </div>
            </div>
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
                    <h3 class="text-sm font-medium mb-1">Pajero Sport Dakar 4x2</h3>
                    <p class="text-slate-500 text-xs">12 Mei 2024</p>
                </div>
                <div class="flex-none text-green-500 text-sm">
                    + Rp 100.000
                </div>
            </div>
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
                    <h3 class="text-sm font-medium mb-1">MacBook Pro M3 PRO</h3>
                    <p class="text-slate-500 text-xs">9 Mei 2024</p>
                </div>
                <div class="flex-none text-green-500 text-sm">
                    + Rp 1.000.000
                </div>
            </div>
        </div>
    </div>
</div>
