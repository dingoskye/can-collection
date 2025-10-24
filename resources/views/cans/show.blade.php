<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Can Details') }}
        </h1>
        <h2 class="text-xl font-bold">
            {{ $can->name }}
        </h2>
    </x-slot>
    <x-slot>
        <h2 class="text-xl font-bold">
            {{ $can->name }}
        </h2>
        <p>Brand: {{ $can->brand->name }}</p>
        <p>Content: {{ $can->content }} ml</p>
        <p>Color: {{ $can->color }}</p>
        <p>Release Year: {{ $can->release_year }}</p>
        <p>Sugarfree: {{ ucfirst($can->sugarfree) }}</p>
        <p>Calories: {{ $can->calories }} kcal</p>
        <p>Limited Edition: {{ ucfirst($can->limited_edition) }}</p>
        <p>Description: {{ $can->description }}</p>
        <p>Country: {{ $can->country }}</p>
        <p>Sku: {{ $can->sku }}</p>
        <p>Gtin: {{ $can->gtin }}</p>


        <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
           href="{{ route('cans.edit') }}">Update this cans information</a>
    </x-slot>
</x-app-layout>
