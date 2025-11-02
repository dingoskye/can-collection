<x-app-layout>
    <x-slot name="header" class="flex">
        <h1 class="text-xl font-bold text-center">User overview</h1>
    </x-slot>

    <x-slot>

        <table class="w-full table-auto border-collapse border border-gray-400">
            <tr class="text-center font-bold">
                <td class="px-2 py-1">Id</td>
                <td class="px-2 py-1">Moderator rights</td>
                <td class="px-2 py-1">Name</td>
                <td class="px-2 py-1">Email</td>
                <td class="px-2 py-1">Reviews</td>
            </tr>
            @foreach($users as $user)
                <tr class="text-center">
                    <td class="px-2 py-1">{{ $user->id }}</td>
                    <td class="px-2 py-1">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td class="px-2 py-1">{{ $user->name }}</td>
                    <td class="px-2 py-1">{{ $user->email }}</td>
                    <td class="px-2 py-1">{{ \App\Models\Review::where('user_id', '=', $user->id)->count() }}</td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>
