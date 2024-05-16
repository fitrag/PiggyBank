<div>
    <x-nav/>
    <div class="mx-4 my-3 relative top-[-9em]">
        <div class="bg-white rounded-2xl px-4 py-4">
        @php
            $nilai = \App\Models\Nabung::select('*', DB::raw('sum(nilai) as totalnabung'))->groupBy('tanggal')->get();
            $tanggal = \App\Models\Nabung::groupBy('tanggal')->get();
        @endphp
        <div x-data="{ chart: null }" x-init="
            chart = new Chart(document.getElementById('myChart').getContext('2d'), {
                type: 'bar',
                data: {
                labels: [@foreach($tanggal as $t)
                        '{{ date_format(date_create($t->tanggal),'l') }}',
                        @endforeach],
                datasets: [{
                    label: 'Menabung',
                    data: [
                        @foreach($nilai as $n)
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
    </div>
</div>
