<x-app-layout>
    <x-slot name="header" class="flex">
        <h1 class="text-xl font-bold text-center">Moderator {{ Auth::user()->name }}</h1>
    </x-slot>

    <x-slot>
        <div class="text-center p-2 flex">
            <div class="flex-1 place-content-center">
                <h2 class="text-xl font-bold">Moderating Dashboard</h2>
            </div>
        </div>

        <div class="w-full text-center flex gap-2 place-content-center">
            <a class=" border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.users') }}">Users</a>
            <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.brands') }}">Brands</a>
            <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.cans') }}">Cans</a>
            <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
               href="{{ route('admin.reviews') }}">Reviews</a>
        </div>
    </x-slot>
</x-app-layout>
