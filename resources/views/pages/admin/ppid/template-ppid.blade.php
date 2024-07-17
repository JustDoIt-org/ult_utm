@extends('components.layouts.multiple')

@section('content')
  @if ($page === 'd')
    <livewire:ppid-admin.request.request-form />
  @else
    <x-section.ppid.container :$title>
      @switch($page)
        @case('survey')
          <livewire:ppid.survey-form :$hasil />
        @break

        @case('keberatan')
          <livewire:ppid.keberatan-form />
        @break

        @case('aspirasi_pengaduan')
          <livewire:ppid-admin.aspirasi.aspirasi-form />
        @break

        @default
          <livewire:ppid-admin.request.request-form />
      @endswitch
    </x-section.ppid.container>
  @endif
@endsection
