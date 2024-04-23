<!DOCTYPE html>
<html lang="en">

<head>
    <x-app />
</head>

<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-engineer />

    {{-- Content --}}
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <main class="w-full flex-grow">
                <h1 class="text-3xl text-black pb-6">Pengajuan Lembur</h1>

                <div class="bg-white border rounded-lg relative">
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-black">
                                {{ $kegiatan->id_kegiatan }} - {{ $kegiatan->kegiatan }}
                            </h1>
                            <a href="/engineer/datapengajuan"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </a>
                        </div>
                        <hr>
                        <form action="" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="tgl_awal" class="text-sm font-medium text-gray-900 block mb-2">
                                        Diintruksikan Kepada :
                                    </label>
                                    <table>
                                        <tbody class="text-sm font-normal">
                                            <tr>
                                                <td>
                                                    <p>Nama</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->user->name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>NIK</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->user->nik }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Mitra</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->user->mitra }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>E-Mail &nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->user->email }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="tgl_awal" class="text-sm font-medium text-gray-900 block mb-2">
                                        Untuk Melaksanakan Lembur Pada :
                                    </label>
                                    <table>
                                        <tbody class="text-sm font-normal">
                                            <tr>
                                                <td>
                                                    <p>Dari</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->tgl_awal }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Sampai</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->tgl_akhir }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Jam/Menit</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->lama_kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Lokasi Lembur &nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $kegiatan->lokasi }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-span-6">
                                    <label for="deskripsi" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Deskripsi
                                    </label>
                                    <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    name="deskripsi" id="deskripsi" placeholder="deksripsi jika diawal" readonly>{{ $kegiatan->deskripsi ?? old('deskripsi') }}</textarea>
                                </div>
                                <div class="col-span-6 lg:col-span-2 justify-center">
                                    <label for="statacc_manager" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Petugas Manager
                                    </label>
                                    <div class="flex justify-center my-4">
                                        @if($kegiatan->statacc_manager === "ditolak")
                                        <svg class="w-12 h-12 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                            </svg>
                                        @elseif($kegiatan->statacc_manager === "diterima")
                                            <svg class="w-12 h-12 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                            </svg>
                                        @elseif($kegiatan->statacc_manager === "pengajuan")
                                            <svg class="w-12 h-12 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                            </svg>
                                        @endif                                       
                                    </div>
                                    <p class="text-sm mb-1 text-center font-normal">{{ $kegiatan->manager->name }}</p>
                                    <p class="text-sm mb-1 text-center font-normal">NIK : {{ $kegiatan->manager->nik }}</p>
                                    <hr>
                                </div>
                                <div class="col-span-6 lg:col-span-2 justify-center">
                                    <label for="statacc_engineer" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Petugas Engineer
                                    </label>
                                    <div class="flex justify-center my-4">
                                        @if($kegiatan->statacc_engineer === "ditolak")
                                            <svg class="w-12 h-12 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                            </svg>
                                        @elseif($kegiatan->statacc_engineer === "diterima")
                                            <svg class="w-12 h-12 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                            </svg>
                                        @elseif($kegiatan->statacc_engineer === "pengajuan")
                                            <svg class="w-12 h-12 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                            </svg>
                                        @endif                                                                                        
                                    </div>
                                    <p class="text-sm mb-1 text-center font-normal">{{ $kegiatan->engineer->name }}</p>
                                    <p class="text-sm mb-1 text-center font-normal">NIK : {{ $kegiatan->engineer->nik }}</p>
                                    <hr>
                                </div>
                                <div class="col-span-6 lg:col-span-2 justify-center">
                                    <label for="cek_engineer" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Yang di Beri Tugas
                                    </label>
                                    <div class="flex justify-center my-4">
                                        <svg class="w-12 h-12 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                        </svg>                                                        
                                    </div>
                                    <p class="text-sm mb-1 text-center font-normal">{{ $kegiatan->user->name }}</p>
                                    <p class="text-sm mb-1 text-center font-normal">NIK : {{ $kegiatan->user->nik }}</p>
                                    <hr>
                                </div>
                            </div>
                        </form>
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
