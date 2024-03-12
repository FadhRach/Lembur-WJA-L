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
                <h1 class="text-3xl text-black pb-6">Tambah Karyawan</h1>
                
                <div class="bg-white border rounded-lg relative">     
                    <div class="p-6 space-y-6">
                        <form action="#">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 lg:col-span-3 flex justify-center items-center">
                                    <img class="h-44 w-44 rounded-full border border-blue-600 p-1 object-cover object-center" id="imagePreview" src="{{ asset('img/Profile_Icon.png')}}" alt="Placeholder Image">
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="foto" class="text-sm font-medium text-gray-900 block mb-2">Input Profile Gambar</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full" 
                                    aria-describedby="user_avatar_help" id="foto" type="file" name="foto" placeholder="foto profile" value="{{ old('foto') }}" onchange="previewImage(this)">
                                    <p class="text-red-600">*jika tidak ada maka default</p>
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nama Karyawan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                    type="text" name="name" id="name" placeholder="Nama Karyawan" required="" value="{{ old('name') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-3">
                                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="email" name="email" id="email" placeholder="nama@example.com" required="" value="{{ old('email') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                    <div class="relative">
                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                        type="password" name="password" id="password" placeholder="password" required="" value="{{ old('password') }}">
                                        <button type="button" onclick="togglePasswordVisibility('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon1">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-span-6 lg:col-span-2">
                                    <label for="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                    <div class="relative">
                                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                        type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" required="" value="{{ old('password') }}">
                                        <button type="button" onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon2">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-span-6 lg:col-span-1 md:col-span-3">
                                    <label for="nik" class="text-sm font-medium text-gray-900 block mb-2">NIK/NIP</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="number" name="nik" id="nik" placeholder="12345678" required="" value="{{ old('nik') }}">
                                </div>
                                <div class="col-span-6 lg:col-span-1 md:col-span-3">
                                    <label for="no_telp" class="text-sm font-medium text-gray-900 block mb-2">No. Telpon</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="no_telp" id="no_telp"  placeholder="+628123456789" required="" value="{{ old('no_telp') }}">
                                </div>
                                <div class="col-span-6 md:col-span-2">
                                    <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                    <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    name="role" id="role"  required="" value="{{ old('role') }}">
                                        <option value="" class="text-gray-300" disabled selected hidden>pilih role</option>
                                        <option value="karyawan">Karyawan</option>
                                        <option value="engineer">Engineer</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>                                
                                <div class="col-span-6 md:col-span-2">
                                    <label for="jabatan" class="text-sm font-medium text-gray-900 block mb-2">Jabatan</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                    type="text" name="jabatan" id="jabatan" placeholder="Senior Karyawan" required="" value="{{ old('jabatan') }}">
                                </div>
                                <div class="col-span-6 md:col-span-2">
                                    <label for="mitra" class="text-sm font-medium text-gray-900 block mb-2">Mitra</label>
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                    type="text" name="mitra" id="mitra" placeholder="KSPS" required="">
                                </div>
                            </div>
                        </form>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 rounded-b">
                        <button class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
                    </div>
                
                </div>
            </main>
        </div>
    </div>

</body>
</html>