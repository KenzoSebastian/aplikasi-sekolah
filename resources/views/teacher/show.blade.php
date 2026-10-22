<x-dashboard title="Teacher">
  <x-nav-back href="teachers.index" />
  <h1 class="text-2xl font-bold mb-1">Data Guru</h1>
  @if (session("message"))
    <p class="text-red-500 block bg-yellow-100 p-3 w-full rounded-md">{{ session("message") }}
    </p>
  @endif
  <div class="flex gap-10 mt-5">
    <div class="w-72">
      <img src="../img/default.png" alt="default" class="object-cover">
    </div>
    <div class="w-1/2 text-lg flex flex-col gap-3">
      <label class="flex items-center gap-3 w-full">
        <p class="inline-block w-19">Nama</p> :
        <input type="text" value="{{ $teacher->name }}" disabled
          class="px-3 py-2 bg-gray-200 flex-1 rounded-md">
      </label>
      <label class="flex items-center gap-3 w-full">
        <p class="inline-block w-19">Email</p> :
        <input type="text" value="{{ $teacher->email }}" disabled
          class="px-3 py-2 bg-gray-200 flex-1 rounded-md">
      </label>
      <label class="flex items-center gap-3 w-full">
        <p class="inline-block w-19">No Telp</p> :
        <input type="text" value="{{ $teacher->phone }}" disabled
          class="px-3 py-2 bg-gray-200 flex-1 rounded-md">
      </label>
      <div class="flex justify-end gap-3">
        <a href="{{ route("teachers.edit", $teacher->id) }}">
          <Button
            class="bg-[#E66C32] text-white px-7 py-2 rounded-xl cursor-pointer hover:bg-[#E66C32]/80 transition">Edit</Button>
        </a>
        <form action="{{ route("teachers.destroy", $teacher->id) }}" method="post"
          onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
          @csrf
          @method("delete")
          <Button type="submit"
            class="bg-[#0E3F18] text-white px-7 py-2 rounded-xl cursor-pointer hover:bg-[#0E3F18]/80 transition">
            Hapus</Button>
        </form>

      </div>
    </div>
  </div>
</x-dashboard>
