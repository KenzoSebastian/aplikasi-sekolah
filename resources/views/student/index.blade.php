<x-dashboard title="Student">
  <h1 class="text-2xl font-bold mb-5">Daftar Siswa Ruang Belajar</h1>
  <a href="{{ route("students.create") }}">
    <button
      class="bg-[#385A42] text-white px-3 py-2 rounded-xl cursor-pointer hover:bg-[#385A42]/80 transition">Tambah
      Siswa</button>
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
      @foreach ($students as $student)
        <tr>
          <td class="border p-3 text-center">{{ $loop->iteration }}</td>
          <td class="border p-3">{{ $student->name }}</td>
          <td class="border p-3">{{ $student->email }}</td>
          <td class="border text-center">
            <a href="{{ route("students.show", $student->id) }}" class="w-fit">
              <button
                class="bg-[#E66C32] text-white px-3 py-2 rounded-xl cursor-pointer hover:bg-[#E66C32]/80 transition">detail</button>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</x-dashboard>
