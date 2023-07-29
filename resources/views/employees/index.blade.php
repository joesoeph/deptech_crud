<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container p-6">
                    <a href="{{ route('employees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Employee</a>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 rounded mt-3 p-2">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="w-full mt-8">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4">{{ __('First Name') }}</th>
                                <th class="py-2 px-4">{{ __('Last Name') }}</th>
                                <th class="py-2 px-4">{{ __('Email') }}</th>
                                <th class="py-2 px-4">{{ __('Phone') }}</th>
                                <th class="py-2 px-4">{{ __('Address') }}</th>
                                <th class="py-2 px-4">{{ __('Gender') }}</th>
                                <th class="py-2 px-4">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                                    <td class="py-2 px-4">{{ $employee->firstname }}</td>
                                    <td class="py-2 px-4">{{ $employee->lastname }}</td>
                                    <td class="py-2 px-4">{{ $employee->email }}</td>
                                    <td class="py-2 px-4">{{ $employee->phone }}</td>
                                    <td class="py-2 px-4">{{ $employee->address }}</td>
                                    <td class="py-2 px-4">{{ ucfirst($employee->gender) }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('employees.show', $employee->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Show</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-2 px-4 text-center">{{ __('No employees are found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
