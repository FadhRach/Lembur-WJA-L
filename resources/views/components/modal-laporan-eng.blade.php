{{-- !-- Main modal --> --}}
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full lg:h-auto">
        <!-- Modal content -->
        <div class="relative p-2 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-4">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <h3 class="font-semibold mb-1">
                        Laporan Lembur
                    </h3>
                    <p class="font-bold">
                        id_kegiatan - Judul
                    </p>
                </div>
                <div>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <form method="POST" action=""
                enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 md:col-span-3">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Lokasi</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                        type="text" name="name" id="name">
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Lama Kegiatan</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="email" name="email" id="email" placeholder="nama@example.com">
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="nik" class="text-sm font-medium text-gray-900 block mb-2">Tanggal Awal</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="number" name="nik" id="nik" placeholder="12345678" >
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <label for="no_telp" class="text-sm font-medium text-gray-900 block mb-2">Tanggal Akhir</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="text" name="no_telp" id="no_telp"  placeholder="+628123456789" >
                    </div>
                    <div class="col-span-6">
                        <hr>
                    </div>
                    <div class="col-span-6 lg:col-span-2">
                        <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Kegiatan Tercapai</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="text" name="alamat" id="alamat"  placeholder="+628123456789" >
                    </div>                                                             
                    <div class="col-span-6 lg:col-span-2">
                        <label for="jabatan" class="text-sm font-medium text-gray-900 block mb-2">Deskripsi Hasil/Kendala</label>
                        <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                        name="jabatan"></textarea>
                    </div>
                    <div class="col-span-6 lg:col-span-2">
                        <label for="mitra" class="text-sm font-medium text-gray-900 block mb-2">Dokumentasi</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full"
                        type="file" name="mitra" id="mitra" placeholder="KSPS">
                    </div>
                    <div class="col-span-2 lg:col-span-2">
                        <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Manager</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="text" name="alamat" id="alamat"  placeholder="+628123456789" >
                    </div>
                    <div class="col-span-2 lg:col-span-2">
                        <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Engineer</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="text" name="alamat" id="alamat"  placeholder="+628123456789" >
                    </div> 
                    <div class="col-span-2 lg:col-span-2">
                        <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Karyawan</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                        type="text" name="alamat" id="alamat"  placeholder="+628123456789" >
                    </div> 
                    <div class="col-span-6 border-t pt-2 border-gray-200 rounded-b">
                        <button class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z"/>
                                <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                            </svg>
                            Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>