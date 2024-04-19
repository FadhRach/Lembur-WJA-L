<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    <div class="flex flex-col h-screen">
        {{-- navbar --}}
        <nav class="flex-shrink-0 bg-white border-b border-gray-200">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <a href="#" class="flex ms-2 md:me-24">
                            <img src="{{ asset('img/iconlintas.png') }}" class="h-8 me-3" alt="Lintasarta Logo" />
                            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Lembur WJA</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center justify-start rtl:justify-end">
                            <a href="/engineer/datalaporan/{{ $file->id_kegiatan }}">
                                <svg class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                                  </svg>   
                            </a>
                        </div>
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
                                        <a href="/engineer/datalaporan/{{ $file->id_kegiatan }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                            role="menuitem">Kembali</a>
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
    
        {{-- IFRAME --}}
        <iframe class="flex-grow" src="{{ asset('dokumentasi/' . $file->buktifoto) }}" frameborder="0"></iframe>
    </div>
    
</body>
</html>