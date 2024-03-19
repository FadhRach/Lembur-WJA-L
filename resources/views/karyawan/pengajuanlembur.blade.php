<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan/>

    <!-- {{-- Content --}} -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
            <main class="w-full flex-grow">
                <h1 class="text-3xl text-black pb-6">Pengajuan</h1>
                <div class="flex justify-end">
                    <button class="bg-blue-500  hover:bg-black text-white font-bold py-2 px-4 rounded">
                    Tambah
                    </button>
                </div>
                  
                <div class="flex flex-wrap mt-6">
                    <div class="w-full pr-0 lg:pr-2">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-black uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Deskripsi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Lokasi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu Awal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu Akhir
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <thead class="text-xs text-black uppercase text-center">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Deskripsi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Lokasi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu Awal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu Akhir
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <!-- Isi tabel -->
                                <tbody class="divide-y divide-gray-200">
                                    <!-- Baris-baris tabel -->
                                    <!-- Tambahkan baris-baris data di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
</table>
</div>
</body>
</html>