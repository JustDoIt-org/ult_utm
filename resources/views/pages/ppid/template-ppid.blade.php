@extends('components.layouts.multiple')

@section('content')
  <x-section.ppid.container :$title>
    @switch($page)
      @case('survey')
        <livewire:ppid.survey-form :$hasil />
      @break

      @case('keberatan')
        <livewire:ppid.keberatan-form />
      @break

      @default
    @endswitch
  </x-section.ppid.container>
@endsection
