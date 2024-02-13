<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Bahan Baku') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <section class="p-6 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
          @foreach ($materials as $material)
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
              <div class="flex flex-row items-center justify-between pb-2 space-y-0">
                <h1 class="font-medium">{{ $material->name }}</h1>
                <i class="fa-solid fa-boxes-stacked text-gray-500"></i>
              </div>
              <div class="my-4">
                <span class="text-2xl font-bold"
                  style="color: {{ $material->color }}">{{ $material->quantity }}</span>
                <span class="float-right">({{ $material->percentageChange }}%)</span>
              </div>
            </div>
          @endforeach
        </section>
      </div>
    </div>
  </div>
</x-app-layout>
