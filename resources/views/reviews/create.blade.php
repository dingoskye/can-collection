<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Create a review') }}
        </h1>
    </x-slot>
    <x-slot>
        <form action="{{route('reviews.store')}}" method="post" >
            @csrf

            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
            <div>
                <label for="can_id">Can</label>
                <select id="can_id" name="can_id" required>
                    <option value="">-- Choose a can --</option>
                    @foreach($cans as $can)
                        <option value="{{ $can->id }}">{{ $can->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('can_id')" class="mt-2" />
            </div>
            <div>
                <label for="rating_taste">Rate the taste</label>
                <select id="rating_taste" name="rating_taste" required>
                    <option value="">-- Rate the taste --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <x-input-error :messages="$errors->get('rating_taste')" class="mt-2" />
            </div>
            <div>
                <label for="rating_design">Rate the design</label>
                <select id="rating_design" name="rating_design" required>
                    <option value="">-- Rate the design --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <x-input-error :messages="$errors->get('rating_design')" class="mt-2" />
            </div>
            <div>
                <label for="comment">Tell about your experience</label>
                <input type="text" value="{{old('comment')}}" name="comment" id="comment" required/>
                <x-input-error :messages="$errors->get('comment')" class="mt-2" />
            </div>

            <input type="submit" name="submit" value="Create"/>
        </form>
    </x-slot>
</x-app-layout>
