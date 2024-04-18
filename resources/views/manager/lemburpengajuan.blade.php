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
                
                <div class="flex items-center mb-4">
                    <svg class="w-6 h-6 text-blue-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10 16 4-4-4-4"/>
                      </svg>                          
                    <h1 class="text-xl text-black">Approve Karyawan</h1>
                </div>
                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    @if ($kegiatan && $kegiatanblm->isEmpty())
                        <div class="flex flex-col items-center justify-center">
                            <p class="px-2 py-2 text-center text-2xl font-semibold text-blue-600">Tidak Ada Pengajuan</p>
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
                            @php
                                $no = 0;
                            @endphp
                            @foreach ( $kegiatan as $keg )
                            @php
                                $no++;
                            @endphp
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-2 py-2 border-r text-center">
                                    {{ $no }}
                                </td>
                                <th scope="row"
                                    class="flex items-center px-8 py-6 text-gray-900 whitespace-nowrap border-r">
                                    <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/img/' . $keg->user->foto) }}"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $keg->user->name }}</div>
                                        <div class="text-xs font-normal text-gray-500">{{ $keg->user->email }}</div>
                                        <div class="font-normal">{{ $keg->user->jabatan }}</div>
                                    </div>
                                </th>
                                <td class="px-2 py-2 border-r font-medium">
                                    {{ $keg->kegiatan }}
                                </td>
                                <td class="px-2 py-2 border-r max-w-[150px] text-xs">
                                    {{ $keg->deskripsi }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $keg->lokasi }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $keg->tgl_awal }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $keg->tgl_akhir }}
                                </td>       
                                <td class="px-2 py-2 border-r">
                                    @if ($keg->statacc_engineer === 'diterima')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-1">diterima</span>
                                        </div>
                                    @elseif ($keg->statacc_engineer === 'ditolak')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                            </svg>                                          
                                            <span class="ml-1">ditolak</span>
                                        </div>
                                    @elseif ($keg->statacc_engineer === 'pengajuan')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                              </svg>                                                                                  
                                            <span class="ml-1">pengajuan</span>
                                        </div>
                                    @else
                                    {{ $keg->statacc_engineer }}
                                    @endif
                                </td>
                                <td class="px-2 py-2 border-r">
                                    @if ($keg->statacc_manager === 'diterima')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-1">diterima</span>
                                        </div>
                                    @elseif ($keg->statacc_manager === 'ditolak')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                            </svg>                                          
                                            <span class="ml-1">ditolak</span>
                                        </div>
                                    @elseif ($keg->statacc_manager === 'pengajuan')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                              </svg>                                                                                  
                                            <span class="ml-1">pengajuan</span>
                                        </div>
                                    @else
                                    {{ $keg->statacc_manager }}
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="/manager/datapengajuan/diterima/{{ $keg->id_kegiatan }}">
                                        <button type="button" class="px-2 py-2 w-[80px] mb-1 text-xs text-center text-white rounded-md bg-green-400 hover:bg-green-500">
                                            Di Terima
                                        </button>
                                    </a>
                                    <a href="/manager/datapengajuan/ditolak/{{ $keg->id_kegiatan }}">
                                        <button type="button" class="px-2 py-2 w-[80px] text-xs text-center text-white rounded-md bg-red-400 hover:bg-red-500">
                                            Di Tolak
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            @foreach ( $kegiatanblm as $kgblm )
                            @php
                                $no++;
                            @endphp
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-2 py-2 border-r text-center">
                                    {{ $no }}
                                </td>
                                <th scope="row"
                                    class="flex items-center px-8 py-6 text-gray-900 whitespace-nowrap border-r">
                                    <img class="w-10 h-10 rounded-full object-cover object-center" src="{{ url('/img/' . $kgblm->user->foto) }}"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{ $kgblm->user->name }}</div>
                                        <div class="text-xs font-normal text-gray-500">{{ $kgblm->user->email }}</div>
                                        <div class="font-normal">{{ $kgblm->user->jabatan }}</div>
                                    </div>
                                </th>
                                <td class="px-2 py-2 border-r font-medium">
                                    {{ $kgblm->kegiatan }}
                                </td>
                                <td class="px-2 py-2 border-r max-w-[150px] text-xs">
                                    {{ $kgblm->deskripsi }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $kgblm->lokasi }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $kgblm->tgl_awal }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $kgblm->tgl_akhir }}
                                </td>       
                                <td class="px-2 py-2 border-r">
                                    @if ($kgblm->statacc_engineer === 'diterima')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-1">diterima</span>
                                        </div>
                                    @elseif ($kgblm->statacc_engineer === 'ditolak')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                            </svg>                                          
                                            <span class="ml-1">ditolak</span>
                                        </div>
                                    @elseif ($kgblm->statacc_engineer === 'pengajuan')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                              </svg>                                                                                  
                                            <span class="ml-1">pengajuan</span>
                                        </div>
                                    @else
                                    {{ $kgblm->statacc_engineer }}
                                    @endif
                                </td>
                                <td class="px-2 py-2 border-r">
                                    @if ($kgblm->statacc_manager === 'diterima')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="ml-1">diterima</span>
                                        </div>
                                    @elseif ($kgblm->statacc_manager === 'ditolak')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                            </svg>                                          
                                            <span class="ml-1">ditolak</span>
                                        </div>
                                    @elseif ($kgblm->statacc_manager === 'pengajuan')
                                        <div class="flex items-center justify-center">
                                            <svg class="w-5 h-5 text-yellow-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                              </svg>                                                                                  
                                            <span class="ml-1">pengajuan</span>
                                        </div>
                                    @else
                                    {{ $kgblm->statacc_manager }}
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <p>Tunggu Approve Dari Engineer Terlebih Dahulu</p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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