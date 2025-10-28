<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Brands') }}
        </h1>
    </x-slot>
{{--    @dd($brands)--}}
<x-slot>
    <section class="grid grid-cols-3 gap-5">
        @foreach($brands as $brand)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Name: {{$brand->name}}</h2>
                <p>Description: {{ $brand->description }}</p>
                <a class="hover:text-nav" href="{{ route('brands.details', $brand->id) }}">Details</a>
            </div>
        @endforeach
    </section>

    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
       href="{{ route('brands.create') }}">Add a new brand</a>
</x-slot>
</x-app-layout>
