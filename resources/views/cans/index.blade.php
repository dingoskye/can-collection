<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Brands</h1>
    </x-slot>
    {{--    @dd($cans)--}}

    <section class="grid grid-cols-3 gap-5">
        @foreach($cans as $can)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Name: {{$can->name}}</h2>
                <p>Description: {{ $can->description }}</p>
                <a class="hover:text-nav" href="/can/{{ $can->id }}">Details</a>
            </div>
        @endforeach
    </section>

    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
       href="{{ route('cans.create') }}">Add a new can</a>

</x-app-layout>
