<x-layout>

    <!-- Container for Edit Task Form -->
    <div class="container max-w-3xl mx-auto mt-24">
        <div class="grid grid-cols-1 gap-4">
            <div>
                <div class="bg-white rounded-xl shadow-md p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-4xl text-indigo-500">Edit Category</h3>
                        <a 
                            href="{{ route('category.index') }}" 
                            class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-xl"
                        >
                            Back
                        </a>
                    </div>
                    <div>
                        <form 
                            id="categoryForm" 
                            action="{{ route('category.update', $category->id) }}" 
                            method="POST" 
                            class="text-xl"
                        >
                            @csrf
                            @method('PATCH')
                            
                            <!-- Task Name -->
                            <div class="mb-4">
                                <label 
                                    for="name" 
                                    class="block text-gray-700 text-xl font-bold mb-2"
                                >
                                    Name
                                </label>
                                <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    value="{{ $category->name }}" 
                                    class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>
                            
                            <!-- Task Description -->
                            <div class="mb-4">
                                <label 
                                    for="description" 
                                    class="block text-gray-700 text-xl font-bold mb-2"
                                >
                                    Description
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description" 
                                    rows="3" 
                                    class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                >
                                    {!! $category->description !!}
                                </textarea>
                            </div>

                            <!-- Task Category -->
                            <div class="mb-4">
                                <label 
                                    for="category" 
                                    class="block text-gray-700 text-xl font-bold mb-2"
                                >
                                    Task Category
                                </label>
                                <input 
                                    type="text" 
                                    name="category" 
                                    id="category"
                                    value="{{ $category->category }}"
                                    placeholder="Label your task (e.g., work, school, personal)" 
                                    class="block w-full p-2 pl-10 text-xl text-gray-700 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>

                            <!-- Update Button -->
                            <div class="mb-4">
                                <button 
                                    type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded text-xl"
                                >
                                    Update
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