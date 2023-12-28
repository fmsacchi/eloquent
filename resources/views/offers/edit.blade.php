<x-app-layout>
    <div class="grid place-content-center py-8">
            <h1 class="text-center font-bold">Update Offer</h1>
            <form action="{{ route('offers.update',$offer->id) }}" method="post" class="max-w-sm mx-auto"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- title --}}
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span
                            class="text-red-600">*</span> </label>
                    <input type="text" id="title" name="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title" required value="{{ old('title', $offer->title) }}">
                    @error('title')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- price --}}
                <div class="mb-5">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price <span
                            class="text-red-600">*</span> </label>
                    <input type="number" id="price" name="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Price" required value="{{ old('price', $offer->price) }}">
                    @error('price')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- category --}}
                <div class="mb-5">
                    <label for="categories"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category <span
                            class="text-red-600">*</span> </label>
                    <select id="categories" name="categories[]" multiple
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select categories...</option>
                        @foreach ($categories as $category)
                        <option {{ in_array($category->id,old('categories', $offer->categories->pluck('id')->toArray())) ? 'selected' : ''}}
                            value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach

                    </select>
                    @error('categories')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- location --}}
                <div class="mb-5">
                    <label for="locations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                        <span class="text-red-600">*</span> </label>
                    <select id="locations" name="locations[]" multiple
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select locations...</option>
                        @foreach ($locations as $location)
                        <option {{ in_array($location->id,old('locations', $offer->locations->pluck('id')->toArray())) ? 'selected' : ''}}
                            value="{{ $location->id }}">
                            {{ $location->title }}</option>
                        @endforeach
                    </select>
                    @error('locations')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- image --}}
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="image">Image</label>
                    <div class="flex items-center justify-center p-4">
                        <img class="w-64 h-48 object-cover rounded-3xl"
                            src="{{ asset($offer->image_url) }}" alt="" id="image_upload">
                    </div>
                    <input name="image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="image" type="file">
                    @error('image')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- description --}}
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span
                            class="text-red-600">*</span> </label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description" required>{{ old('description', $offer->description) }}</textarea>
                    @error('description')
                    <p class="text-red-700 p-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- button --}}
                <div class="mb-5 flex justify-center">
                    <a href="{{ auth()->user()->isAdmin() ? route('offers.index') : route('offers.my') }}"
                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel
                    </a>
                    <button type="submit"
                        class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-green-500 rounded-lg border border-gray-200 hover:bg-green-700 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Update
                    </button>
                </div>
            </form>
    </div>
    @include('layouts.scripts.image_upload')
    <script>
        var settings = {
            plugins: ['remove_button'],
            maxItems: 5,
            onItemAdd:function(){
                this.setTextboxValue('');
            }
        };
        new TomSelect('#categories',settings);
        new TomSelect('#locations',settings);
    </script>
</x-app-layout>
