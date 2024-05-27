@extends('components.layouts.multiple')

@section('content')
    <section class="py-10 px-5 flex flex-col gap-10">
        <h1 class="font-bold text-2xl">Informasi Kouta</h1>

        <livewire:visit.informasi-kouta-table />
    </section>
@endsection
