<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('You create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 float mb-4">
                    <span class="float-left">
                        {{ __("Create post") }}
                    </span>
                    <span class="float-right">
                        <a href="{{ route('admin.posts.index') }}"
                           class="text-white bg-blue-700 p-2 rounded text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" style="display: unset" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                        </svg> {{ __('Back') }}
                    </a>
                    </span>
                </div>
                <hr>
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.posts.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <x-input-label for="title" class="form-label">{{ __('Title') }}</x-input-label>
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                          value="{{ old('name') }}" required/>
                            @error('title')
                            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <x-textarea class="block mt-1 w-full" id="body" name="body"
                                        placeholder="Treść wpisu">{{ old('body') }}</x-textarea>
                            @error('body')
                            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="block mt-4">
                            <label for="active" class="inline-flex items-center">
                                <input id="active" type="checkbox"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                       name="active">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
                            </label>
                        </div>

                        <x-primary-button class="mt-4">
                            {{ __('Add') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
