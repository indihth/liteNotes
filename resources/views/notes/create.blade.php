<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">


                <form action="{{ route('notes.store') }}" method="post">
                    {{-- @csrf is used to generate a hidden field with 
                        a csrf token to validate the request is being made 
                        by an authorised user. Prevent outside attacks--}}
                    @csrf

                    {{-- if field doesn't pass validation an error message will show.
                        'field' value is used to display error in the field's component file
                        'value' field used to retain user input after error message from other fields
                        :colon needed to pass in a Blade value--}}
                    <x-text-input type="text" name="title" field="title" :value="@old('title')" placeholder="Title" class="w-full" autocomplete="off"></x-text-input>

                    <x-textarea name="text" rows="10" field="text" :value="@old('text')" placeholder="Start typing here..." class="w-full mt-6"></x-textarea>
  
                    <x-primary-button class="mt-6">Save</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>