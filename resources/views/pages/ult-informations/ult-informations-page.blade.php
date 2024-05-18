@extends('components.layouts.multiple')

@section('content')
    <section class="px-5 py-10 flex flex-col gap-10">
        <h1 class="font-bold text-2xl">ULT Informations</h1>

        <div>
            <livewire:carousel.carousel-table />
            <livewire:forms.about-form />
        </div>
    </section>
@endsection
