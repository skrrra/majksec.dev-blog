<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mx-36 my-10">
                        <form method="POST" action="">
                            @csrf
                            @method("POST")
                            <x-input class="px-2 py-1 w-full" name="title" placeholder="Title">
    
                            </x-input>
                            <x-input class="px-2 mt-5 py-1 w-full" name="slug" placeholder="Unique post URL (e.g. /test-post)">
                            
                            </x-input>
                            <textarea class="resize-none my-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Description (max characters: 100)" name="description" maxlength="100" rows="3"></textarea>
                            <textarea class="resize my-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Content" name="content" rows="10"></textarea>
                            <x-buttonsubmit class="">
                                {{ __('SUBMIT') }}
                            </x-buttonsubmit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>