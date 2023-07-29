<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="mb-4">
        <label for="employee_id" class="block text-gray-700 text-sm font-bold mb-2">Employee</label>
        <select name="employee_id" id="employee_id" class="form-select w-full @error('employee_id') border-red-500 @enderror" required>
            <option value="">-- Select Employee --</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ old('employee_id', $leaveRequest->employee_id ?? '') == $employee->id ? 'selected' : '' }}>
                    {{ $employee->firstname }} {{ $employee->lastname }}
                </option>
            @endforeach
        </select>
        @error('employee_id')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="reason" class="block text-gray-700 text-sm font-bold mb-2">Reason for Leave</label>
        <textarea name="reason" id="reason" class="form-textarea w-full @error('reason') border-red-500 @enderror" required>{{ old('reason', $leaveRequest->reason ?? '') }}</textarea>
        @error('reason')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date</label>
        <input type="date" name="start_date" id="start_date" class="form-input w-full @error('start_date') border-red-500 @enderror" value="{{ old('start_date', $leaveRequest->start_date ?? '') }}" required>
        @error('start_date')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date</label>
        <input type="date" name="end_date" id="end_date" class="form-input w-full @error('end_date') border-red-500 @enderror" value="{{ old('end_date', $leaveRequest->end_date ?? '') }}" required>
        @error('end_date')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    <a href="{{ route('leave-requests.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
</form>
