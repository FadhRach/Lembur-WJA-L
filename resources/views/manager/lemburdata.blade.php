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
                <h1 class="text-3xl text-black pb-6">Data Lembur</h1>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                    Lokasi
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Waktu Awal
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Waktu Akhir
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Kegiatan Tercapai
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Deskripsi Hasil
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Bukti Foto
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Status Kegiatan
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
                                </td    >
                                <td class="px-2 py-2 border-r">
                                    Lembur Gangguan
                                </td>
                                <td class="px-2 py-2 border-r">
                                    Riau
                                </td>
                                <td class="px-2 py-2 border-r ">
                                    Jumat, 01-01-2021 19:53
                                </td>
                                <td class="px-2 py-2 border-r ">
                                    Sabtu, 01-01-2021 19:53
                                </td>
                                <td class="px-2 py-2 border-r ">
                                    100%
                                </td>
                                <td class="px-2 py-2 border-r max-w-[150px]">
                                    Gangguan Sentral Backbone Padalarang dan Ciung sampe bandung full mati tidak ada jaringan
                                </td>
                                <td class="px-2 py-2 border-r">
                                    img
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>