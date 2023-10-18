<x-navbar>
  <x-navbar-link href="" :active="request()->routeIs('contoh')">
      contoh
  </x-navbar-link> 
  <x-navbar-link href="" :active="request()->routeIs('dashboard')">
      Dashboard
  </x-navbar-link>    
</x-navbar>