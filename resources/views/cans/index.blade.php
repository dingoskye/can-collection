<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Cans') }}
        </h1>
    </x-slot>
    {{--    @dd($cans)--}}
<x-slot>
    <section class="grid grid-cols-3 gap-5">
        @foreach($cans as $can)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Name: {{$can->name}}</h2>
                <p>Description: {{ $can->description }}</p>
                <a class="hover:text-nav" href="{{ route('cans.show', $can->id) }}">Details</a>
                <form action="{{ route('collection.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="can_id" value="{{ $can->id }}">
                    <button type="submit" class="bg-green-800 text-violet-300 px-3 py-1 rounded">Add to collection</button>
                </form>
            </div>
        @endforeach
    </section>
    <br>
    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
       href="{{ route('cans.create') }}">Add a new can</a>

</x-slot>
</x-app-layout>
