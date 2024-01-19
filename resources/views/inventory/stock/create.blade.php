<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-2">
      <a href="{{ route('inventory.stock.index') }}" class="text-gray-400 hover:text-gray-500">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Tambah Data Stok') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col gap-2 items-start lg:flex-row lg:gap-0 lg:items-center justify-between px-4 py-3 bg-white border-b border-gray-200 sm:px-6">
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Form Tambah Data Stok
            </h3>
            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
              Tambah data stok untuk stok masuk
            </p>
          </div>
        </div>
        <form method="POST" action="{{ route('inventory.stock.store') }}" class="mx-auto p-4 sm:px-6">
          @csrf
          <div class="mb-5">
            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
            <input type="date" id="date" name="date"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-gray-500"
              required>
          </div>
          <div class="mb-5">
            <label for="material" class="block mb-2 text-sm font-medium text-gray-900">
              Bahan Baku
            </label>
            <select id="material" name="material_id" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5">
              <option selected>Pilih Bahan Baku</option>
              @foreach ($materials as $material)
                <option value="{{ $material->id }}">{{ $material->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-5">
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">
              Jumlah Stok Masuk
            </label>
            <input type="number" id="quantity" name="quantity_in" min="1" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 placeholder-gray-500">
          </div>
          <div class="flex">
            <button type="submit"
              class="ms-auto text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-8 py-2.5 text-center">
              Tambah
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
