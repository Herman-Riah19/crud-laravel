<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorie') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-[10vw]">
            <form method="post" action="{{ route('categorie.create') }}" class="m-4 p-4 space-y-6 " encType="multipart/form-data">
                @csrf
                
                <div>
                    <x-input-label for="image" :value="__('Avatars')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required autofocus autocomplete="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="slug" :value="__('Slug')" />
                    <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" required autocomplete="slug" />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>