<div class="topbar">
    <div class="toggle">
      <ion-icon name="menu-outline"></ion-icon>
    </div>
    <div class="search">
      <label>
        <input type="text" placeholder="Search here" />
        <ion-icon name="search"></ion-icon>
      </label>
    </div>
    <div x-data="{ open: false }" class="user relative overflow-visible">
      <button id="user-menu-button" x-on:click="open = ! open" aria-expanded="true" aria-haspopup="true"><img src="{{Auth()->user()->image ? asset(Auth()->user()->image) : asset('assets/img/userphoto.png') }}" alt="{{Auth()->user()->name}}" /></button>
      <div x-show="open" x-on:click.away="open = false" class="absolute right-0 top-10 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
          <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 " role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
          <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 " role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
          <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900 " role="menuitem" tabindex="-1" id="menu-item-2">License</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 hover:text-gray-900 " role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
          </form>
        </div>
      </div>
    </div>
  </div>