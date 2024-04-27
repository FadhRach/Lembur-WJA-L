<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan/>
  
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 rounded-lg dark:border-gray-700 mt-14">
            <main class="w-full flex-grow">
                <div class="p-2">
                    <h2 class="text-lg font-poppins font-bold"><span>History Lembur Karyawan</span></h2>
                    <h2 class="text-md font-poppins"><span>Data - data lembur yang pernah dibuat karyawan   .</span></h2>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if ($kegiatan->isEmpty())
                        <div class="flex flex-col items-center justify-center">
                            <p class="px-2 py-2 text-center text-2xl font-semibold text-blue-600">Tidak Ada Laporan Yang Harus Dibuat</p>
                            <img class="cropped-image" src="{{ asset('img/NoDataAnimate.gif') }}" alt="animasi">
                        </div>                  
                    @else
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-white uppercase bg-blue-500">
                            <tr>
                                <th scope="col" class="px-2 py-3 text-center">
                                    No
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Kegiatan
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Lokasi
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Lama Kegiatan
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Waktu Dibuat
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Detail Lembur
                                </th>
                                <th scope="col" class="px-2 py-3">
                                    Status Kegiatan
                                </th>
                            </tr>
                        </thead>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ( $kegiatan as $keg )
                        @php
                            $no++;
                        @endphp
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-2 py-2 border-r text-center">
                                    {{ $no }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    {{ $keg->id_kegiatan }} - {{ $keg->kegiatan }}
                                </td>
                                <td class="px-2 py-2 border-r max-w-[200px]">
                                    {{ $keg->lama_kegiatan }}
                                </td>
                                <td class="px-2 py-2 border-r max-w-[200px]">
                                    {{ $keg->lokasi }}
                                </td>
                                <td class="px-2 py-2 border-r max-w-[150px]">
                                    {{ $keg->created_at }}
                                </td>
                                <td class="px-2 py-2 border-r">
                                    <div class="flex justify-center m-5">
                                        <a href="/karyawan/datahistory/{{ $keg->id_kegiatan }}" class="block font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                            @if($keg->laporan->cek_engineer === "pengajuan" || is_null($keg->laporan->buktifoto) || is_null($keg->laporan->deskripsi_hasil))
                                            <svg class="w-6 h-6 text-gray-500 hover:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1.365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                            </svg>
                                        @else
                                            @if($keg->laporan->cek_engineer === "revisi" || $keg->laporan->cek_manager === "revisi")
                                                <svg class="w-6 h-6 text-red-400 hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1.365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                                </svg>
                                            @elseif($keg->laporan->cek_engineer === "selesai" && $keg->laporan->cek_manager === "selesai")
                                                <svg class="w-6 h-6 text-green-300 hover:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1.365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-yellow-300 hover:text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1.365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                                                </svg>
                                            @endif
                                        @endif
                                        </a>
                                    </div>
                                              
                                </td>                            
                                <td class="px-2 py-2 text-center">
                                    <div class="flex justify-center text-blue-400 hover:text-blue-500">
                                        {{ $keg->kegiatan_stat }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach                    
                    </table>
                    @endif
                </div>
            </main>
        </div>
    </div>
</body>
</html>