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
                <h1 class="text-3xl text-black pb-6">Daftar Karyawan</h1>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
                    <div
                        class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white">
                        <div>
                            <a href="/manager/daftarkaryawan/tambah" class="inline-flex items-center text-green-500 bg-white border border-green-300 focus:outline-none hover:bg-green-500 hover:text-white focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-1.5">
                                <svg class="w-6 h-6 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                </svg>
                                Tambah Karyawan
                            </a>
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
                            <form action="/manager/daftarkaryawan/cari" method="get">
                                <input type="text" name="cari" value="{{ old('cari') }}"
                                class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari Karyawan">
                            </form>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-white uppercase bg-blue-500">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jabatan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mitra
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIK/NIP
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No.Telpon
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($user as $u)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4 text-center">
                                            {{ $no }}
                                        </td>
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/img/' . $u->foto) }}"
                                            alt="Jese image">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">{{ $u->name }}</div>
                                            <div class="font-normal text-gray-500">{{ $u->email }}</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $u->role }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $u->jabatan }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $u->mitra }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $u->nik }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $u->alamat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $u->no_telp }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-4">
                                            <a href="/manager/daftarkaryawan/edit/{{ $u->id_user }}" class="flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="/manager/daftarkaryawan/delete/{{ $u->id_user }}" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center delete-user-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Delete
                                            </a>                                            
                                        </div>                         
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
