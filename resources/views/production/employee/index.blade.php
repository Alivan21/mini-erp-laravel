<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __("Pegawai") }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div
          class="flex flex-col items-start justify-between gap-2 border-b border-gray-200 bg-white px-4 py-3 sm:px-6 lg:flex-row lg:items-center lg:gap-0"
        >
          <div class="flex flex-col">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Data Pegawai
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
              Daftar Pegawai yang terdaftar
            </p>
          </div>
          <div class="flex items-center">
            <a
              href="{{ route("production.employee.create") }}"
              class="no-underline"
            >
              <button
                type="button"
                class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out hover:bg-indigo-500 focus:border-blue-700 focus:outline-none active:bg-blue-700"
              >
                <i class="fa-solid fa-circle-plus -ml-1 mr-2 text-lg"></i>
                <span>Tambah Pegawai</span>
              </button>
            </a>
          </div>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-left text-sm text-gray-500 rtl:text-right">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700">
              <tr>
                <th scope="col" class="px-6 py-3">Nama Pegawai</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Alamat</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr class="border-b bg-white hover:bg-gray-50">
                  <th
                    scope="row"
                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                  >
                    {{ $employee->name }}
                  </th>
                  <td class="max-w-lg px-6 py-4">
                    <span class="line-clamp-2">
                      {{ $employee->email }}
                    </span>
                  </td>
                  <td
                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                  >
                    {{ $employee->address }}
                  </td>
                  <td
                    class="whitespace-nowrap px-6 py-4 font-medium uppercase text-gray-900"
                  >
                    {{ $employee->role }}
                  </td>
                  <td class="px-6 py-4">
                    <a
                      href="{{ route("production.employee.edit", $employee->id) }}"
                      class="no-underline"
                    >
                      <button
                        type="button"
                        class="focus:shadow-outline-blue inline-flex items-center rounded-md border border-transparent bg-blue-600 p-2 text-center font-medium leading-4 text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:border-blue-700 focus:outline-none active:bg-blue-700"
                      >
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                    <form
                      action="{{ route("production.employee.destroy", $employee->id) }}"
                      method="POST"
                      class="inline-block"
                    >
                      @csrf
                      @method("DELETE")
                      <button
                        type="submit"
                        data-toggle="tooltip"
                        title="Delete"
                        class="show_confirm focus:shadow-outline-red inline-flex items-center rounded-md border border-transparent bg-red-600 p-2 text-center font-medium leading-4 text-white transition duration-150 ease-in-out hover:bg-red-500 focus:border-red-700 focus:outline-none active:bg-red-700"
                      >
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
    $('.show_confirm').click(function (event) {
      const form = $(this).closest('form');
      const name = $(this).data('name');
      event.preventDefault();
      swal({
        title: `Apakah Anda yakin ingin menghapus data ini?`,
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
    });
  </script>
</x-app-layout>
