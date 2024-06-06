@extends('components.layouts.multiple')

@section('content')
  @if ($page === 'request')
    <livewire:ppid-admin.request-form />
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
          <livewire:ppid.aspirasi-pengaduan-form />
        @break

        @default
          <livewire:ppid.request-form />
      @endswitch
    </x-section.ppid.container>
  @endif
@endsection
