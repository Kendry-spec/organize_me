<x-reg_login>

    <!-- Add margin to separate form from header -->
    <div class="container max-w-3xl mx-auto mt-24">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <div class="bg-gray-100 rounded-lg shadow-md p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-4xl text-indigo-500">Register a new account</h3>
                    </div>
                    <form action="{{ route('register') }}" method="POST" class="text-xl">
                        @csrf

                        <!-- Username -->
                        <div class="mb-4">
                            <label 
                                for="username" 
                                class="block text-gray-700 text-xl font-bold mb-2"
                            >
                                Username
                            </label>
                            <input 
                                type="text" 
                                name="username" 
                                id="username" 
                                value="{{ old('username') }}"
                                class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                                autofocus>
                            @error('username')
                                <p class="text-red-600 text-lg">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label 
                                for="email" 
                                class="block text-gray-700 text-xl font-bold mb-2"
                            >
                                Email
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                class="block w-full p-2 pl-10 text-lxl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                            >
                            @error('email')
                                <p class="text-red-600 text-lg">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label 
                                for="password" 
                                class="block text-gray-700 text-xl font-bold mb-2"
                            >
                                Password
                            </label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                            >
                            @error('password')
                                <p class="text-red-600 text-lg">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label 
                                for="password_confirmation" 
                                class="block text-gray-700 text-xl font-bold mb-2"
                            >
                                Confirm Password
                            </label>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation" 
                                class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                            >
                        </div>

                        <!-- Register Button and Login Link -->
                        <div class="flex items-center justify-between mb-4">
                            <button 
                                type="submit" 
                                class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-xl"
                            >
                                Register
                            </button>
                            <p class="text-xl">
                                Already have an account?
                                <a 
                                    href="{{ route('login') }}" 
                                    class="inline-block text-blue-500 hover:text-blue-800"
                                >
                                    Login
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-reg_login>
