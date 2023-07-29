<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Leave Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">
                    @include('leave-requests._form', ['action' => route('leave-requests.update', $employee->id), 'method' => 'PUT'])
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

