<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Update can information') }}
        </h1>
        <h2 class="text-xl font-bold">
            {{ $can->name }}
        </h2>
    </x-slot>
    <x-slot>
        <form action="{{route('collection.update', $can->id)}}" method="post">
            @csrf

            <div>
                <label for="condition">Condition</label>
                <select id="condition" name="condition" required>
                    <option value="" >-- Choose condition --</option>
                    <option value="mint" {{ old('condition') }}>Mint</option>
                    <option value="near mint" {{ old('condition') }}>Near Mint</option>
                    <option value="excellent" {{ old('condition') }}>Excellent</option>
                    <option value="very good" {{ old('condition') }}>Very Good</option>
                    <option value="good" {{ old('condition') }}>Good</option>
                    <option value="fair" {{ old('condition') }}>Fair</option>
                    <option value="poor" {{ old('condition') }}>Poor</option>
                <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                </select>
            </div>
            <div>
                <label for="date_acquired">Date acquired</label>
                <input type="date" value="{{old('date_acquired') }}" name="date_acquired" id="date_acquired" required/>
                <x-input-error :messages="$errors->get('date_acquired')" class="mt-2" />
            </div>
            <div>
                <label for="content">Notes</label>
                <textarea name="notes" id="notes">{{old('notes')}}</textarea>
                <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>
            <input type="submit" name="submit" value="Update"/>
        </form>
    </x-slot>
</x-app-layout>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h1 class="text-xl font-bold">--}}
{{--            {{ __('Update can information') }}--}}
{{--        </h1>--}}
{{--        <h2 class="text-xl font-bold">--}}
{{--            {{ $can->name }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}
{{--    <x-slot>--}}
{{--        <form action="{{route('cans.update', $can->id)}}" method="post">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <label for="condition">Condition</label>--}}
{{--                <select id="condition" name="condition" required>--}}
{{--                    <option value="" >-- Choose condition --</option>--}}
{{--                    <option value="mint" {{ old('condition', $can->pivot->condition) == 'mint' ? 'selected' : '' }}>Mint</option>--}}
{{--                    <option value="near mint" {{ old('condition', $can->pivot->condition) == 'near mint' ? 'selected' : '' }}>Near Mint</option>--}}
{{--                    <option value="excellent" {{ old('condition', $can->pivot->condition) == 'excellent' ? 'selected' : '' }}>Excellent</option>--}}
{{--                    <option value="very good" {{ old('condition', $can->pivot->condition) == 'very good' ? 'selected' : '' }}>Very Good</option>--}}
{{--                    <option value="good" {{ old('condition', $can->pivot->condition) == 'good' ? 'selected' : '' }}>Good</option>--}}
{{--                    <option value="fair" {{ old('condition', $can->pivot->condition) == 'fair' ? 'selected' : '' }}>Fair</option>--}}
{{--                    <option value="poor" {{ old('condition', $can->pivot->condition) == 'poor' ? 'selected' : '' }}>Poor</option>--}}
{{--                    <x-input-error :messages="$errors->get('condition')" class="mt-2" />--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="date_acquired">Date acquired</label>--}}
{{--                <input type="text" value="{{old('date_acquired', $can->pivot->date_acquired)}}" name="date_acquired" id="date_acquired" required/>--}}
{{--                <x-input-error :messages="$errors->get('date_acquired')" class="mt-2" />--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="content">Notes</label>--}}
{{--                <textarea name="notes" id="notes">{{old('notes',$can->pivot->notes)}}</textarea>--}}
{{--                <x-input-error :messages="$errors->get('notes')" class="mt-2" />--}}
{{--            </div>--}}
{{--            <input type="submit" name="submit" value="Update"/>--}}
{{--        </form>--}}
{{--    </x-slot>--}}
{{--</x-app-layout>--}}
