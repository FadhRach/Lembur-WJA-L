<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan/>
  
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border- mt-14">
            <main class="w-full flex-grow">
                <div class="bg-white  py-12">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1  gap-8">
                            <div class="mb-8 md:mb-0">
                                <h2 class="text-4xl w-full font-bold text-black mb-4 font-sans ">Beranda Lembur</h2>
                                <p class="text-black font-sans text-lg mt-10">Aplikasi lembur WJA memudahkan pengaturan jadwal dan pencatatan
                                    waktu lembur. Fitur-fitur canggihnya membantu Komunikasi secara akurat, memungkinkan
                                    transparansi antara pekerja dan manajemen. Dengan adopsi teknologi ini, administrasi
                                    lembur menjadi lebih efisien, meningkatkan produktivitas dan kesejahteraan pekerja.
                                </p>
                            </div>
                            <div class="flex justify-center items-center">

                                <div class="relative w-full max-w-md"></div>
                            </div>

                        </div>
                        <div class="mt-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                    <h3 class="text-3xl font-bold text-blue-600">300</h3>
                                    <p class="text-gray-600">Karyawan</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                    <h3 class="text-3xl font-bold text-blue-600">75</h3>
                                    <p class="text-gray-600">manajeger</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                    <h3 class="text-3xl font-bold text-blue-600">25</h3>
                                    <p class="text-gray-600">engginer</p>
                                </div>
                                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                    <h3 class="text-3xl font-bold text-blue-600">18</h3>
                                    <p class="text-gray-600">cabang</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-2xl font-bold text-black mb-4">Photo Gallery</h3>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    <img src="{{ asset('img/logo lintasarta.png') }}" alt="foto 1"
                                        class="rounded-lg shadow-md w-full">
                                    <img src="{{ asset('img/logo lintasarta.png') }}" alt="foto 2"
                                        class="rounded-lg shadow-md w-full">
                                    <img src="{{ asset('img/logo lintasarta.png') }}" alt="foto 3"
                                        class="rounded-lg shadow-md w-full">
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-black mb-4">Cabang</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                        <h4 class="text-xl font-bold text-blue-600">685</h4>
                                        <p class="text-gray-600">Bandung</p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                        <h4 class="text-xl font-bold text-blue-600">51</h4>
                                        <p class="text-gray-600">Jakarta</p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                        <h4 class="text-xl font-bold text-blue-600">16</h4>
                                        <p class="text-gray-600">Kalimantan</p>
                                    </div>
                                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                                        <h4 class="text-xl font-bold text-blue-600">184</h4>
                                        <p class="text-gray-600">Jawa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20  ">
                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="table-search-users"
                            class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for users">
                    </div>
                </div>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center ">  
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                <div class="ps-3">
                                    <div class="text-base font-semibold">Neil Sims</div>
                                    <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Pemasangan ODC Indramayu
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Disetujui
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                <div class="ps-3">
                                    <div class="text-base font-semibold">Bonnie Green</div>
                                    <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Pelurusan Core
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Disetujui
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">Jese Leos</div>
                                    <div class="font-normal text-gray-500">jese@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Perbaikan Kabel
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Disetujui
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">Thomas Lean</div>
                                    <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Perapihan Lifo
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Disetujui
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                <div class="ps-3">
                                    <div class="text-base font-semibold">Leslie Livingston</div>
                                    <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                Pemasangan ODC Cianjur
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Pengajuan
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                    Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
    </main>
    </div>
    </div>


</body>

</html>