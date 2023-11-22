<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Lecturer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- form lecturer -->
                    
                    <form method="post" action="{{ route('lecturer.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="nidn" :value="__('NIDN')" />
                            <x-text-input id="nidn" name="nidn" type="text" class="mt-1 block w-1/2" :value="old('nidn')" autofocus autocomplete="nidn" />
                            <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
                        </div>
                        <div>
                            <x-input-label for="nama" :value="__('NAMA')" />
                            <x-text-input id="nama" name="name" type="text" class="mt-1 block w-1/2" :value="old('name')" required autofocus autocomplete="nama" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div>
                            <x-input-label for="department" :value="__('PROGRAM STUDI')" />
                            <x-select-input id="department" name="department_id" class="mt-1 block w-1/2" required>
                                @foreach($departments as $key => $value)
                                    <option value="{{ $key }}" @if(Request::old('department_id') == $key) selected="selected" @endif>{{ $value }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error class="mt-2" :messages="$errors->get('department_id')" />
                        </div>
                        <input type="hidden" name="status" value="1"/>
                        <x-primary-button>SUBMIT</x-primary-button>
                    </form>
                    <!-- end of form lecturer -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
