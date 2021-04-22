<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>majksec | welcome</title>
    </head>

    <body class="bg-gray-100">

        {{-- nav bar start --}}
        <nav class="bg-white shadow-lg border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('index') }}">
                                <p class="text-3xl font-bold">majksec.dev</p>
                            </a>
                        </div>
        
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('All Posts') }}
                            </x-nav-link>
                            <x-nav-link :href="route('new')" :active="request()->routeIs('new')">
                                {{ __('Resources') }}
                            </x-nav-link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>  
        {{-- nav bar end --}}

        {{-- post content start --}}
        <div class="rounded-md bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 my-10">
            
            @foreach ($posts as $post)
                <div class="mt-16 block">
                    <div class="py-7">
                        <span class="text-3xl font-semibold block text-center"><a href="/p/{{ $post->slug }}">{{ $post->title }}</a></span>
                        <div class="flex flex-row justify-center">
                            <div class="">
                                <p class="text-md font-semibold text-gray-400 block text-center mt-2">majksec.dev</p>
                            </div>
                            <div class="">
                                <span class="font-semibold text-gray-400 block text-center mt-2 mx-2">/</span>
                            </div>
                            <div class="">
                                @if ($comment->where('postid', $post->id)->count() != 0)
                                    <span class="font-semibold text-gray-400 block text-center mt-2">Comments {{ $comment->where('postid', $post->id)->count() }}</span>
                                @else
                                    <span class="font-semibold text-gray-400 block text-center mt-2">No comments yet!</span>
                                @endif
                            </div>
                            <div class="">
                                <span class="font-semibold text-gray-400 block text-center mt-2 mx-2">/</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="mt-16">
                    <span>{!! $post->description !!}</span>
                </div>
            @endforeach
    </body>
</html>