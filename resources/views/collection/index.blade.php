<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Your Collection') }}
        </h1>
    </x-slot>
    {{--    @dd($can_user)--}}
    <x-slot>
        <section class="grid grid-cols-3 gap-5">
            @foreach($brands as $brand)
                <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                    <h2 class="text-lg text-center">Name: {{$can->name}}</h2>
                    <p>Description: {{ $brand->description }}</p>
                    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
                       href="{{ route('brands.details', $can_user->id) }}">Details</a>
                    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
                       href="{{ route('collection.') }}">Add a new brand</a>
                </div>
            @endforeach
        </section>
    </x-slot>
</x-app-layout>
