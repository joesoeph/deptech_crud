<form action="{{ $action }}" method="POST">
    @csrf
    @isset($method)
        @method($method)
    @endisset

    <div class="mb-4">
        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
        <input type="text" name="firstname" id="firstname" class="form-input @error('firstname') border-red-500 @enderror" value="{{ old('firstname', $employee->firstname ?? '') }}" required>
        @error('firstname')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
        <input type="text" name="lastname" id="lastname" class="form-input @error('lastname') border-red-500 @enderror" value="{{ old('lastname', $employee->lastname ?? '') }}" required>
        @error('lastname')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="form-input @error('email') border-red-500 @enderror" value="{{ old('email', $employee->email ?? '') }}" required>
        @error('email')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
        <input type="text" name="phone" id="phone" class="form-input @error('phone') border-red-500 @enderror" value="{{ old('phone', $employee->phone ?? '') }}" required>
        @error('phone')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
        <textarea name="address" id="address" class="form-textarea @error('address') border-red-500 @enderror" required>{{ old('address', $employee->address ?? '') }}</textarea>
        @error('address')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4">
        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
        <select name="gender" id="gender" class="form-select @error('gender') border-red-500 @enderror" required>
            <option value="">-- Select Gender --</option>
            <option value="male" {{ old('gender', $employee->gender ?? '') === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $employee->gender ?? '') === 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender', $employee->gender ?? '') === 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    <a href="{{ route('employees.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">Cancel</a>
</form>
