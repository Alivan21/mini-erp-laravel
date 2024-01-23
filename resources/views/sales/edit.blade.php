<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center gap-2">
      <a href="{{ route('sales.index') }}" class="text-gray-400 hover:text-gray-500">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Ubah Data Penjualan Baru') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col items-start justify-between gap-2 border-b border-gray-200 bg-white px-4 py-3 sm:px-6 lg:flex-row lg:items-center lg:gap-0">
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Form Ubah Data Penjualan
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
              Silahkan lengkapi form berikut untuk mengubah data penjualan.
            </p>
          </div>
        </div>
        <form method="POST" action="{{ route('sales.update', $sales) }}" class="mx-auto p-4 sm:px-6">
          @csrf
          @method('PATCH')
          <div class="mb-5">
            <label for="date" class="mb-2 block text-sm font-medium text-gray-900">
              Tanggal Penjualan
            </label>
            <input type="date" id="date" name="date"
              value="{{ old('date', date('Y-m-d', strtotime($sales->date))) }}"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500"
              required />
          </div>
          <div class="mb-5">
            <label for="customer" class="mb-2 block text-sm font-medium text-gray-900">
              Pelanggan
            </label>
            <select id="customer" name="customer_id" required
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
              @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                  {{ $customer->id == $sales->customer_id ? 'selected' : '' }}>
                  {{ $customer->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-5">
            <label for="product" class="mb-2 block text-sm font-medium text-gray-900">
              Barang
            </label>
            <select id="product" name="product_id" required
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
              @foreach ($products as $product)
                <option value="{{ $product->id }}" data-price="{{ $product->price }}"
                  {{ $product->id == $sales->product_id ? 'selected' : '' }}>
                  {{ $product->name }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-5">
            <label for="quantity" class="mb-2 block text-sm font-medium text-gray-900">
              Jumlah Barang
            </label>
            <input type="number" id="quantity" name="quantity"
              value="{{ old('quantity', $sales->quantity) }}"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500"
              required />
          </div>
          <div class="mb-5">
            <label for="total_price" class="mb-2 block text-sm font-medium text-gray-900">
              Total Harga
            </label>
            <input type="number" id="total_price" name="total_price" readonly
              value="{{ $sales->total_price }}"
              class="block w-full rounded-lg border border-gray-300 bg-gray-200 p-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-0" />
          </div>
          <div class="flex">
            <button type="submit"
              class="ms-auto w-full rounded-lg bg-indigo-700 px-8 py-2.5 text-center text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 sm:w-auto">
              Ubah
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#quantity, #product').on('change', function() {
        let selectedProduct = $('#product option:selected');
        let price = selectedProduct.attr('data-price');

        if (price) {
          let quantity = $('#quantity').val();
          let totalPrice = parseFloat(quantity) * parseFloat(price);
          $('#total_price').val(totalPrice);
        } else {
          console.error('Product price is undefined. Please select a product.');
        }
      });
    });
  </script>
</x-app-layout>
