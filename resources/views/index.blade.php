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
        
                        @auth
                            <!-- Admin Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Admin Dashboard') }}
                                </x-nav-link>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>  
        {{-- nav bar end --}}

        {{-- post content start --}}
        <div class="rounded-md bg-white max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 my-10">
            
            @foreach ($posts as $post)
                <div class="sm:mt-12 block">
                    <div class="py-7">
                        <span class="text-3xl font-semibold block text-center"><a href="/p/{{ $post->slug }}">{{ $post->title }}</a></span>
                        <div class="flex flex-row justify-center text-sm sm:text-md">
                            <div>
                                <p class="text-md font-semibold text-gray-400 block text-center mt-2">majksec.dev</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-400 block text-center mt-2 mx-2">/</span>
                            </div>
                            <div>
                                @if ($comment->where('postid', $post->id)->count() != 0)
                                    <span class="font-semibold text-gray-400 block text-center mt-2">Comments {{ $comment->where('postid', $post->id)->count() }}</span>
                                @else
                                    <span class="font-semibold text-gray-400 block text-center mt-2">No comments yet!</span>
                                @endif
                            </div>
                            <div>
                                <span class="font-semibold text-gray-400 block text-center mt-2 mx-2">/</span>
                            </div>
                            <div>
                                <span class="text-gray-400 block text-center mt-2">{{ date('d/m/Y', strtotime($post->created_at)) }}</span>
                            </div>
                        </div>
                    </div>
                    <hr class="md:mx-36 h-1 bg-gray-500 opacity-50">
                </div>
                <div class="mt-6 sm:mx-32">
                    <p class="text-xl text-center block">{{ substr(strip_tags($post->content, '<'), 0, 400).' [...]' }}</p>
                </div>
                <div class="flex justify-center">
                    <a href="/p/{{ $post->slug }}"><button class="bg-gray-700 px-3 py-1 text-white rounded font-semibold mt-8 mb-5">Read More..</button></a>
                </div>
                <hr class="mt-4">
            @endforeach

        <footer>
            
        </footer>
    </body>
</html>