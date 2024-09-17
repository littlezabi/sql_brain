<x-admin_layout>
    <x-slot:pageTitle>
        Register
    </x-slot:pageTitle>
    <div class="   p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Create an Account</h2>
        <form action="/admin/user/new" method="POST" class="space-y-6">
            @csrf

            <!-- Full Name -->
            <div>
                <x-form-lable for="fullname">
                    Enter fullname
                </x-form-lable>
                <x-form-input type="text" id="fullname" name="fullname" placeholder="Enter your fullname..." required />
                <x-form-error name="title" />
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 mt-1 bg-gray-900 border border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2"
                    placeholder="Enter email address here..." required>
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 mt-1 bg-gray-900 border border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2"
                    placeholder="Enter your password..." required>
            </div>
            <!-- Confirm Password -->
            <div>
                <label for="repassword" class="block text-sm font-medium text-gray-300">Confirm Password</label>
                <input type="password" id="repassword" name="repassword" placeholder="Re-type password..."
                    class="w-full px-4 py-2 mt-1 bg-gray-900 border border-gray-600 rounded-md text-gray-300 focus:ring-indigo-500 focus:border-indigo-500 focus:outline-none focus:ring-2"
                    required>
            </div>
            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    Register
                </button>
            </div>
        </form>
        <p class="mt-6 text-center text-sm text-gray-400">
            Already have an account? <a href="/admin/login"
                class="text-indigo-500 hover:text-indigo-400 font-medium">Sign
                In</a>
        </p>
    </div>

</x-admin_layout>
