<!DOCTYPE html>
<html lang="en">

<head>
    <x-app />
</head>

<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-manager />

    {{-- Content --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <main class="w-full flex-grow">
                <h1 class="text-3xl text-black pb-6">Beranda</h1>

                <div class="flex flex-wrap mt-6">
                    <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                        <p class="text-xl pb-3 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.6 3.2a1 1 0 0 0-1.6 1 3.5 3.5 0 0 1-.8 3.6c-.6.8-4 5.6-1 10.7A7.7 7.7 0 0 0 12 22a8 8 0 0 0 7-3.8 7.8 7.8 0 0 0 .6-6.5 8.7 8.7 0 0 0-2.6-4 1 1 0 0 0-1.6.7 10 10 0 0 1-.8 3.4 9.9 9.9 0 0 0-2.2-5.5A14.4 14.4 0 0 0 9 3.5l-.4-.3Z" />
                            </svg>
                            Ranking Lembur
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartOne" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                        <p class="text-xl pb-3 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M4 4.5V19c0 .6.4 1 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.2M20 9v3.2" />
                            </svg>
                            Periode Lembur
                        </p>
                        <div class="p-6 bg-white">
                            <canvas id="chartTwo" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                    <p class="text-xl pb-3 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 7.2c4.4 0 8-1.2 8-2.6C20 3.2 16.4 2 12 2S4 3.2 4 4.6C4 6 7.6 7.2 12 7.2ZM12 22c5 0 8-1.7 8-2.6V15h-.2a7.8 7.8 0 0 1-1.3.7l-.2.1c-2 .7-4.2 1-6.3 1a19 19 0 0 1-6.3-1h-.2a10.1 10.1 0 0 1-1.3-.7L4 15v4.4c0 1 3 2.6 8 2.6Zm7-14c-.1.2-.3.2-.5.3l-.2.1c-2 .7-4.2 1-6.3 1a19 19 0 0 1-6.3-1h-.2a10.2 10.2 0 0 1-1.3-.7L4 7.6V12c0 1 3 2.6 8 2.6s8-1.7 8-2.6V7.6h-.2a7.8 7.8 0 0 1-.7.5Z"/>
                          </svg>
                        Data Lembur Terbaru
                    </p>
                </div>
                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-blue-500">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Kegiatan
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Waktu Awal
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Waktu Akhir
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Lama Kegiatan
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0;
                            @endphp
                            @foreach ($kegiatanterbaru as $newk)
                            @php
                                $no++;
                            @endphp
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-2 py-2 text-center">
                                    {{ $no }}
                                </td>
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                    <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/img/' . $newk->user->foto) }}"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $newk->user->name }}</div>
                                        <div class="font-normal text-gray-500">{{ $newk->user->email }}</div>
                                        <div class="font-normal">{{ $newk->user->jabatan }}</div>
                                    </div>
                                </th>
                                <td class="px-2 py-2 font-bold">
                                    {{ $newk->kegiatan }}
                                </td>
                                <td class=" px-2 py-2 max-w-[150px] text-xs">
                                    {{ $newk->deskripsi }}
                                </td>                                
                                <td class="px-2 py-2 max-w-[200px]">
                                    {{ $newk->lokasi }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ $newk->tgl_awal }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ $newk->tgl_akhir }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ $newk->lama_kegiatan }}
                                </td>
                                <td class="px-2 py-2">
                                    {{ $newk->kegiatan_stat }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script>
        // DATA RANKING

        //data tinggal diloop menggunakan php dari controller
        var data = [{
                label: 'Agus',
                value: 12
            },
            {
                label: 'Asep',
                value: 19
            },
            {
                label: 'Adang',
                value: 3
            },
            {
                label: 'Andi',
                value: 5
            },
            {
                label: 'Azeng',
                value: 2
            },
            {
                label: 'Alaa',
                value: 3
            }
        ];

        data.sort(function(a, b) {
            return b.value - a.value;
        });

        var labels = data.map(function(item) {
            return item.label;
        });

        var values = data.map(function(item) {
            return item.value;
        });

        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: values,
                    backgroundColor: [
                        'rgba(239, 64, 54, 0.2)',
                        'rgba(247, 147, 30, 0.2)',
                        'rgba(139, 198, 62, 0.2)',
                        'rgba(0, 167, 156, 0.2)',
                        'rgba(162, 89, 162, 0.2)',
                        'rgba(46, 77, 155, 0.2)'
                    ],
                    borderColor: [
                        'rgba(239, 64, 54, 1)',
                        'rgba(247, 147, 30, 1)',
                        'rgba(139, 198, 62, 1)',
                        'rgba(0, 167, 156, 1)',
                        'rgba(162, 89, 162, 1)',
                        'rgba(46, 77, 155, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                    'Oktober', 'November', 'Desember'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
