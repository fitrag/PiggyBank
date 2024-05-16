<div>
    <x-nav/>
    <div class="mx-4 my-3 relative top-[-9em]">
        <div class="bg-white rounded-2xl px-4 py-4 shadow">
            @php
                $nilai = \App\Models\Nabung::select('*', DB::raw('sum(nilai) as totalnabung'))->where('user_id', auth()->user()->id)->groupBy('tanggal')->limit(7)->latest()->get();
                $size = sizeof($nilai);
                $nilaiBaru = [];
                for($i=$size-1; $i>=0;$i--){
                    array_push($nilaiBaru, $nilai[$i]);
                }
            @endphp
            <div x-data="{ chart: null }" x-init="
                chart = new Chart(document.getElementById('myChart').getContext('2d'), {
                    type: 'bar',
                    data: {
                    labels: [@foreach($nilaiBaru as $t)
                            '{{ date_format(date_create($t->tanggal),'l') }}',
                            @endforeach],
                    datasets: [{
                        label: 'Menabung',
                        data: [
                            @foreach($nilaiBaru as $n)
                            '{{ $n->totalnabung }}',
                            @endforeach
                            ]
                    }]
                    },
                    options: {
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        let label = 'Rp ';

                                        if (label) {
                                            label
                                        }
                                        if (context.parsed.y !== null) {
                                            label += new Intl.NumberFormat('id-ID').format(context.parsed.y);
                                        }
                                        return label;
                                    }
                                }
                            }
                        },
                        scales:{
                            y:{
                                ticks: {
                                // For a category axis, the val is the index so the lookup via getLabelForValue is needed
                                callback: function(val, index) {
                                    // Hide every 2nd tick label
                                    return 'Rp '+new Intl.NumberFormat('id-ID').format(val);
                                },
                                }
                            }
                        }
                    }
                });
            ">
                <h1 class="font-semibold mb-3">Grafik menabung</h1>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-2xl px-4 py-4 mt-4">
            <div class="flex justify-between">
                <h3 class="text-sm font-medium mb-4 text-dark">Transaksi</h3>
                <!-- <a wire:navigate href="{{ url('analytics') }}" class="text-blue-500 text-xs">Lihat semua</a> -->
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
