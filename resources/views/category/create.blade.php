<x-layout>
    <!-- Responsive Form Container -->
    <div class="container max-w-3xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-100 rounded-lg shadow-md p-6 sm:p-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                <h3 class="text-2xl sm:text-3xl text-indigo-500 font-semibold mb-4 sm:mb-0">Add New Task</h3>
                <a 
                    href="{{ route('category.index') }}" 
                    class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-base sm:text-lg"
                >
                    Back
                </a>
            </div>
            
            <!-- Form Section -->
            <form 
                id="categoryForm" 
                action="{{ route('category.store') }}" 
                method="POST" 
                class="space-y-3"
            >
                @csrf

                <!-- Task Name -->
                <div>
                    <label 
                        for="name" 
                        class="block text-gray-700 text-base sm:text-lg font-semibold"
                    >
                        Task Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="What task you want to tackle?" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        aria-label="Task Name"
                        required
                    >
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label 
                        for="description" 
                        class="block text-gray-700 text-base sm:text-lg font-semibold"
                    >
                        Description
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        placeholder="Task description" 
                        rows="3" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        aria-label="Task Description"
                        required
                    ></textarea>
                    @error('description')
                        <p class="text-red-600 text-sm mt-1">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Task Category -->
                <div>
                    <label 
                        for="category" 
                        class="block text-gray-700 text-base sm:text-lg font-semibold"
                    >
                        Task Category
                    </label>
                    <input 
                        type="text" 
                        name="category" 
                        id="category" 
                        placeholder="Label your task (e.g., work, school, personal)" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        aria-label="Task Category"
                        required
                    >
                    @error('category')
                        <p class="text-red-600 text-sm mt-1">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deadline -->
                <div>
                    <label 
                        for="deadline" 
                        class="block text-gray-700 text-base sm:text-lg font-semibold"
                    >
                        Deadline
                    </label>
                    <input 
                        type="date" 
                        name="deadline" 
                        id="deadline" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                        aria-label="Deadline"
                        required
                    >
                    @error('deadline')
                        <p class="text-red-600 text-sm mt-1">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Save Button -->
                <div class="text-center sm:text-right">
                    <button 
                        type="submit" 
                        class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-sm sm:text-lg w-full sm:w-auto"
                    >
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <!-- Form Validation Script -->
      <script>
        const form = document.getElementById('categoryForm');
        const nameInput = document.getElementById('name');
        const descriptionInput = document.getElementById('description');
        const categoryInput = document.getElementById('category');
        const deadlineInput = document.getElementById('deadline');
    
        form.addEventListener('submit', function(event) {
            if (
                nameInput.value.trim() === '' || 
                descriptionInput.value.trim() === '' || 
                categoryInput.value.trim() === '' ||
                deadlineInput.value.trim() === ''
            ) {
                Swal.fire({
                    icon: "error",
                    iconColor: "#802828",
                    title: "Error!",
                    html: "<span style='font-size:22px;'>Please Fill in all Required Fields!</span>",
                    text: ".",
                    confirmButtonText: 'OK'
                });
                event.preventDefault();
            } else {
                Swal.fire({
                    icon: "success",
                    iconColor: "#008000",
                    html: "<span style='font-size:23px;'>Task Saved Successfully!</span>",
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    </script>
</x-layout>
