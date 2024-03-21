<!DOCTYPE html>
<html lang="en">
<head>
    <x-app />
</head>
<body>
    {{-- navbar dan sidebar --}}
    <x-nav-aside-karyawan/>
  
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
           <h1>Pengajuan Lembur</h1>
            <br>
           <p>Tunggu supaya engineer dan manager dapat mengizinkan lembur anda!</p>
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