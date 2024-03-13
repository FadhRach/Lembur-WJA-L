<div id="tambah-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg" style="box-shadow: 0px 4px 6px rgba(66, 153, 225, 0.5);">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Karyawan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="tambah-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>


            <!-- Modal body -->
            <div class="bg-white border rounded-lg relative">     
                <div class="p-6 space-y-6">
                    <form action="/manager/daftarkaryawan/tambahsave" method="POST"  enctype="multipart/form-data">
                        {{ csrf_field() }} @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 flex justify-center items-center">
                                <img class="h-44 w-44 rounded-full border border-blue-600 p-1 object-cover object-center" id="imagePreview" src="{{ asset('img/Profile_Icon.png')}}" alt="Placeholder Image">
                            </div>
                            <div class="col-span-6">
                                <label for="foto" class="text-sm font-medium text-gray-900 block mb-2">Input Profile Gambar</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full" 
                                aria-describedby="user_avatar_help" id="foto" type="file" name="foto" placeholder="foto profile" value="{{ old('foto') }}" onchange="previewImage(this)">
                            </div>
                            <div class="col-span-6 lg:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nama Karyawan</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                type="text" name="name" id="name" placeholder="Nama Karyawan" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('name') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 lg:col-span-3">
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                type="email" name="email" id="email" placeholder="nama@example.com" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('email') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 lg:col-span-3">
                                <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                                <div class="relative">
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                    type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}">
                                    <button type="button" onclick="togglePasswordVisibility('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon1">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </button>
                                </div>
                                @if ($errors->has('password'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 lg:col-span-3">
                                <label for="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                <div class="relative">
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                    type="password" name="confirm_password" id="confirm_password" placeholder="confirm password" value="{{ old('password') }}">
                                    <button type="button" onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon2">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </button>
                                </div>
                                @if ($errors->has('password'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('password') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="nik" class="text-sm font-medium text-gray-900 block mb-2">NIK/NIP</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                type="number" name="nik" id="nik" placeholder="12345678" value="{{ old('nik') }}">
                                @if ($errors->has('nik'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('nik') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="no_telp" class="text-sm font-medium text-gray-900 block mb-2">No. Telpon</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                type="text" name="no_telp" id="no_telp"  placeholder="+628123456789" value="{{ old('no_telp') }}">
                                @if ($errors->has('no_telp'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('no_telp') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="alamat" class="text-sm font-medium text-gray-900 block mb-2">Alamat</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                type="text" name="alamat" id="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                @if ($errors->has('alamat'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('alamat') }}
                                </div>
                                @endif
                            </div>
                            
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="role" class="text-sm font-medium text-gray-900 block mb-2">Role</label>
                                <select class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                name="role" id="role"  value="{{ old('role') }}">
                                    <option value="" class="text-gray-300" disabled selected hidden>pilih role</option>
                                    <option value="karyawan">Karyawan</option>
                                    <option value="engineer">Engineer</option>
                                    <option value="manager">Manager</option>
                                </select>
                                @if ($errors->has('role'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('role') }}
                                </div>
                                 @endif
                            </div>                                
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="jabatan" class="text-sm font-medium text-gray-900 block mb-2">Jabatan</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5" 
                                type="text" name="jabatan" id="jabatan" placeholder="Senior Karyawan" value="{{ old('jabatan') }}">
                                @if ($errors->has('jabatan'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('jabatan') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 md:col-span-2 sm:col-span-3">
                                <label for="mitra" class="text-sm font-medium text-gray-900 block mb-2">Mitra</label>
                                <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5"
                                type="text" name="mitra" id="mitra" placeholder="KSPS" value="{{ old('mitra') }}">
                                @if ($errors->has('mitra'))
                                <div class="block w-full text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    {{ $errors->first('mitra') }}
                                </div>
                                 @endif
                            </div>
                            <div class="col-span-6 border-t pt-2 border-gray-200 rounded-b">
                                <button class="flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                                    <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1c0-.6.4-1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                    </svg>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>