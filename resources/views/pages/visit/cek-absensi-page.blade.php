@extends('components.layouts.multiple')

@section('content')
  <livewire:visit.cek-absensi-table />

  <form action="{{ route('visit.send') }}" method="POST">
    @csrf
    <input type="text" name="message" id="message">
    <button type="submit">{{ __('Submit') }}</button>
  </form>
@endsection
