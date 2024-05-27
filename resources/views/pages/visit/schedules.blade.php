@extends('components.layouts.multiple')

@section('content')
    <section class="mx-auto p-10 mb-10">

        <div class="xl:flex xl:gap-2 xl:justify-between">

            <section class="bg-white xl:w-[300px] sm:mx-7 xl:ml-9 rounded-lg p-10 mb-5">
                <h1 class="font-bold text-xl mb-5">Hal-hal yang perlu diperhatikan bagi Visitor</h1>
                <ol class="flex flex-col gap-1 justify-center text-sm list-decimal">
                    <li>Pakaian bebas rapi dan bersepatu (tidak memakai kaos oblong).</li>
                    <li>
                        Peserta mengikuti (follow) akun media sosial UB, yaitu:
                        Instagram : @univ.brawijaya,
                        Twitter : @UB_Official, dan
                        Facebook : @Universitas.Brawijaya.Official
                    </li>
                    <li>Keterlambatan lebih dari 20 menit dianggap BATAL.</li>
                    <li>Peserta harap membeli konsumsi (makan) di UB Pemesanan melalui WA 0812-5211-2225.</li>
                </ol>
            </section>

            <livewire:visit.informasi-kouta-table-view />
        </div>

        <x-section.visit.visit-calendar :$information_kouta />
    </section>
@endsection
