<x-app-layout>
    <x-slot name="header" class="flex">
        <h1 class="text-xl font-bold text-center">Can overview</h1>
    </x-slot>

    <x-slot>
        <table class="w-full table-auto border-collapse border border-gray-400">
            <tr class="text-center font-bold">
                <td>Id</td>
                <td>Brand</td>
                <td class="px-2 py-1">Name</td>
                <td class="px-2 py-1">Release year</td>
                <td class="px-2 py-1">Limited edition</td>
                <td class="px-2 py-1">Country</td>
                <td class="px-2 py-1">SKU</td>
                <td class="px-2 py-1">GTIN</td>
            </tr>
            @foreach($cans as $can)
                <tr class="text-center">
                    <td class="px-2 py-1">{{ $can->id }}</td>
                    <td class="px-2 py-1">{{ $can->name }}</td>
                    <td class="px-2 py-1">{{ $can->brand->name }}</td>
                    <td class="px-2 py-1">{{ $can->release_year  }}</td>
                    <td class="px-2 py-1">{{ ucfirst($can->limited_edition ? 'Yes' : 'No')}}</td>
                    <td class="px-2 py-1">{{ $can->country }}</td>
                    <td class="px-2 py-1">{{ $can->sku }}</td>
                    <td class="px-2 py-1">{{ $can->gtin }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
