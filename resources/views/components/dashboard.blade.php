<x-layout :$title>
  <div class="flex">
    <x-sidebar />
    <div class="ml-[20%] bg-[#EFEEE6] flex-1 min-h-screen">
      <x-navbar />
      <div class="ml-10 mt-5 bg-white min-h-screen shadow-md p-5">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layout>
