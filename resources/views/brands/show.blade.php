<x-app-layout>
    <x-slot name="header">
{{--            @dd($brand)--}}
        <h1 class="text-xl font-bold">
            {{ __('Brand Details') }}
        </h1>
        <h2 class="text-xl font-bold">
            {{ $brand->name }}
        </h2>
    </x-slot>
    <x-slot>
        <h2 class="text-xl font-bold">
            {{ $brand->name }}
        </h2>
        <p>Description: {{ $brand->description }}</p>
        <p>Year founded: {{ $brand->year_founded }}</p>
        <p>Headquarters: {{ $brand->headquarters }}</p>
        <p>Founder: {{ $brand->founder }}</p>


{{--        <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"--}}
{{--           href="{{ route('cans.update', $cans->id) }}">Update this cans information</a>--}}
    </x-slot>
</x-app-layout>
