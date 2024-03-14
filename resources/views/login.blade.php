<!DOCTYPE html>
<html lang="en">
<head>
  <x-app />
</head>
<body>
    <section class="bg-blue-100 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
          <!-- form -->
          <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-bold text-blue-700 text-4xl">Lembur WJA.</h2>
            <p class="text-xs mt-2 text-blue-400">Aplikasi Lembur Lintasarta West Java Area</p>

            <form action="" class="flex flex-col gap-4" method="POST">
                @csrf
              <input class="p-2 mt-4 rounded-xl border border-gray-100" type="email" name="email" placeholder="Email" value="{{ old('email')}}">
              @error('email')
                <p class="text-xs ml-2 text-red-400">{{ $message }}</p>
              @enderror
              <div class="relative">
                <input class="p-2 rounded-xl border w-full border-gray-100" type="password" name="password" id="password" placeholder="Password">
                <button type="button" onclick="togglePasswordVisibility('password', 'eyeIcon2')" class="absolute inset-y-0 right-0 flex items-center justify-center px-3 focus:outline-none">
                  <svg class="w-5 h-5 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="eyeIcon2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 14c-.5-.6-.9-1.3-1-2 0-1 4-6 9-6m7.6 3.8A5 5 0 0 1 21 12c0 1-3 6-9 6h-1m-6 1L19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>
              </button>
                @error('password')
                <p class="text-xs mt-2 ml-2 text-red-400">{{ $message }}</p>
              @enderror
              </div>
                <button name="submit" type="submit" class="bg-blue-600 rounded-xl text-white py-2 duration-500 mt-4" value="Login">Login</button>
            </form>

          </div>

          <!-- image -->
          <div class="md:block hidden w-1/2">
            <img class="rounded-2xl" src="{{ asset('img/loginbg.jpg') }}">
          </div>
        </div>
      </section>

      @if($massage = Session::get('failed'))
      <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login !',
            text: 'Email atau Password Salah'
        })
      </script>
      @endif
</body>
</html>