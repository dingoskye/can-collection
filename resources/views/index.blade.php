<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold mb-4">Welcome to the Soda Can Review App</h1>
    </x-slot>

    <x-slot>
        <div class="space-y-4">
            <a href="{{ route('brands.index') }}" class="block w-full text-center border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md text-xl font-semibold">
                View Brands
            </a>
            <a href="{{ route('cans.index') }}" class="block w-full text-center border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md text-xl font-semibold">
                View Cans
            </a>
            <a href="{{ route('reviews.index') }}" class="block w-full text-center border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md text-xl font-semibold">
                View Reviews
            </a>
            <a href="{{ route('collection.index') }}" class="block w-full text-center border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md text-xl font-semibold">
                View Your Collection
            </a>
        </div>
    </x-slot>
</x-app-layout>
