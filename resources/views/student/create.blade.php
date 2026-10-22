<x-dashboard title="Student">
  <x-nav-back href="students.index" />
  <h1 class="text-2xl font-bold mb-5">Data Siswa</h1>
  <div class="flex gap-10">
    <div class="w-72">
      <img src="../../img/default.png" alt="default" class="object-cover">
    </div>
    <form action="{{ route("students.store") }}" method="post"
      class="w-1/2 text-lg flex flex-col gap-3">
      @csrf
      <label class="flex gap-3 w-full flex-wrap">
        <span class="pt-2">
          <p class="inline-block w-19">Nama</p> :
        </span>

        <div class="flex-1">
          <input type="text" value="{{ old("name") ?: "" }}"
            class="px-3 py-2 w-full bg-blue-100 rounded-md {{ $errors->has("name") ? "border-3 border-red-500 bg-red-100" : "" }}"
            name="name">
          @error("name")
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
          @enderror
        </div>
      </label>
      <label class="flex gap-3 w-full flex-wrap">
        <span class="pt-2">
          <p class="inline-block w-19">Email</p> :
        </span>
        <div class="flex-1">
          <input type="text" value="{{ old("email") ?: "" }}"
            class="px-3 py-2 w-full bg-blue-100 rounded-md {{ $errors->has("email") ? "border-3 border-red-500 bg-red-100" : "" }}"
            name="email">
          @error("email")
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
          @enderror
        </div>
      </label>
      <label class="flex gap-3 w-full flex-wrap">
        <span class="pt-2">
          <p class="inline-block w-19">No Telp</p> :
        </span>
        <div class="flex-1">
          <input type="text" value="{{ old("phone") ?: "" }}"
            class="px-3 py-2 w-full bg-blue-100 rounded-md {{ $errors->has("phone") ? "border-3 border-red-500 bg-red-100" : "" }}"
            name="phone">
          @error("phone")
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
          @enderror
        </div>
      </label>
      <label class="flex gap-3 w-full flex-wrap">
        <span class="pt-2">
          <p class="inline-block w-19">Alamat</p> :
        </span>
        <div class="flex-1">
          <textarea
            class="px-3 py-2 w-full bg-blue-100 rounded-md h-32 resize-none {{ $errors->has("address") ? "border-3 border-red-500 bg-red-100" : "" }}"
            name="address">{{ old("address") ?: "" }}</textarea>
          @error("address")
            <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
          @enderror
        </div>
      </label>
      <div class="flex justify-end">
        <button type="submit"
          class="bg-blue-600 text-white px-7 py-2 rounded-xl cursor-pointer hover:bg-blue-600/80 transition">Submit</button>
      </div>
    </form>
  </div>
</x-dashboard>
