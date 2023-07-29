<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">

                    <dl class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">First Name</dt>
                            <dd class="mt-1">{{ $employee->firstname }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Last Name</dt>
                            <dd class="mt-1">{{ $employee->lastname }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Email</dt>
                            <dd class="mt-1">{{ $employee->email }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Phone</dt>
                            <dd class="mt-1">{{ $employee->phone }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Address</dt>
                            <dd class="mt-1">{{ $employee->address }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Gender</dt>
                            <dd class="mt-1">{{ ucfirst($employee->gender) }}</dd>
                        </div>
                    </dl>
                    <a href="{{ route('employees.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Back</a>
                
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


