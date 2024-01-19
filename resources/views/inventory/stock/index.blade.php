<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Stok') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col gap-2 items-start lg:flex-row lg:gap-0 lg:items-center justify-between px-4 py-3 bg-white border-b border-gray-200 sm:px-6">
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Data Stok
            </h3>
            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
              Rangkuman data stok yang tersedia
            </p>
          </div>
          <div class="flex items-center">
            <a href="{{ route('inventory.stock.create') }}" class="no-underline">
              <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                <i class="fa-solid fa-circle-plus text-lg mr-2 -ml-1"></i>
                <span>Tambah Stok Masuk</span>
              </button>
            </a>
          </div>
        </div>
        <form action="{{ route('inventory.stock.index') }}" method="GET">
          <div class="flex items-center gap-5 px-4 py-3 bg-white border-b border-gray-200 sm:px-6">
            <select name="month"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-52 p-2.5">
              @foreach (range(1, 12) as $monthNumber)
                <option value="{{ $monthNumber }}" {{ $monthNumber == $month ? 'selected' : '' }}>
                  Bulan {{ $monthNumber }}
                </option>
              @endforeach
            </select>
            <button type="submit"
              class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
              Filter
            </button>
            <button type="button" onclick="window.location.href='{{ route('inventory.stock.index') }}'"
              class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
              Reset Filter
            </button>
          </div>
        </form>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Tanggal
                </th>
                <th scope="col" class="px-6 py-3">
                  Bahan Baku
                </th>
                <th scope="col" class="px-6 py-3">
                  Stok Masuk
                </th>
                <th scope="col" class="px-6 py-3">
                  Stok Keluar
                </th>
                <th scope="col" class="px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($stocks as $stock)
                <tr class="bg-white border-b hover:bg-gray-50">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ \Carbon\Carbon::parse($stock->date)->translatedFormat('d F Y') }}
                  </th>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $stock->material->name }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $stock->quantity_in }}
                  </td>
                  <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $stock->quantity_out }}
                  </td>
                  <td class="px-6 py-4">
                    <a href="{{ route('inventory.stock.edit', $stock->id) }}" class="no-underline">
                      <button type="button"
                        class="inline-flex items-center text-center p-2 font-medium leading-4 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                    <form action="{{ route('inventory.stock.destroy', $stock->id) }}" method="POST"
                      class="inline-flex">
                      @csrf
                      @method('DELETE')
                      <button type="submit" data-toggle="tooltip" title='Delete'
                        class="show_confirm inline-flex items-center text-center p-2 font-medium leading-4 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
      const form = $(this).closest("form");
      const name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Apakah Anda yakin ingin menghapus data ini?`,
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>
</x-app-layout>
