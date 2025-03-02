@props(['title', 'description', 'category'])

<div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 max-w-sm">

    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $title }}</h2>

    <h4 class="text-lg font-semibold text-black-300">Categories: {{ $category }}</h4>
    <p class="text-gray-600 text-sm mb-4">
        {{ $description }}
    </p>
       
</div>
