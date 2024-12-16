<x-reg_login>
    <!-- Add margin to separate form from header -->
    <div class="container max-w-3xl mx-auto p-6 sm:p-8 md:p-12">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <div class="bg-gray-100 rounded-lg shadow-md p-6 sm:p-10 md:p-14 lg:mr-16">
                    <h3 class="text-center text-2xl sm:text-3xl md:text-4xl text-indigo-500 mb-6">Login</h3>
                    <form action="{{ route('login.store') }}" method="POST" class="text-base sm:text-lg md:text-xl px-4 sm:px-6 md:px-10">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label 
                                for="email" 
                                class="block text-gray-700 text-lg sm:text-xl font-semibold mb-2"
                            >
                                Email
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email') }}"
                                class="block w-full p-2 sm:p-3 text-base sm:text-lg md:text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                                autofocus autocomplete
                            >
                            @error('email')
                                <p class="text-red-600 text-sm sm:text-base">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <label 
                                for="password" 
                                class="block text-gray-700 text-lg sm:text-xl font-semibold mb-2"
                            >
                                Password
                            </label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="block w-full p-2 sm:p-3 text-base sm:text-lg md:text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                            >
                            @error('password')
                                <p class="text-red-600 text-sm sm:text-base">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-4 flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember" 
                                class="w-4 h-4 sm:w-5 sm:h-5"
                            >
                            <label 
                                for="remember" 
                                class="ml-2 text-gray-700 text-sm sm:text-base md:text-lg"
                            >
                                Remember me
                            </label>
                            @error('fields')
                                <p class="text-red-600 text-sm sm:text-base">*{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Login Button -->
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-4">
                            <button 
                                type="submit" 
                                class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-sm sm:text-base md:text-lg"
                            >
                                Login
                            </button>
                            
                            {{-- Register Link --}}
                            <p class="text-sm sm:text-base md:text-lg text-center sm:text-left">
                                Don't have an account?
                                <a 
                                    href="{{ route('register') }}" 
                                    class="inline-block text-blue-500 hover:text-blue-800 font-semibold"
                                >
                                    Register
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-reg_login>
