@props([
  "active",
  "id",
])

<x-nav-link
  class="cursor-pointer"
  :active="request()->routeIs($active)"
  id="dropdownNavbarLink"
  data-dropdown-toggle="{{ $id }}"
>
  {{ $trigger }}
  <svg
    class="ms-2.5 h-2.5 w-2.5"
    aria-hidden="true"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 10 6"
  >
    <path
      stroke="currentColor"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="m1 1 4 4 4-4"
    />
  </svg>
</x-nav-link>
<!-- Dropdown menu -->
<div
  id="{{ $id }}"
  class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white font-normal shadow"
>
  <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
    {{ $content }}
  </ul>
</div>
