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
                <h1 class="text-3xl text-black pb-6">Pengajuan Lembur</h1>
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800 border-collapse">
                        <thead class="text-xs text-white uppercase bg-blue-500">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Nama
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Kegiatan
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Waktu Awal
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Waktu Akhir
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Engineer Status
                                </th>
                                <th scope="col" class="px-2 py-3 ">
                                    Manager Status
                                </th>
                                <th scope="col" class="px-2 py-3 ">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-2 py-2 border-r text-center">
                                    1
                                </td>
                                <td class="px-2 py-2 border-r">
                                    Andi Surya Sunanda
                                </td>
                                <td class="px-2 py-2 border-r font-medium">
                                    Lembur Gangguan
                                </td>
                                <td class="px-2 py-2 border-r max-w-[150px] text-xs">
                                    Gangguan Sentral Backbone Padalarang dan Ciung sampe bandung full mati tidak ada jaringan
                                </td>
                                <td class="px-2 py-2 border-r">
                                    Kantor CiungWanara
                                </td>
                                <td class="px-2 py-2 border-r">
                                    Sabtu, 28-11-2424
                                </td>
                                <td class="px-2 py-2 border-r">
                                    Minggu, 19-12-2424
                                </td>
                                <td class="px-2 py-2 border-r">
                                    diterima
                                </td>
                                <td class="px-2 py-2 border-r">
                                    ditolak
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="#">
                                        <button type="button" class="px-2 py-2 w-[80px] mb-1 text-xs text-center text-white rounded-md bg-green-400 hover:bg-green-500">
                                            Di Terima
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="px-2 py-2 w-[80px] text-xs text-center text-white rounded-md bg-red-400 hover:bg-red-500">
                                            Di Tolak
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </main>
        </div>
    </div>

    @if($massage = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ $massage }}'
        });
    </script>
    @endif
</body>
</html>