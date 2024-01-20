<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-2">
      <a
        href="{{ route("inventory.stock.index") }}"
        class="text-gray-400 hover:text-gray-500"
      >
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __("Tambah Data Stok") }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col items-start justify-between gap-2 border-b border-gray-200 bg-white px-4 py-3 sm:px-6 lg:flex-row lg:items-center lg:gap-0"
        >
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Form Tambah Data Stok
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
              Tambah data stok untuk stok masuk
            </p>
          </div>
        </div>
        <form
          method="POST"
          action="{{ route("inventory.stock.store") }}"
          class="mx-auto p-4 sm:px-6"
        >
          @csrf
          <div class="mb-5">
            <label
              for="date"
              class="mb-2 block text-sm font-medium text-gray-900"
            >
              Tanggal
            </label>
            <input
              type="date"
              id="date"
              name="date"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
              required
            />
          </div>
          <div class="mb-5">
            <label
              for="material"
              class="mb-2 block text-sm font-medium text-gray-900"
            >
              Bahan Baku
            </label>
            <select
              id="material"
              name="material_id"
              required
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500"
            >
              <option selected>Pilih Bahan Baku</option>
              @foreach ($materials as $material)
                <option value="{{ $material->id }}">
                  {{ $material->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-5">
            <label
              for="quantity"
              class="mb-2 block text-sm font-medium text-gray-900"
            >
              Jumlah Stok Masuk
            </label>
            <input
              type="number"
              id="quantity"
              name="quantity_in"
              min="1"
              required
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-500 focus:border-indigo-500 focus:ring-indigo-500"
            />
          </div>
          <div class="flex">
            <button
              type="submit"
              class="ms-auto w-full rounded-lg bg-indigo-700 px-8 py-2.5 text-center text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 sm:w-auto"
            >
              Tambah
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
