<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leave Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">
                    <a href="{{ route('leave-requests.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Leave Requests</a>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 rounded mt-3 p-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="w-full mt-8">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4">{{__('Reason')}}</th>
                                <th class="py-2 px-4">{{__('Start Date')}}</th>
                                <th class="py-2 px-4">{{__('End Date')}}</th>
                                <th class="py-2 px-4">{{__('Actions')}}</th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($leaveRequests as $leaveRequest)
                                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                                    <td class="py-2 px-4">{{ $leaveRequest->reason }}</td>
                                    <td class="py-2 px-4">{{ $leaveRequest->start_date }}</td>
                                    <td class="py-2 px-4">{{ $leaveRequest->end_date }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('leave-requests.show', $leaveRequest->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Show</a>
                                        <a href="{{ route('leave-requests.edit', $leaveRequest->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('leave-requests.destroy', $leaveRequest->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-2 px-4 text-center">No leave requests found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
