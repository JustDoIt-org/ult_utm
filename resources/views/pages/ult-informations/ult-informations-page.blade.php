@extends('components.layouts.multiple')

@section('content')
    @can ("ult-informations edit")
        <section class="px-5 py-10">
            <h1 class="font-bold text-2xl">ULT Informations</h1>
            <livewire:forms.about-form />
        </section>
    @else
        <section class="flex justify-center items-center">
            <h1 class="font-bold text-2xl">Cannot Access</h1>
        </section>
    @endcan
@endsection
