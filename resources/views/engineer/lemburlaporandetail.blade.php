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
                <div class="bg-white border rounded-lg relative">
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between pb-6">
                            <h1 class="text-3xl text-black">
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
                        <form action="/engineer/datalaporan/edit" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }} @csrf
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="tgl_awal" class="text-sm font-medium text-gray-900 block mb-2">
                                        Waktu Kegiatan Awal
                                    </label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        type="datetime-local" name="tgl_awal" placeholder="Judul Lembur"
                                        value="{{ $laporan->kegiatan->tgl_awal }}">
                                    @if ($errors->has('tgl_awal'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('tgl_awal') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="tgl_awal" class="text-sm font-medium text-gray-900 block mb-2">
                                        Waktu Kegiatan Akhir
                                    </label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        type="datetime-local" name="tgl_awal" id="tgl_awal" placeholder="Dari Kapan"
                                        value="{{ old('tgl_awal') }}">
                                    @if ($errors->has('tgl_awal'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('tgl_awal') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="tgl_akhir" class="text-sm font-medium text-gray-900 block mb-2">
                                        Lama Kegiatan
                                    </label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        type="datetime-local" name="tgl_akhir" id="tgl_akhir" placeholder="Sampai Kapan"
                                        value="{{ old('tgl_akhir') }}">
                                    @if ($errors->has('tgl_akhir'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('tgl_akhir') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="lama_kegiatan" class="text-sm font-medium text-gray-900 block mb-2">Lama
                                        Kegiatan</label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        type="text" name="lama_kegiatan" id="lama_kegiatan"
                                        placeholder="Judul Lembur" value="{{ old('lama_kegiatan') }}" readonly>
                                    @if ($errors->has('lama_kegiatan'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('lama_kegiatan') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="deskripsi"
                                        class="text-sm font-medium text-gray-900 block mb-2">Deskripsi</label>
                                    <textarea
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        name="deskripsi" id="deskripsi" placeholder="Deskripsi Lembur">{{ old('deskripsi') }}</textarea>
                                    @if ($errors->has('deskripsi'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('deskripsi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="?"
                                        class="text-sm font-medium text-gray-900 block mb-2">lokasi</label>
                                    <input
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                        type="text" name="lokasi" placeholder="Lokasi Lembur"
                                        value="{{ old('lokasi') }}">
                                    @if ($errors->has('lokasi'))
                                        <div class="block w-full text-sm text-red-800 dark:bg-gray-800" role="alert">
                                            {{ $errors->first('lokasi') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 border-t pt-2 border-gray-200 rounded-b">
                                    <button
                                        class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        type="submit">
                                        <svg class="w-6 h-6 mr-2 text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
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
