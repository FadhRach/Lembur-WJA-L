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
                <h1 class="text-3xl text-black pb-6">Laporan Lembur</h1>

                <div class="bg-white border rounded-lg relative">
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-bold text-black">
                                {{ $laporan->id_kegiatan }} - {{ $laporan->kegiatan->kegiatan }}
                            </h1>
                            <a href="/engineer/datalaporan"
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
                        <form action="/engineer/datalaporan/editsave/{{ $laporan->id_kegiatan }}" method="POST"
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
                                                    <p>: {{ $laporan->kegiatan->user->name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>NIK</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->user->nik }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Mitra</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->user->mitra }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>E-Mail &nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->user->email }}</p>
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
                                                    <p>: {{ $laporan->kegiatan->tgl_awal }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Sampai</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->tgl_akhir }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Jam/Menit</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->lama_kegiatan }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>Lokasi Lembur &nbsp;</p>
                                                </td>
                                                <td>
                                                    <p>: {{ $laporan->kegiatan->lokasi }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-span-6">
                                    <hr>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="kgtn_tercapai" class="text-sm font-medium text-gray-900 block mb-2">
                                        Kegiatan Tercapai
                                    </label>
                                    <div class="relative mb-6">
                                        <p class="font-medium text-sm text-blue-600">{{ $laporan->kgtn_tercapai }} %</p>
                                        <input name="kgtn_tercapai" id="labels-range-input" type="range" min="0" max="100" 
                                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer " 
                                        value="{{ $laporan->kgtn_tercapai }}">
                                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-0 -bottom-6">0%</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute start-1/2 -translate-x-1/2 rtl:translate-x-1/2 -bottom-6">50%</span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400 absolute end-0 -bottom-6">100%</span>
                                    </div>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="deskripsi_hasil"
                                        class="text-sm font-medium text-gray-900 block mb-2">Keterangan Hasil</label>
                                        <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        name="deskripsi_hasil" id="deskripsi_hasil" placeholder="Deskripsi Hasil Akhir atau Berikan Pendapat">{{ $laporan->deskripsi_hasil ?? old('deskripsi_hasil') }}</textarea>                                                                  
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="file" class="text-sm font-medium text-gray-900 block mb-2">File Dokumentasi</label>
                                    <div class="flex text-blue-400 hover:text-blue-700 font-bold">
                                        <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z" clip-rule="evenodd"/>
                                          </svg>
                                          
                                        <a href="/engineer/datalaporan/view/{{ $laporan->id_kegiatan }}">{{ $laporan->buktifoto }}</a>
                                    </div>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="buktifoto" class="text-sm font-medium text-gray-900 block mb-2">Upload Dokumentasi</label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full"
                                        type="file" name="buktifoto" placeholder="buktifoto"
                                        value="{{ old('buktifoto') }}">
                                    <div class="flex text-blue-400 hover:text-blue-700">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1.02 4.804a1 1 0 1 0-1.96.392l1 5a1 1 0 0 0 1.838.319L12 15.61l1.143 1.905a1 1 0 0 0 1.838-.319l1-5a1 1 0 0 0-1.962-.392l-.492 2.463-.67-1.115a1 1 0 0 0-1.714 0l-.67 1.116-.492-2.464Z" clip-rule="evenodd"/>
                                          </svg>
                                                                                   
                                        <a href="/engineer/datalaporan/view/">template_dokumentasi.docx</a>
                                    </div>
                                </div>
                                <div class="col-span-6">
                                    <hr>
                                </div>
                                <div class="col-span-6">
                                    <label for="komentar" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Komentar
                                    </label>
                                    <input
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="komentar" id="komentar" placeholder="Komentar hanya untuk Engineer dan Manager ketika ada Revisi!" value="{{ old('komentar') }}" readonly>
                                </div>
                                <div class="col-span-6 lg:col-span-2 justify-center">
                                    <label for="cek_manager" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Petugas Manager
                                    </label>
                                    <div class="flex justify-center my-4">
                                        <svg class="w-12 h-12 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                          </svg>                                      
                                    </div>
                                    <p class="text-sm mb-1 text-center font-normal">{{ $kegiatan->manager->name }}</p>
                                    <p class="text-sm mb-1 text-center font-normal">NIK : {{ $kegiatan->manager->nik }}</p>
                                    <hr>
                                </div>
                                <div class="col-span-6 lg:col-span-2 justify-center">
                                    <label for="cek_engineer" class="text-sm font-medium text-gray-900 block mb-2 text-center">
                                        Petugas Engineer
                                    </label>
                                    <div class="flex justify-center my-4">
                                        <svg class="w-12 h-12 text-yellow-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"/>
                                          </svg>                                                                                 
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
                                        <svg class="w-12 h-12 text-green-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                          </svg>                                                                                   
                                    </div>
                                    <p class="text-sm mb-1 text-center font-normal">{{ $kegiatan->user->name }}</p>
                                    <p class="text-sm mb-1 text-center font-normal">NIK : {{ $kegiatan->user->nik }}</p>
                                    <hr>
                                </div>
                                <div class="col-span-6 pt-2 border-gray-200 rounded-b">
                                    <button
                                        class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        type="submit">
                                        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z"/>
                                            <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                        </svg>
                                        Save
                                    </button>
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
