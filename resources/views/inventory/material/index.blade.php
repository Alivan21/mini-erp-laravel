<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Bahan Baku') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col gap-2 items-start lg:flex-row lg:gap-0 lg:items-center justify-between px-4 py-3 bg-white border-b border-gray-200 sm:px-6">
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Data Bahan Baku
            </h3>
            <p class="max-w-2xl mt-1 text-sm leading-5 text-gray-500">
              Rangkuman data bahan baku yang tersedia
            </p>
          </div>
          <div class="flex items-center">
            <a href="{{ route('inventory.material.create') }}" class="no-underline">
              <button type="button"
                class="inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                <i class="fa-solid fa-circle-plus text-lg mr-2 -ml-1"></i>
                <span>Tambah Bahan baku</span>
              </button>
            </a>
          </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3">
                  Bahan Baku
                </th>
                <th scope="col" class="px-6 py-3">
                  Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($materials as $material)
                <tr class="bg-white border-b hover:bg-gray-50">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $material->name }}
                  </th>
                  <td class="px-6 py-4 max-w-lg">
                    <span class="line-clamp-2">
                      {{ $material->description }}
                    </span>
                  </td>
                  <td class="px-6 py-4">
                    <a href="{{ route('inventory.material.edit', $material->id) }}" class="no-underline">
                      <button type="button"
                        class="inline-flex items-center text-center p-2 font-medium leading-4 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                    <form action="{{ route('inventory.material.destroy', $material->id) }}" method="POST"
                      class="inline-block">
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
          title: `Are you sure you want to delete this record?`,
          text: "If you delete this, it will be gone forever.",
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
