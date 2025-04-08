<x-base-layout>
    <main class="container mx-auto my-12 px-4 sm:px-6 lg:px-12">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg space-y-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <h2 class="text-3xl font-bold text-gray-800">✏️ Edit {{ $user->firstname }}</h2>
                <a href="{{ route('users.index') }}"
                   class="bg-indigo-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center gap-2">
                   <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>

            <!-- Error Section -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>⚠️ {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Section -->
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-indigo-50 p-6 rounded-xl shadow-inner space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1">Firstname</label>
                            <input type="text" name="firstname" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('firstname', $user->firstname) }}" required>
                        </div>

                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Lastname</label>
                            <input type="text" name="lastname" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('lastname', $user->lastname) }}" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <div>
                            <label for="phonenumber" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="text" name="phonenumber" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('phonenumber', $user->phonenumber) }}" required>
                        </div>

                        <div>
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" name="date_of_birth" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('date_of_birth', isset($user->date_of_birth) ? date('Y-m-d', strtotime($user->date_of_birth)) : '') }}" required>
                        </div>

                        <div>
                            <label for="skill_level" class="block text-sm font-medium text-gray-700 mb-1">Skill Level</label>
                            <input type="number" name="skill_level" min="1" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('skill_level', $user->skill_level) }}" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="street" class="block text-sm font-medium text-gray-700 mb-1">Street</label>
                            <input type="text" name="street" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('street', $user->street) }}" required>
                        </div>

                        <div>
                            <label for="housenumber" class="block text-sm font-medium text-gray-700 mb-1">House Number</label>
                            <input type="text" name="housenumber" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('housenumber', $user->housenumber) }}" required>
                        </div>

                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                            <input type="text" name="postal_code" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('postal_code', $user->postal_code) }}" required>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" name="city" class="w-full p-3 border border-gray-300 rounded-lg text-black" value="{{ old('city', $user->city) }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                        <select name="role" class="w-full p-3 border border-gray-300 rounded-lg text-black">
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            <option value="coach" {{ old('role', $user->role) == 'coach' ? 'selected' : '' }}>Coach</option>
                        </select>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg text-black">
                        <small class="text-gray-500">Leave blank if you don't want to change the password.</small>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center justify-center gap-2">
                    <i class="fas fa-user-edit"></i> Update User
                </button>
            </form>
        </div>
    </main>
</x-base-layout>
