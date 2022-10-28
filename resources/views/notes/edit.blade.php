<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">


                <form action="{{ route('notes.update', $note) }}" method="post">
                    {{-- Laravel resource controller update uses method PUT/PATCH but HTML can't use either so we 
                    need to spoof it by adding the @method('put') in the form --}}
                    @method('put')

                    {{-- @csrf is used to generate a hidden field with a csrf token to validate the request is being made 
                        by an authorised user. Prevent outside attacks--}}
                    @csrf

                    {{-- if field doesn't pass validation an error message will show.
                        'field' value is used to display error in the field's component file
                        'value' field used to retain user input after error message from other fields
                        :colon needed to pass in a Blade value--}}
                    <x-text-input 
                    type="text" 
                    name="title" 
                    field="title" 
                    {{-- Preserves edits if other field is left blank --}}
                    :value="@old('title', $note->title)" 
                    placeholder="Title" 
                    class="w-full" 
                    autocomplete="off"></x-text-input>

                    <x-textarea 
                    name="text" 
                    rows="10" 
                    field="text" 
                    :value="@old('text', $note->text)"
                    placeholder="Start typing here..." 
                    class="w-full mt-6"></x-textarea>
  
                    <x-primary-button class="mt-6">Save</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>