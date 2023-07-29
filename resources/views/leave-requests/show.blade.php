<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leave Request Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">
                    <dl class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-2">
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Employee Name</dt>
                            <dd class="mt-1">{{ $leaveRequest->employee->firstname }} {{ $leaveRequest->employee->lastname }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Reason</dt>
                            <dd class="mt-1">{{ $leaveRequest->reason }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">Start Date</dt>
                            <dd class="mt-1">{{ $leaveRequest->start_date }}</dd>
                        </div>
                        <div class="py-1">
                            <dt class="text-gray-600 font-bold">End Date</dt>
                            <dd class="mt-1">{{ $leaveRequest->end_date }}</dd>
                        </div>
                    </dl>
                    <a href="{{ route('leave-requests.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
