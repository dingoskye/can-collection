<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">
            {{ __('Create a new can') }}
        </h1>
    </x-slot>
    <x-slot>
    <form action="{{route('cans.store')}}" method="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" value="{{old('name')}}" name="name" id="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <label for="brand_id">Brand</label>
            <select id="brand_id" name="brand_id" required>
                <option value="">-- Choose a brand --</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
        </div>
        <div>
            <label for="content">Content</label>
            <input type="number" value="{{old('content')}}" name="content" id="content"/>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <div>
            <label for="color">Color</label>
            <input type="text" value="{{old('color')}}" name="color" id="color"/>
            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>
        <div>
            <label for="release_year">Year released</label>
            <input type="number" value="{{old('release_year')}}" name="release_year" id="release_year"/>
            <x-input-error :messages="$errors->get('release_year')" class="mt-2" />
        </div>
        <div>
            <label for="sugarfree">Sugarfree</label>
            <select id="sugarfree" name="sugarfree">
                <option value="">-- Choose an option --</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
            <x-input-error :messages="$errors->get('sugarfree')" class="mt-2" />
        </div>
        <div>
            <label for="calories">Calories</label>
            <input type="number" value="{{old('calories')}}" name="calories" id="calories"/>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <div>
            <label for="limited_edition">Limited edition</label>
            <select id="limited_edition" name="limited_edition">
                <option value="">-- Choose an option --</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
            <x-input-error :messages="$errors->get('limited_edition')" class="mt-2" />
        </div>
        <div>
            <label for="caffeine">Caffeine</label>
            <input type="number" value="{{old('caffeine')}}" name="caffeine" id="caffeine"/>
            <x-input-error :messages="$errors->get('caffeine')" class="mt-2" />
        </div>
        <div>
            <label for="carbonated">Carbonated</label>
            <select id="carbonated" name="carbonated">
                <option value="">-- Choose an option --</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
            <x-input-error :messages="$errors->get('carbonated')" class="mt-2" />
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" value="{{old('description')}}" name="description" id="description"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <label for="country">Country</label>
            <input type="text" value="{{old('content')}}" name="content" id="content"/>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>
        <div>
            <label for="sku">Sku</label>
            <input type="text" value="{{old('sku')}}" name="sku" id="sku"/>
            <x-input-error :messages="$errors->get('sku')" class="mt-2" />
        </div>
        <div>
            <label for="gtin">Gtin</label>
            <input type="text" value="{{old('gtin')}}" name="gtin" id="gtin"/>
            <x-input-error :messages="$errors->get('gtin')" class="mt-2" />
        </div>
        <input type="submit" name="submit" value="Create"/>
    </form>
    </x-slot>
</x-app-layout>
