<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Cans') }}
        </h1>
    </x-slot>
    {{--    @dd($cans)--}}
<x-slot>

    <div class="bg-base-200 shadow rounded-lg my-4">
        <button type="button" id="toggleForm" class="w-full text-left text-lg font-medium px-4 py-3 outline-black bg-gray-200 rounded-lg">
            Personal preferences
        </button>

        <div id="filterForm" class="collapse-content" style="display: none;">
            <form class="flex flex-col" action="" method="get">
                {{--            filters:--}}
                <div class="flex flex-col mr-4 mb-4">
                    <label for="brand_id">Brand</label>
                    <select multiple class="border-4 border-reviewborder bg-reviewborder rounded-md"
                            name="brand_id[]" id="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-4 mb-4">
                    <label for="sugarfree">Limited edition</label>
                    <select multiple class="border-4 border-reviewborder bg-reviewborder rounded-md"
                            name="sugarfree[]" id="sugarfree">
                        <option value="">-- All --</option>
                        <option value="1" {{ request('sugarfree') === '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ request('sugarfree') === '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="flex flex-col mr-4 mb-4">
                    <label for="limited_edition">Limited edition</label>
                    <select multiple class="border-4 border-reviewborder bg-reviewborder rounded-md"
                            name="limited_edition[]" id="limited_edition">
                            <option value="">-- All --</option>
                            <option value="1" {{ request('limited_edition') === '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ request('limited_edition') === '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                {{--            search --}}
                <div>
                    <input id="name" class="block w-full" type="text" name="name" placeholder="Search" value="{{old('name')}}"/>
                </div>

                <div class="text-center">
                    <button class=" px-4 py-3">
                        {{ __('Search') }}
                    </button>
                </div>
                <div>
                    <a href="{{ route('cans.index') }}" class="text-gray-600 px-4 py-2 underline">
                        Reset
                    </a>
                </div>
        </form>
    </div>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </div>
    <section class="grid grid-cols-3 gap-5">
        @foreach($cans as $can)
            <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <h2 class="text-lg text-center">Name: {{$can->name}}</h2>
                <p>Brand: {{ $can->brand->name }}</p>
                <p>Description: {{ $can->description }}</p>
                <a class="hover:text-nav " href="{{ route('cans.show', $can->id) }}">Details</a>
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
