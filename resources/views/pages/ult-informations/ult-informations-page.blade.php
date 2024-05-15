@extends('components.layouts.multiple')

@section('content')
    @can ("ult-informations edit")
        <section class="px-5 py-10 flex flex-col gap-10">
            <h1 class="font-bold text-2xl">ULT Informations</h1>

            <div>
                <h2 class="font-semibold text-xl">Carousel</h2>
                <livewire:forms.carousel-form />
            </div>

            <div>
                <h2 class="font-semibold text-xl">About</h2>
                <livewire:forms.about-form />
            </div>

        </section>
    @else
        <section class="flex justify-center items-center">
            <h1 class="font-bold text-2xl">Cannot Access</h1>
        </section>
    @endcan
@endsection
