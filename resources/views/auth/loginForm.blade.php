<x-layout title="Login">
  <div class="flex w-full h-screen items-center justify-center">
    <div class="min-w-md">
      <h1 class="text-4xl font-bold mb-8">Login</h1>
      @error("error")
        <p class="text-red-500 text-sm">{{ $message }}</p>
      @enderror
      <form action="{{ route("login") }}" method="post" class="mt-2">
        @csrf
        <div class="mb-5">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" id="email"
            class="inputForm @error("email") border-red-500 border-2 @enderror"
            value="{{ old("email") }}">
          @error("email")
            <p class="text-red-500 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" name="password" id="password"
            class="inputForm @error("password") border-red-500 border-2 @enderror">
          @error("password")
            <p class="text-red-500 text-sm">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <button type="submit"
            class="w-full bg-[#385A42] hover:bg-[#385A42]/80 cursor-pointer transition-all text-white p-2 rounded-md">Login</button>
        </div>
      </form>
      <div class="text-center"> Belum punya akun?
        <a href="{{ route("register") }}" class="text-blue-500">Daftar</a>
      </div>
    </div>
  </div>
</x-layout>
