<x-app-layout>
    <x-slot name="header" class="flex">
        <h1 class="text-xl font-bold text-center">Review overview</h1>
    </x-slot>

    <x-slot>
            <table class="w-full table-auto border-collapse border border-gray-400">
                <tr class="text-center font-bold">
                    <td class="px-2 py-1">Id</td>
                    <td class="px-2 py-1">User</td>
                    <td class="px-2 py-1">Can</td>
                    <td class="px-2 py-1">Rating Taste</td>
                    <td class="px-2 py-1">Rating Design</td>
                    <td class="px-2 py-1">Comment</td>
                    <td class="px-2 py-1">Unleashed?</td>
                </tr>
                @foreach($reviews as $review)
                    <tr class="text-center">
                        <td class="px-2 py-1">{{ $review->id }}</td>
                        <td class="px-2 py-1">{{ $review->user->name }}</td>
                        <td class="px-2 py-1">{{ $review->can->name  }}</td>
                        <td class="px-2 py-1">{{ $review->rating_taste }}</td>
                        <td class="px-2 py-1">{{ $review->rating_design }}</td>
                        <td class="px-2 py-1">{{ $review->comment }}</td>
                        @if($review->published === 0)
                            <td class="px-2 py-1"><a class="text-red hover:text-nav" href="{{ route('admin.review.toggle', $review->id) }}">Leashed</a></td>
                        @else
                            <td class="px-2 py-1"><a class="text-green hover:text-nav" href="{{ route('admin.review.toggle', $review->id) }}">Unleashed</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
    </x-slot>
</x-app-layout>
