<!DOCTYPE html>
<html lang="en">

<head>
    <x-app />
</head>

<body>
    {{-- navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-blue-600 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="{{ asset('img/iconlintas.png') }}" class="h-8 me-3" alt="Lintasarta Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Lembur WJA</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button" class="flex text-sm rounded-full focus:ring-5 focus:ring-gray-300"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full object-cover object-center" src="{{ asset('img/' . Auth::user()->foto) }}"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900" role="none">
                                    {{ Auth::user()->name }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="/manager/profile/{{ Auth::user()->id_user }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Profile</a>
                                </li>
                                <hr>
                                <li>
                                    <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-200"
                                        role="menuitem">
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <div>
        <main class="w-full flex-grow">
            {{-- Card Section --}}
            <div class="h-screen bg-blue-50 flex flex-wrap items-center justify-center">
                <div class="container lg:w-2/6 xl:w-2/7 sm:w-full md:w-2/3 bg-white shadow-lg transform duration-200 easy-in-out ">
                    <div class=" h-40 overflow-hidden flex justify-between header_foto" >
                        <a href="/manager" class="text-white bg-transparent hover:bg-white hover:text-red-600 rounded-bl-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </a>
                    </div>
                    <div class="flex justify-center px-5-mt-12">
                        <img class="h-32 w-32 bg-white p-2 rounded-full object-cover object-center" src="{{ asset('/img/' . $user->foto) }}" alt="placeholder foto" />
                    </div>
                    <div class=" ">
                        <div class="text-center px-14">
                            <h2 class="text-gray-800 text-3xl font-bold"> {{$user->name}} </h2>
                            <a class="text-gray-400 mt-2 hover:text-blue-500" href="https://www.instagram.com/immohitdhiman/" target="BLANK()">{{$user->email}}</a>
                            <div class="flex justify-center items-center">
                                <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z" clip-rule="evenodd"/>
                                  </svg>                                  
                                <p class="text-gray-500 text-md"> {{$user->jabatan}} </p>
                            </div>
                            <div class="flex justify-center items-center">
                                <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.833 2c-.507 0-.98.216-1.318.576A1.92 1.92 0 0 0 6 3.89V21a1 1 0 0 0 1.625.78L12 18.28l4.375 3.5A1 1 0 0 0 18 21V3.889c0-.481-.178-.954-.515-1.313A1.808 1.808 0 0 0 16.167 2H7.833Z"/>
                                  </svg>                                  
                                <p class="text-gray-500 text-md"> {{$user->mitra}} </p>
                            </div>
                            <div class="flex justify-center items-center">
                                <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a28.076 28.076 0 0 1-1.091 9M7.231 4.37a8.994 8.994 0 0 1 12.88 3.73M2.958 15S3 14.577 3 12a8.949 8.949 0 0 1 1.735-5.307m12.84 3.088A5.98 5.98 0 0 1 18 12a30 30 0 0 1-.464 6.232M6 12a6 6 0 0 1 9.352-4.974M4 21a5.964 5.964 0 0 1 1.01-3.328 5.15 5.15 0 0 0 .786-1.926m8.66 2.486a13.96 13.96 0 0 1-.962 2.683M7.5 19.336C9 17.092 9 14.845 9 12a3 3 0 1 1 6 0c0 .749 0 1.521-.031 2.311M12 12c0 3 0 6-2 9"/>
                                  </svg>                                  
                                <p class="text-gray-500 text-md"> {{$user->nik}} </p>
                            </div>
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center items-center">
                                    <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"/>
                                      </svg>                                      
                                    <p class="text-gray-500 text-md mr-3"> {{$user->no_telp}} </p>
                                </div>
                                <div class="flex justify-center items-center">
                                    <svg class="w-5 h-5 mr-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                      </svg>                                      
                                    <p class="text-gray-500 text-md"> {{$user->alamat}} </p>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6" />
                        <div class="flex  bg-gray-50 ">
                            <div class="text-center w-1/2 p-4 hover:bg-gray-100 cursor-pointer flex items-center justify-center">
                                <p><span class="font-semibold">2.5 Hours </span> Lembur</p>
                            </div>
                            <div class="border"></div>
                            <button type="button" data-modal-target="editprofile-modal" data-modal-toggle="editprofile-modal" class="font-semibold text-center w-1/2 p-4 hover:bg-gray-100 cursor-pointer text-black ">
                                Edit
                            </button>                                                    
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Main modal -->
    <div id="editprofile-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="editprofile-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-7 text-xl font-medium text-gray-900 dark:text-white">Edit Profile</h3>
                    <form class="space-y-6" action="/profile/edit/action/{{ $user->id_user }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

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
                                    type="password" name="password" id="password" placeholder="password"="" value="{{ old('password') }}">
                                    <button type="button" onclick="togglePasswordVisibility('password', 'eyeIcon1')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon1">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="text-blue-300">*Jika mengisi password berarti mereset / mengganti password</p>
                            </div>
                            <div class="col-span-6 lg:col-span-3">
                                <label for="confirm_password" class="text-sm font-medium text-gray-900 block mb-2">Confirm Password</label>
                                <div class="relative">
                                    <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 pr-10"
                                    type="password" name="confirm_password" id="confirm_password" placeholder="confirm password"="" value="{{ old('password') }}">
                                    <button type="button" onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                                        <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon2">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
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
