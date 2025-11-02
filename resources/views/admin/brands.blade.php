<x-app-layout>
    <x-slot name="header" class="flex">
        <h1 class="text-xl font-bold text-center">Brand overview</h1>
    </x-slot>

    <x-slot>
        <table class="w-full table-auto border-collapse border border-gray-400">
            <tr class="text-center font-bold">
                <td>Id</td>
                <td>Name</td>
                <td class="px-2 py-1">Description</td>
                <td class="px-2 py-1">Year founded</td>
                <td class="px-2 py-1">HQ address</td>
                <td class="px-2 py-1">Founder</td>
            </tr>
            @foreach($brands as $brand)
                <tr class="text-center">
                    <td class="px-2 py-1">{{ $brand->id }}</td>
                    <td class="px-2 py-1">{{ $brand->name }}</td>
                    <td class="px-2 py-1">{{ $brand->description }}</td>
                    <td class="px-2 py-1">{{ $brand->year_founded  }}</td>
                    <td class="px-2 py-1">{{ $brand->headquarters }}</td>
                    <td class="px-2 py-1">{{ $brand->founder }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
