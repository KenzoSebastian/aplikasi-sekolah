<div class="w-1/5 fixed left-0 bottom-0 top-0">
  <div class="bg-[#0E3F18] h-20 flex justify-center items-center gap-2 mb-10">
    <img src="../../img/icon.png" alt="icon" class="w-14">
    <h1 class="text-3xl font-bold text-white">Ruang Belajar</h1>
  </div>
  <p class="px-5 text-sm mb-3">Main Menu</p>
  @foreach ($routes as $route)
    <a href="{{ route($route["route"]) }}">
      <div
        class="hover:bg-[#E66C32]/10 transition-all duration-500 {{ request()->routeIs($route["route"]) ? "bg-[#E66C32]/20 hover:bg-[#E66C32]/20 " : "" }}">
        <div class="flex gap-2 items-center pl-8 py-3">
          <img src="{{ "../../img/{$route["img"]}.png" }}" alt="{{ $route["img"] }}" class="w-7">
          <p class="font-semibold text-lg">{{ $route["name"] }}</p>
        </div>
      </div>
    </a>
  @endforeach
</div>
