<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-[10vw]">
            <form method="post" action="{{ route('post.create') }}" class="m-4 p-4 space-y-6 ">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Categorie')" />
                    <select id="category" class="block mt-1 w-full" type="text" name="category_id" required autocomplete="category">
                        <option value="">Selectionner une categorie</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" class="flex flex-row gap-2 h-20">
                                <p>{{ $category->name }}</p>
                                <img src="{{ asset($category->image)}}" alt="{{ $category->name }}" />
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>


                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-sm sm:rounded-lg">    
                {{-- <h1 class="text-xl font-bold">{{ $data['message'] }} </h1> --}}
                <ul class="grid grid-cols-4 gap-2">
                    @foreach ($posts as $post)
                        <li>
                            <x-card-post class="bg-red" :title="$post->name" :description="$post->description" :category="$post->category?->name" />
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
    </div>
</x-app-layout>
