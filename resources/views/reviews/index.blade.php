<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Reviews</h1>
    </x-slot>

    <section class="grid grid-cols-3 gap-5 mt-4">
        @foreach($reviews as $review)
            <div class="flex flex-col justify-between flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                <div>
                    <h2 class="text-lg text-center font-bold">{{ $review->can->name }}</h2>
                    <div class="text-center m-1">
                        @for($i = 0; $i < $review->rating_taste; $i++ )
                            <i>⭐</i>
                        @endfor
                    </div>
                    <div class="text-center">
                        <p>From: {{ $review->user->name }}</p>
                    </div>
                </div>
                <div class="text-center">
                    <a class="hover" href="{{ route('reviews.details', $review->id) }}">Details</a>
                </div>
            </div>
        @endforeach
    </section>
    <br>
    <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"
       href="{{ route('reviews.create') }}">New review</a>
</x-app-layout>
