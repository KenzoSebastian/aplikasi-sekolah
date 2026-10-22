<x-dashboard title="Home">
  <h1>ini home</h1>
  @auth
    udah login
  @endauth
  @guest
    belum login
  @endguest
  <h2>{{ $user }}</h2>
  <form action="/login" method="post">
    @csrf
    <input type="text" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <button type="submit">login</button>
  </form>
  @error("error")
    {{ $message }}
  @enderror
  <form action="/logout" method="post">
    @csrf
    <button type="submit">logout</button>
</x-layout>
