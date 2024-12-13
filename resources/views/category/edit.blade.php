<x-layout>

    <!-- Container for Edit Task Form -->
    <div class="max-w-2xl mx-auto mt-12">
        <div class="bg-white rounded-xl shadow-md">
            <div class="flex justify-between items-center">
                <h3 class="text-3xl text-indigo-500 px-10">Edit My Task</h3>
                <a 
                    href="{{ route('category.index') }}" 
                    class="bg-orange-500 hover:bg-orange-700 text-white mt-3 py-2 px-4 mr-10 rounded text-xl"
                >
                    Back
                </a>
            </div>
            <form 
                id="categoryForm" 
                action="{{ route('category.update', $category->id) }}" 
                method="POST"
                class="text-lg px-10"
                >
                @csrf
                @method('PATCH')
                
                <!-- Task Name -->
                <div class="mb-2">
                    <label 
                        for="name" 
                        class="block text-gray-700 text-lg font-semibold mb-2"
                    >
                        Name
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ $category->name }}" 
                        class="block w-full p-2 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>
                
                <!-- Task Description -->
                <div class="mb-2">
                    <label 
                        for="description" 
                        class="block text-gray-700 text-lg font-semibold mb-2"
                    >
                        Description
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3" 
                        class="block w-full p-2 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >
                        {!! $category->description !!}
                    </textarea>
                </div>

                <!-- Task Category -->
                <div class="mb-2">
                    <label 
                        for="category" 
                        class="block text-gray-700 text-lg font-semibold mb-2"
                    >
                        Task Category
                    </label>
                    <input 
                        type="text" 
                        name="category" 
                        id="category"
                        value="{{ $category->category }}"
                        placeholder="Label your task (e.g., work, school, personal)" 
                        class="block w-full p-2 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                <!-- Deadline -->
                <div class="mb-2">
                    <label 
                        for="deadline" 
                        class="block text-gray-700 text-lg font-semibold mb-2"
                    >
                        Deadline
                    </label>
                    <input 
                        type="date" 
                        name="deadline" 
                        id="deadline" 
                        placeholder="Select deadline" 
                        value="{{ $category->deadline }}"
                        class="block w-full p-2 text-lg text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                    >
                    @error('deadline')
                        <p class="text-red-600 text-lg">*{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Update Button -->
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded text-xl mb-3 mt-2"
                >
                    Update
                </button>
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
        
        form.addEventListener('submit', function(event) {
            if (
                nameInput.value.trim() === '' || 
                descriptionInput.value.trim() === '' || 
                categoryInput.value.trim() === ''
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    html: "<span style='font-size:22px;'>Please Fill in all Required Fields</span>",
                    confirmButtonText: 'OK'
                });
                event.preventDefault();
            } else {
                Swal.fire({
                    icon: "success",
                    iconColor: "#008000",
                    html: "<span style='font-size:24px;'>Changes Saved Successfully!👏</span>",
                    showConfirmButton: false,
                    timer: 2500
                });
            }
        });
    </script>
    
</x-layout>