<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ULT | Universitas Trunojoyo Madura</title>
  {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script src="https://kit.fontawesome.com/8eec8f5ed5.js" crossorigin="anonymous"></script>
  {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}
  <livewire:styles />
</head>


<body class="max-w-full overflow-x-hidden">
  <x-layouts.partials.navbar.navbar :$items />
  {{ $slot }}

  <x-layouts.partials.footer.footer-ult :$items />

  <livewire:scripts />
</body>

</html>