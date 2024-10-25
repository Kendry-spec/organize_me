<x-layout>

    <!-- Add margin to separate form from header -->
    <div class="container max-w-3xl mx-auto mt-24">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <div class="bg-gray-100 rounded-lg shadow-md p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-4xl text-indigo-500">Add New Task</h3>
                        <a 
                            href="{{ route('category.index') }}" 
                            class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-lg"
                        >
                            Back
                        </a>
                    </div>
                    <div>
                        <form 
                            id="categoryForm" 
                            action="{{ route('category.store') }}" 
                            method="POST" 
                            class="text-lg"
                        >
                            @csrf
                            
                            <!-- Task Name -->
                            <div class="mb-4">
                                <label 
                                    for="name" 
                                    class="block text-gray-700 text-lg font-bold mb-2"
                                >
                                    Task Name
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    placeholder="What task you want to tackle?"
                                    class="block w-full p-2 pl-10 text-lg text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                                >
                                @error('name')
                                    <p class="text-red-600 text-lg">*{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Description -->
                            <div class="mb-4">
                                <label 
                                    for="description" 
                                    class="block text-gray-700 text-lg font-bold mb-2"
                                >
                                    Description
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    placeholder="Task description" 
                                    rows="3" 
                                    class="block w-full p-2 pl-10 text-lg text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                                ></textarea>
                                @error('description')
                                    <p class="text-red-600 text-lg">*{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Task Category -->
                            <div class="mb-4">
                                <label 
                                    for="category" 
                                    class="block text-gray-700 text-lg font-bold mb-2"
                                >
                                    Task Category
                                </label>
                                <input 
                                    type="text" 
                                    name="category" 
                                    id="category"
                                    placeholder="Label your task (e.g., work, school, personal)" 
                                    class="block w-full p-2 pl-10 text-lg text-gray-700 rounded-lg border border-gray-300 focus:ring-orange-500 focus:border-orange-500"
                                >
                                @error('category')
                                    <p class="text-red-600 text-lg">*{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Save Button -->
                            <div class="mb-4">
                                <button 
                                    type="submit" 
                                    class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-lg"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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