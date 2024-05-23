<div>
    <div class="bg-gradient-to-t from-violet-700 to-violet-900 flex flex-col justify-center items-center py-16">
        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->nama }}&background=random" alt="" class="rounded-full border border-[10px] border-purple-900 mb-3">
        <h3 class="text-base font-semibold text-white">{{ auth()->user()->nama }}</h3>
    </div>
    <div class="relative bg-blue-500 flex flex-col items-center rounded-t-[2.5em] mt-[-2em] pt-4 pb-12">
        <h1 class="text-2xl text-white font-semibold">
            Rp {{ number_format(auth()->user()->nabungs->sum('nilai'),0,',','.') }}
        </h1>
        <h6 class="text-xs text-white font-normal">Total Nabung</h6>
    </div>
    <div class="relative bg-white flex flex-col items-center justify-center rounded-t-[2.5em] mt-[-2em]">
        <div class="w-full bg-white rounded-t-[2.5em]">
            @php
                $nilai = \App\Models\Nabung::select('*', DB::raw('sum(nilai) as totalnabung'))->where('user_id', auth()->user()->id)->groupBy('tanggal')->limit(7)->latest()->get();
                $size = sizeof($nilai);
                $nilaiBaru = [];
                for($i=$size-1; $i>=0;$i--){
                    array_push($nilaiBaru, $nilai[$i]);
                }
            @endphp
            <div x-data x-init="
            const options = {
                chart: {
                    height: '100%',
                    maxWidth: '100%',
                    type: 'area',
                    fontFamily: 'Inter, sans-serif',
                    dropShadow: {
                    enabled: false,
                    },
                    toolbar: {
                    show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                    show: true,
                    },
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: '#1C64F2',
                    gradientToColors: ['#1C64F2'],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 4,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                    left:0,
                    right: 0,
                    top: 0
                    },
                },
                series: [
                    {
                    name: 'Rp ',
                    data: [
                        @foreach($nilaiBaru as $n)
                            '{{ $n->totalnabung }}',
                        @endforeach
                        ],
                    color: '#1A56DB',
                    },
                ],
                xaxis: {
                    categories: [
                        @foreach($nilaiBaru as $t)
                        '{{ date_format(date_create($t->tanggal),'l') }}',
                        @endforeach
                        ],
                    labels: {
                    show: false,
                    },
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                }

                if (document.getElementById('area-chart') && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById('area-chart'), options);
                chart.render();
            }
            ">
                <div id="area-chart"></div>
            </div>

            <div class="px-4 py-4 border-t">
                <h3 class="font-semibold text-base">Pengaturan</h3>
                <div class="mt-3 flex flex-col">
                    <div class="flex justify-between py-3">
                        <h3 class="text-sm font-normal">Tampilkan total nabung</h3>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <div class="flex justify-between py-3">
                        <h3 class="text-sm font-normal">Tampilkan label menu</h3>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" checked>
                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
