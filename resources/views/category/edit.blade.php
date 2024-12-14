<x-layout>

    <!-- Responsive Container for Edit Task Form -->
    <div class="container max-w-3xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-md p-6 sm:p-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <h3 class="text-2xl sm:text-3xl text-indigo-500 font-semibold mb-4 sm:mb-0">Edit My Task</h3>
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
                action="{{ route('category.update', $category->id) }}" 
                method="POST" 
                class="space-y-3"
            >
                @csrf
                @method('PATCH')

                <!-- Task Name -->
                <div>
                    <label for="name" class="block text-gray-700 text-base sm:text-lg font-semibold">Task Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ $category->name }}" 
                        placeholder="Task name"
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        aria-label="Task Name"
                        required
                    >
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-gray-700 text-base sm:text-lg font-semibold">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Describe the task"
                    >{!! $category->description !!}</textarea>
                </div>

                <!-- Task Category -->
                <div>
                    <label for="category" class="block text-gray-700 text-base sm:text-lg font-semibold">Task Category</label>
                    <input 
                        type="text" 
                        name="category" 
                        id="category" 
                        value="{{ $category->category }}" 
                        placeholder="Label your task (e.g., work, personal)"
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <!-- Deadline -->
                <div>
                    <label for="deadline" class="block text-gray-700 text-base sm:text-lg font-semibold">Deadline</label>
                    <input 
                        type="date" 
                        name="deadline" 
                        id="deadline" 
                        value="{{ $category->deadline }}" 
                        class="block w-full p-2 text-sm sm:text-base text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                    >
                    @error('deadline')
                        <p class="text-red-600 text-sm mt-1">*{{ $message }}</p>
                    @enderror
                </div>

                <!-- Update Button -->
                <div class="text-center sm:text-right">
                    <button 
                        type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded text-sm sm:text-lg w-full sm:w-auto"
                    >
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Client-Side Form Validation Script -->
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
