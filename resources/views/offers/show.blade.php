<x-app-layout>
    <div class="flex items-center justify-center py-4">
        <a href="#"
            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">Offer Details</h2>
            {{-- image --}}
            <div class="flex items-center justify-center py-4">
                <img class="w-48 h-32 md:w-96 md:h-72 object-cover rounded-3xl" src="{{ asset($offer->image_url) }}" alt="">
            </div>
            {{-- title --}}
           <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Title</label>
                <div class="text-sm">
                    {{ $offer->title }}
                </div>
           </div>
           {{-- price --}}
            <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Price</label>
                <div class="text-sm">
                    {{ $offer->price }}
                </div>
            </div>
            {{-- author --}}
            <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Created By</label>
                <div class="text-sm">
                    {{ $offer->author->name }}
                </div>
            </div>
            {{-- category--}}
            <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Category</label>
                <div class="text-sm">
                   {{ getTitles($offer->categories) }}
                </div>
            </div>
            {{-- location--}}
            <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Location</label>
                <div class="text-sm">
                    {{ getTitles($offer->locations) }}
                </div>
            </div>
            {{-- description --}}
            <div class="flex flex-col py-4">
                <label class="leading-loose text-sm font-bold">Description</label>
                <div class="text-sm">
                    {{ $offer->description }}
                </div>
            </div>
        </a>
    </div>
</x-app-layout>
