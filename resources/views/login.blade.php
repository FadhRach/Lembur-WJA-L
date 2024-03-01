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
                <input class="p-2 rounded-xl border w-full border-gray-100" type="password" name="password" placeholder="Password">
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