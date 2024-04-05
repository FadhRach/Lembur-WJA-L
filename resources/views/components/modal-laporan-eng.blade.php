<div id="readProductModal{{ $keg->id_kegiatan }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <!-- Modal content -->
    <div class="relative p-4 w-full max-w-4xl h-full lg:h-auto">
        <div class="relative p-2 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-4">
            <!-- Modal header -->
            <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                    <h3 class="font-semibold mb-1">
                        Laporan Lembur
                    </h3>
                    <p class="font-bold">
                        {{ $keg->id_kegiatan }} - {{ $keg->judul }}
                    </p>
                </div>
                <div>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal{{ $keg->id_kegiatan }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <!-- Modal content -->
            <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!-- Your form fields and content here -->
            </form>
        </div>
    </div>
</div>
