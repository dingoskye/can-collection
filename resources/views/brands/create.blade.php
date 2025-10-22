<x-app-layout>
    <form action="{{route('brands.store')}}" method="post">
        @csrf

        <div>
            <label for="name">Brand name</label>
            <input type="text" value="{{old('name')}}" name="name" id="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" value="{{old('description')}}" name="description" id="description"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        <div>
            <label for="year_founded">Year founded</label>
            <input type="text" value="{{old('year_founded')}}" name="year_founded" id="year_founded"/>
            <x-input-error :messages="$errors->get('year_founded')" class="mt-2" />
        </div>
        <div>
            <label for="headquarters">Headquarters</label>
            <input type="text" value="{{old('headquarters')}}" name="headquarters" id="headquarters"/>
            <x-input-error :messages="$errors->get('headquarters')" class="mt-2" />
        </div>
        <div>
            <label for="founder">Founder</label>
            <input type="text" value="{{old('founder')}}" name="founder" id="founder"/>
            <x-input-error :messages="$errors->get('founder')" class="mt-2" />
        </div>
        <input type="submit" name="submit" value="Create"/>
    </form>
</x-app-layout>
