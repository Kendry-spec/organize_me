<x-reg_login>
    <!-- Adding margin to separate form from header -->
    <div class="container max-w-3xl mx-auto p-6 sm:p-8 md:p-10">
        <div class="bg-gray-100 rounded-lg shadow-md p-4 sm:p-6 md:p-10">
            <h3 class="text-center text-2xl sm:text-3xl md:text-4xl text-indigo-500 mb-4">Register New Account</h3>
            <form action="{{ route('register.store') }}" method="POST" class="text-base sm:text-lg md:text-xl px-4 sm:px-6 md:px-10">
                @csrf

                <!-- Username -->
                <div class="mb-2">
                    <label 
                        for="username" 
                        class="block text-gray-700 text-lg sm:text-xl font-semibold mb-2"
                    >
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        value="{{ old('username') }}"
                        class="block w-full p-2 sm:p-3 text-base sm:text-lg md:text-lg text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        autofocus autocomplete="given-name">
                    @error('username')
                        <p class="text-red-600 text-sm sm:text-base">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-2">
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
                        autocomplete="off"
                        class="block w-full p-2 sm:p-3 text-base sm:text-lg md:text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                    >
                    @error('email')
                        <p class="text-red-600 text-sm sm:text-base">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-2">
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

                <!-- Confirm Password -->
                <div class="mb-2">
                    <label 
                        for="password_confirmation" 
                        class="block text-gray-700 text-lg sm:text-xl font-semibold mb-2"
                    >
                        Confirm Password
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        class="block w-full p-2 sm:p-3 text-base sm:text-lg md:text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                    >
                </div>

                <!-- Register Button and Login Link -->
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-2">
                    <button 
                        type="submit" 
                        class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-sm sm:text-base md:text-lg"
                    >
                        Register
                    </button>
                    <p class="text-sm sm:text-base md:text-lg text-center sm:text-left">
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
</x-reg_login>
