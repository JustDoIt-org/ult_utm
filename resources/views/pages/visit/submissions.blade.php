@extends('components.layouts.multiple')

@section('content')
    @if (Auth::check())
        <livewire:visit.pengajuan-kunjungan-user-table />
    @else
        <livewire:visit.pengajuan-kunjungan-langsung-form />
    @endif
@endsection
