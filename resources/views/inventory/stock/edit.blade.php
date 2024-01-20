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
        {{ __("Edit Data Stok") }}
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
              Form Edit Data Stok
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
              Edit data stok yang sudah ada
            </p>
          </div>
        </div>
        <form
          method="POST"
          action="{{ route("inventory.stock.update", $stock->id) }}"
          class="mx-auto p-4 sm:px-6"
        >
          @csrf
          @method("PATCH")
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
              value="{{ $stock->date }}"
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
              <option value="{{ $stock->material->id }}" selected>
                {{ $stock->material->name }}
              </option>
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
              value="{{ $stock->quantity_in }}"
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
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
