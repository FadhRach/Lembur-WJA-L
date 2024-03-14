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
                <div class="flex items-center justify-between pb-6">
                    <h1 class="text-3xl text-black">
                        Tambah Karyawan
                    </h1>
                    <a href="/manager/daftarkaryawan" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </a>                    
                </div>
                <div class="bg-white border rounded-lg relative">     
                    <div class="p-6 space-y-6">
                        <form method="POST" action="/manager/daftarkaryawan/editsave/{{ $user->id_user }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 flex justify-center items-center">
                                    <img class="h-44 w-44 rounded-full border border-blue-600 p-1 object-cover object-center" id="imagePreview" src="{{ asset('img/' . $user->foto) }}" alt="Placeholder Image">
                                </div>
                                <div class="col-span-6">
                                    <label for="foto" class="text-sm font-medium text-gray-900 block mb-2">Input Profile Gambar</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full" 
                                    aria-describedby="user_avatar_help" id="foto" type="file" name="foto" placeholder="foto profile" value="{{ old('foto') }}" onchange="previewImage(this)">
                                    <p class="text-blue-300">*jika tidak ada maka memakai foto sebelumnya</p>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nama Karyawan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                    type="text" name="name" id="name" placeholder="Nama Karyawan" value="{{ $user->name }}">
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="email" name="email" id="email" placeholder="nama@example.com" value="{{ $user->email }}">
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                    <div class="relative">
                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                        type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                                        <button type="button" onclick="togglePasswordVisibility('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon1">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 14c-.5-.6-.9-1.3-1-2 0-1 4-6 9-6m7.6 3.8A5 5 0 0 1 21 12c0 1-3 6-9 6h-1m-6 1L19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-blue-300">*Jika mengisi password berarti mereset / mengganti password</p>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                    <div class="relative">
                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                        type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" value="{{ old('password') }}">
                                        <button type="button" onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 14c-.5-.6-.9-1.3-1-2 0-1 4-6 9-6m7.6 3.8A5 5 0 0 1 21 12c0 1-3 6-9 6h-1m-6 1L19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-blue-300">*Jika mengisi password berarti mereset / mengganti password</p>
                                </div>
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="nik" class="text-sm font-medium text-gray-900 block mb-2">NIK/NIP</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="number" name="nik" id="nik" placeholder="12345678" value="{{ $user->nik }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="no_telp" class="text-sm font-medium text-gray-900 block mb-2">No. Telpon</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="no_telp" id="no_telp"  placeholder="+628123456789" value="{{ $user->no_telp }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Alamat</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="alamat" id="alamat"  placeholder="+628123456789" value="{{ $user->alamat }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                    <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                            name="role" id="role">
                                        <option value="karyawan" {{ $user->role === 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                                        <option value="engineer" {{ $user->role === 'engineer' ? 'selected' : '' }}>Engineer</option>
                                        <option value="manager" {{ $user->role === 'manager' ? 'selected' : '' }}>Manager</option>
                                    </select>
                                </div>                                                               
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="jabatan" class="text-sm font-medium text-gray-900 block mb-2">Jabatan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                    type="text" name="jabatan" id="jabatan" placeholder="Senior Karyawan" value="{{ $user->jabatan }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2 md:col-span-3">
                                    <label for="mitra" class="text-sm font-medium text-gray-900 block mb-2">Mitra</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="mitra" id="mitra" placeholder="KSPS" value="{{ $user->mitra }}">
                                </div>
                                <div class="col-span-6 border-t pt-2 border-gray-200 rounded-b">
                                    <button class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
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

</body>
</html>