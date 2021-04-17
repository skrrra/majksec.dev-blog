<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-36 my-10">
                        <form method="POST" action="/admin/{{ $slug->slug }}/updated">
                            @csrf
                            @method("PATCH")
                            <span>Title :</span>
                            <x-input class="px-4 mb-5 py-1 w-full" name="title" value="{{ old('Title', $slug->title) }}"></x-input>
                            <span>Custom URL :</span>
                            <x-input class="px-4 mb-5 py-1 w-full" name="slug" value="{{ old('Slug', $slug->slug) }}"></x-input>
                            <span>Description :</span>
                            <textarea class="resize mb-5 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Description (max characters: 100)" name="description" maxlength="100" rows="3">{{ old('Description', $slug->description) }}</textarea>
                            <span>Content :</span>
                            <textarea class="resize mb-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Content" name="content" rows="10">{{ old('Content', $slug->content) }}</textarea>
                            <x-buttonupdate>
                                {{ "UPDATE" }}
                            </x-buttonupdate>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>