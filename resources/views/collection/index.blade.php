<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Your Collection') }}
        </h1>
    </x-slot>
{{--        @dd($can_user)--}}
    <x-slot>
        <section class="grid grid-cols-3 gap-5">
            @foreach (Auth::user()->cans as $can)
                <div class="flex-1 py-2 px-4 bg-review border-4 border-solid border-reviewborder rounded-2xl">
                    <h2>{{ $can->name }}</h2>
{{--                    <p>Date required: {{ $can->pivot->date_acquired }}</p>--}}
{{--                    <p>Condition: {{ $can->pivot->condition }}</p>--}}
{{--                    <p>Notes: {{ $can->pivot->notes }}</p>--}}
{{--                    <div>--}}
{{--                        <a class="border-4 border-reviewborder bg-reviewborder hover:bg-review px-4 py-2 rounded-md"--}}
{{--                           href="{{ route('collection.edit', $can->id) }}">Edit collected piece</a>--}}
{{--                    </div>--}}
                    <div>
                            <form action="{{ route('collection.remove', $can->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                    </div>
                </div>
            @endforeach
        </section>
    </x-slot>
</x-app-layout>
