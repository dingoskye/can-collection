<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Review: {{$review->can->name}}</h2>
    </x-slot>

    <x-slot name="section">
        <div class="flex flex-col justify-between">
            <div class="flex text-center justify-center m-1">
                @for($i = 0; $i < $review->rating_taste; $i++ )
                    <p class="text-5xl mb-2">⭐</p>
                @endfor
            </div>
            <div class="flex text-center justify-center m-1">
                @for($i = 0; $i < $review->rating_design; $i++ )
                    <p class="text-5xl mb-2">⭐</p>
                @endfor
            </div>
            <div>
                <p>{{ $review->comment }}</p>
            </div>
            <div>
                <p>From: {{ $review->user->name }}</p>
                @can('edit-review', $review)
                    <a class="hover:text-nav" href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                @endcan
            </div>
            <div>
                @if(auth()->id() === $review->user_id)
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>
