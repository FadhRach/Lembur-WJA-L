<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan/>
  
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            <main class="w-full flex-grow">
                <h1 class="text-3xl text-black pb-6">Buat Lembur</h1>

                <div class="bg-white border rounded-lg relative">     
                    <div class="p-6 space-y-6">
                        <form action="/manager/daftarkaryawan/tambahsave" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field() }} @csrf
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Nama Karyawan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="+628123456789" value="{{ auth::user()->name }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Petugas Engineer</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Nama Engineer" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Petugas Manager</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Nama Manager" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Judul</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Judul Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Waktu Kegiatan Awal</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="datetime-local" name="?" id="?"  placeholder="Judul Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Waktu Kegiatan Akhir</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="datetime-local" name="?" id="?"  placeholder="Judul Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Lama Kegiatan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Judul Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">Deskripsi</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Deskripsi Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">lokasi</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Lokasi Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?" class="text-sm font-medium text-gray-900 block mb-2">lokasi</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="?" id="?"  placeholder="Lokasi Lembur" value="{{ old('?') }}">
                                </div>
                                <div class="col-span-6 border-t pt-2 border-gray-200 rounded-b">
                                    <button class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                                        <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                          </svg>
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
  
</body>
</html>