<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($posts as $post)
                        <div class="mx-16 my-10 pt-10 pb-5 border-2 rounded-xl shadow-xl border-gray-300">
                            <div class="text-center text-2xl">
                                <p class="mb-4">{{ $post->title }}</p>
                                <hr>
                            </div>
                            <div class="flex justify-center my-10 text-lg mx-16">
                                <p>{{ $post->content }}</p>
                            </div>
                            <div class="flex flex-row justify-end mx-5 pt-5">
                                <div class="flex flex-row mx-1">
                                    <a href="/admin/{{ $post->slug }}/edit">
                                        <x-buttonedit class="px-5">
                                            {{ __('EDIT') }}
                                            <svg class="ml-2" viewBox="0 0 32 32" width="15px" height="15px">
                                                <path fill="#ffffff" d="M27 0c2.761 0 5 2.239 5 5 0 1.126-0.372 2.164-1 3l-2 2-7-7 2-2c0.836-0.628 1.874-1 3-1zM2 23l-2 9 9-2 18.5-18.5-7-7-18.5 18.5zM22.362 11.362l-14 14-1.724-1.724 14-14 1.724 1.724z"></path>
                                            </svg>
                                        </x-buttonedit>
                                    </a>
                                </div>
                                <div class="mx-1">
                                    <a href="/admin/{{ $post->slug }}/delete">
                                        <x-buttondelete class="px-5">
                                            {{ __('DELETE') }}
                                            <svg class="ml-2" viewBox="0 0 32 32" width="15px" height="15px">
                                                <path fill="#ffffff" d="M4 10v20c0 1.1 0.9 2 2 2h18c1.1 0 2-0.9 2-2v-20h-22zM10 28h-2v-14h2v14zM14 28h-2v-14h2v14zM18 28h-2v-14h2v14zM22 28h-2v-14h2v14z"></path>
                                                <path fill="#ffffff" d="M26.5 4h-6.5v-2.5c0-0.825-0.675-1.5-1.5-1.5h-7c-0.825 0-1.5 0.675-1.5 1.5v2.5h-6.5c-0.825 0-1.5 0.675-1.5 1.5v2.5h26v-2.5c0-0.825-0.675-1.5-1.5-1.5zM18 4h-6v-1.975h6v1.975z"></path>
                                            </svg>
                                        </x-buttondelete>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
