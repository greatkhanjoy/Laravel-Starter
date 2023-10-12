<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="wrapper">
      <!-- Navigation  -->
        @include('admin.layouts.sidebar')

      <!-- Right Side  -->
      <main>
        <!-- Topbar Start -->
        @include('admin.layouts.topbar')
        <!-- Topbar End  -->

        <!-- Content Start  -->
        <div class="cardBox">
            @include('admin.components.error')
            @include('admin.components.success')
            {{ $slot }}
        </div>
        <!-- Content End  -->
      </main>
    </div>

    <script type="module" src="{{asset('/assets/js/main.js')}}"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
