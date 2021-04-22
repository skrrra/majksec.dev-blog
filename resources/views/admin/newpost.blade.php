<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg xs:w-full">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:mx-36 md:my-10 xs:w-full">
                        <form method="POST">
                            @csrf
                            @method("POST")
                            <x-input class="px-2 py-1 w-full" name="title" placeholder="Title">
    
                            </x-input>
                            <x-input class="px-2 mt-5 py-1 w-full" name="slug" placeholder="Unique post URL (e.g. /test-post)">
                            
                            </x-input>
                            <x-input class="px-2 mt-5 py-1 w-full mb-5" name="description" placeholder="Description (max. characters: 100)">
                            
                            </x-input>
                            {{-- <textarea class="resize my-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Content" name="content" rows="10"></textarea> --}}
                            {{-- <textarea id="editor" class="resize my-10 block mx-auto border-2 border-gray-200 shadow-xl w-full" placeholder="Content" name="content" rows="10"></textarea> --}}
                            <textarea cols="30" rows="10" name="content"></textarea>
                
                            <x-buttonsubmit class="mt-10">
                                {{ __('SUBMIT') }}
                            </x-buttonsubmit>
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
