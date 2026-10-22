<x-dashboard title="Teacher">
  <h1 class="text-2xl font-bold mb-5">Daftar Guru Ruang Belajar</h1>
  <a href="{{ route("teachers.create") }}">
    <button
      class="bg-[#385A42] text-white px-3 py-2 rounded-xl cursor-pointer hover:bg-[#385A42]/80 transition">Tambah
      Guru</button>
  </a>
  @if (session("message"))
    <p class="text-red-500 block bg-yellow-100 p-3 w-full rounded-md mt-5">{{ session("message") }}
    </p>
  @endif

  <table class="w-full mt-5">
    <thead>
      <tr class="border">
        <th class="border">no</th>
        <th class="border">name</th>
        <th class="border">email</th>
        <th class="border">action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teachers as $teacher)
        <tr>
          <td class="border p-3 text-center">{{ $loop->iteration }}</td>
          <td class="border p-3">{{ $teacher->name }}</td>
          <td class="border p-3">{{ $teacher->email }}</td>
          <td class="border text-center">
            <a href="{{ route("teachers.show", $teacher->id) }}" class="w-fit">
              <button
                class="bg-[#E66C32] text-white px-3 py-2 rounded-xl cursor-pointer hover:bg-[#E66C32]/80 transition">detail</button>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-dashboard>
