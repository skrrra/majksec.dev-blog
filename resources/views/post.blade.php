<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>majksec | {{ $posts->slug }}</title>
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
            <div class="mt-16 block">
                <div class="py-10">
                    <span class="text-3xl font-semibold block text-center">{{ $posts->title }}</span>
                </div>
                <hr>
            </div>
            <div class="mt-16">
                <span>{!! $posts->content !!}</span>
            </div>
            <div class="my-10 hover:text-gray-600 transition duration-300">
                <a class="flex flex-row" href="/">
                    <svg class="h-10 w-10" fill="black" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    <div class="flex flex-col justify-center">
                        <p class=""> Go back</p>
                    </div>
                </a>
            </div>

            {{-- comments --}}
            <div class="mx-24">
                <div class="my-10">
                    @if (count($posts->comments) != 0)
                        <p class="text-center text-2xl pb-5">Comments [ {{ count($posts->comments) }} ]</p>
                    @else 
                        <p class="text-center text-2xl pb-5">There are no comments yet! Be first to comment!</p>
                    @endif
                    <hr>
                    <div class="">
                        @foreach ($posts->comments as $comment)
                            <p class="text-2xl text-gray-700 mt-5">{{ $comment->name }}</p>
                            <div class="flex flex-row my-2">
                                <p class="font-semibold text-gray-500 mr-2">{{ date('d/m/Y', strtotime($comment->created_at)) }}</p>
                                <p class="text-gray-700">@ {{ date('H:i', strtotime($comment->created_at)) }}</p>
                            </div>
                            <p class="text-xl text-gray-800">{{ $comment->comment }}</p>

                            @auth
                                <div class="my-3 flex flex-row justify-end">
                                    <a href="/p/{{ $comment->id }}/delete">
                                        <x-buttondelete class="px-5">
                                            {{ __('DELETE') }}
                                            <svg class="ml-2" viewBox="0 0 32 32" width="15px" height="15px">
                                                <path fill="#ffffff" d="M4 10v20c0 1.1 0.9 2 2 2h18c1.1 0 2-0.9 2-2v-20h-22zM10 28h-2v-14h2v14zM14 28h-2v-14h2v14zM18 28h-2v-14h2v14zM22 28h-2v-14h2v14z"></path>
                                                <path fill="#ffffff" d="M26.5 4h-6.5v-2.5c0-0.825-0.675-1.5-1.5-1.5h-7c-0.825 0-1.5 0.675-1.5 1.5v2.5h-6.5c-0.825 0-1.5 0.675-1.5 1.5v2.5h26v-2.5c0-0.825-0.675-1.5-1.5-1.5zM18 4h-6v-1.975h6v1.975z"></path>
                                            </svg>
                                        </x-buttondelete>
                                    </a>
                                </div>
                            @endauth   
                            <hr class="mt-5">
                        @endforeach
                    </div>
                </div>
                <div class="">
                    <p class="text-center text-2xl pb-5">Leave a comment!</p>
                    <div class="mt-4 mx-10">
                        <form method="POST" action="/p/{{$posts->slug}}">
                            @csrf
                            <x-input class="px-2 py-1 w-full my-3 border-gray-400 font-semibold" name="name" placeholder="Your Name"></x-input>
                            <x-input class="px-2 py-1 w-full my-3 border-gray-400 font-semibold" name="email" placeholder="Your Email" type="email"></x-input>
                            <textarea class="w-full my-3 rounded border-2 border-gray-400 focus:border-gray-500 font-semibold" name="comment" rows="3" placeholder="Your comment..."></textarea>
                            <input type="hidden" name="postid" value="{{ $posts->id }}">
                            <button class="bg-gray-800 text-white font-bold py-2 px-7 rounded hover:bg-gray-900" type="submit">Leave comment</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="">
                {{-- <a href="https://www.facebook.com/sharer.php?u=http://localhost:3000/p/windows-vs-linux" rel="me" title="Facebook" target="_blank"><p>asdasd</p></a>
                <a href="https://twitter.com/share?url={{ $url }}&text={{ $title }}" rel="me" title="Twitter" target="_blank"><i class="fa twitter"></i></a>
                <a href="https://pinterest.com/pin/create/button/?url={{ $url }}&media={{ $image }}&description={{ $title }}" rel="me" title="Pinterest" target="_blank"><i class="fa pinterest"></i></a>
                <a href="https://www.thefancy.com/fancyit?ItemURL={{ $url }}&Title={{ $title }}&Category={{ $category }}&ImageURL={{ $image }}" rel="me" title="Fancy" target="_blank"><i class="fa fancy"></i></a>
                <a href="https://plus.google.com/share?url={{ $url }}" rel="me" title="Google Plus" target="_blank"><i class="fa google"></i></a> --}}
            </div>
        </div>
        {{-- post content end --}}
    </body>
</html>