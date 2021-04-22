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
                    <div class=" my-2">
                        <form method="POST" action="/admin/{{ $slug->slug }}/updated">
                            @csrf
                            @method("PATCH")
                            <span class="text-lg font-advent text-2xl">Title:</span>
                            <x-input class="px-4 mb-5 py-1 w-full" name="title" value="{{ old('Title', $slug->title) }}"></x-input>
                            <span class="text-lg font-advent text-2xl">Custom URL :</span>
                            <x-input class="px-4 mb-5 py-1 w-full" name="slug" value="{{ old('Slug', $slug->slug) }}"></x-input>
                            <span class="text-lg font-advent text-2xl">Description :</span>
                            <x-input class="px-4 mb-5 py-1 w-full" placeholder="Description (max characters: 100)" name="description" value="{{ old('Description', $slug->description) }}"></x-input>
                            <span class="text-lg font-advent text-2xl">Content :</span>
                            <textarea class="resize mb-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Content" name="content" rows="15">{{ old('Content', $slug->content) }}</textarea>
                            <x-buttonupdate>
                                {{ "UPDATE" }}
                            </x-buttonupdate>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link image code',
            menubar: 'false',
            toolbar: 'undo redo | styleselect | forecolor | bold underline italic | fontselect | fontsizeselect | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
            force_br_newlines : true,
            force_p_newlines : false,
        });
      </script>
</x-app-layout>