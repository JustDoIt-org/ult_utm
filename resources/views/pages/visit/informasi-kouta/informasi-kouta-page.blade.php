@extends('components.layouts.multiple')

@section('content')
    <section class="py-10 flex flex-col gap-10">
        <h1 class="font-bold text-2xl">Informasi Kouta</h1>

        <div>
            <livewire:visit.informasi-kouta-table/>
        </div>
    </section>
@endsection
