{{-- filepath: c:\Users\fevek\Herd\project-9-tennis-management\resources\views\users\show.blade.php --}}
<x-base-layout>
    <main class="container mx-auto my-12 px-6 lg:px-12">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg space-y-8">

            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                <h2 class="text-3xl font-bold text-gray-800 text-center sm:text-left">👤 {{ $user->firstname }}'s Details</h2>
                <a href="{{ route('users.index') }}"
                    class="bg-indigo-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-xl shadow-md transition duration-300 transform hover:scale-105 hover:shadow-2xl flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>

            <!-- User Info Section -->
            <div class="bg-indigo-50 p-6 rounded-xl shadow-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">First Name</p>
                            <p class="font-medium text-indigo-600 text-lg">{{ $user->firstname }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Last Name</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->lastname }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phone Number</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->phone_number }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Skill Level</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->skill_level }}</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-gray-500">Date of Birth</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->date_of_birth }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Availability</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->availability }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Street</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->street }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">House Number</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->housenumber }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Postal Code / City</p>
                            <p class="font-medium text-gray-800 text-lg">{{ $user->postal_code }} {{ $user->city }}</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                <a href="{{ route('users.edit', $user->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 rounded-xl shadow-md hover:shadow-xl flex items-center justify-center gap-2 transition duration-300 transform hover:scale-105">
                    <i class="fas fa-pencil-alt"></i> <span>Edit User</span>
                </a>

                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?')" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white px-3 py-3 rounded-xl shadow-md hover:shadow-xl flex items-center justify-center gap-2 transition duration-300 transform hover:scale-105">
                        <i class="fas fa-trash-alt"></i> <span>Delete User</span>
                    </button>
                </form>
            </div>

        </div>
    </main>
</x-base-layout>
