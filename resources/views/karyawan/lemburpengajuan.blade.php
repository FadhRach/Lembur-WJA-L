<!DOCTYPE html>
<html lang="en">

<head>
    <x-app />
</head>

<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan />

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <main class="w-full flex-grow">
                <div class="p-2">
                    <h2 class="text-lg font-poppins font-bold"><span>Pengajuan Lembur Karyawan</span></h2>


                    <h2 class="text-md font-poppins"><span>Formulir aprove lembur karyawan yang harus di setujui.</span>
                    </h2>
                    <h2 class="text-md font-poppins mt-2 italic atext-gray-400">Note: Jika diantara salah satu Engineer
                        dan Manajer tidak menyetujui lembur maka harus mengirim ulang pembuatan lembur kembali</h2>

                    
                        <div class="relative overflow-x-auto shadow-md rounded-lg mt-6">
                            @if($kegiatan->isEmpty())
                            <div class="flex flex-col items-center justify-center">
                                <p class="px-2 py-2 text-center text-2xl font-semibold text-blue-600">Tidak Ada Lembur yang diajukan</p>
                                <img class="cropped-image" src="{{ asset('img/NoDataAnimate.gif') }}" alt="animasi">
                            </div>                          
                            @else
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
                                            Lama Kegiatan
                                        </th>
                                        <th scope="col" class="px-2 py-3 ">
                                            Detail Pengajuan
                                        </th>
                                        <th scope="col" class="px-2 py-3 ">
                                            Engineer Status
                                        </th>
                                        <th scope="col" class="px-2 py-3 ">
                                            Manager Status
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @php
                                        $no = 0;
                                    @endphp
                                    @foreach ( $kegiatan as $keku )
                                    @php
                                        $no++;
                                    @endphp
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-2 py-2 border-r text-center">
                                            {{ $no }}
                                        </td>
                                        <th scope="row"
                                            class="flex items-center px-8 py-6 text-gray-900 whitespace-nowrap border-r">
                                            <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/img/' . $keku->user->foto) }}"
                                                alt="img">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">{{ $keku->user->name }}</div>
                                                <div class="text-xs font-normal text-gray-500">{{ $keku->user->email }}</div>
                                                <div class="font-normal">{{ $keku->user->jabatan }}</div>
                                            </div>
                                        </th>
                                        <td class="px-2 py-2 border-r font-medium">
                                            {{ $keku->kegiatan }}
                                        </td>
                                        <td class="px-2 py-2 border-r">
                                            {{ $keku->lama_kegiatan }}
                                        </td>
                                        <td class="px-2 py-2 border-r">
                                            <div class="flex justify-center m-2">
                                                <a href="/karyawan/datapengajuan/{{ $keku->id_kegiatan }}" class="block font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1.365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>      
                                        <td class="px-2 py-2 border-r">
                                            @if ($keku->statacc_engineer === 'diterima')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="ml-1">diterima</span>
                                                </div>
                                            @elseif ($keku->statacc_engineer === 'ditolak')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                    </svg>                                          
                                                    <span class="ml-1">ditolak</span>
                                                </div>
                                            @elseif ($keku->statacc_engineer === 'pengajuan')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                                      </svg>                                                                                  
                                                    <span class="ml-1">pengajuan</span>
                                                </div>
                                            @else
                                            {{ $keku->statacc_engineer }}
                                            @endif
                                        </td>
                                        <td class="px-2 py-2 border-r">
                                            @if ($keku->statacc_manager === 'diterima')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    <span class="ml-1">diterima</span>
                                                </div>
                                            @elseif ($keku->statacc_manager === 'ditolak')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                    </svg>                                          
                                                    <span class="ml-1">ditolak</span>
                                                </div>
                                            @elseif ($keku->statacc_manager === 'pengajuan')
                                                <div class="flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                                      </svg>                                                                                  
                                                    <span class="ml-1">pengajuan</span>
                                                </div>
                                            @else
                                            {{ $keku->statacc_manager }}
                                            @endif
                                        </td>
                                        <td class="px-2 py-2">
                                            <div class="flex justify-center">
                                                @if($keku->statacc_engineer === 'ditolak' || $keku->statacc_manager === 'ditolak')
                                                    <a href="/karyawan/datapengajuan/delete/{{ $keku->id_kegiatan }}">
                                                        <svg class="w-6 h-6 text-red-400 hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                                        </svg>                               
                                                    </a>
                                                @else
                                                        <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                                        </svg>                               
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                </div>
            </main>
        </div>
    </div>

    @if ($massage = Session::get('success'))
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
