<x-admin_layout>
    <x-slot:pageTitle>
        Login
    </x-slot:pageTitle>
    <div class="p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Login to Your Account</h2>
        <form action="/admin/user/login" method="POST" class="space-y-6">
            @csrf
            <!-- Email -->
            <div>
                {{-- <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label> --}}
                <x-form-lable for="email">
                    Email Address
                </x-form-lable>
                <input type="email" id="email" name="email" placeholder="Enter your email address..."
                    class="w-full px-4 py-2 mt-1 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2"
                    required>
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password..."
                    class="w-full px-4 py-2 mt-1 bg-gray-700 border border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2"
                    required>
            </div>
            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Login
                </button>
            </div>
        </form>
        <p class="mt-6 text-center text-sm text-gray-400">
            Don't have an account? <a href="/admin/register"
                class="text-indigo-500 hover:text-indigo-400 font-medium">Sign
                Up</a>
        </p>
    </div>

</x-admin_layout>
