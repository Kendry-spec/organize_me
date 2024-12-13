<x-layout>

    <!-- Container for Task Details -->
    <div class="container max-w-5xl mx-auto mt-14">
        <div class="flex justify-center">
            <div class="w-full md:w-12/12 lg:w-12/12 xl:w-12/12">
                <div class="bg-gray-100 rounded shadow-xl p-5">
                    
                    <!-- Header Section -->
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-4xl text-indigo-500">View Task Details</h2>
                        <a 
                            href="{{ route('category.index') }}" 
                            class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 text-lg rounded"
                        >
                            Back
                        </a>
                    </div>  
    
                    <hr class="my-4">
                        
                    <!-- Task Details Card -->
                    <div class="card bg-slate-100 rounded-lg shadow-xl mt-4">
                        <div class="card-body p-4 md:p-6 text-lg md:text-xl lg:text-2xl">
                            
                            <!-- Task Name -->
                            <div class="mb-4">
                                <label class="text-gray-700 font-semibold">Name:</label>
                                <span class="ml-2 text-gray-900">{{ $category->name }}</span>
                            </div>
                
                            <!-- Task Description -->
                            <div class="mb-4">
                                <label class="text-gray-700 font-semibold">Description:</label>
                                <span class="ml-2 text-gray-900">{{ $category->description }}</span>
                            </div>
                
                            <!-- Task Category -->
                            <div class="mb-4">
                                <label class="text-gray-700 font-semibold">Task Category:</label>
                                <span class="ml-2 text-gray-900">{{ $category->category }}</span>
                            </div>

                            <!-- Task Deadline -->
                            <div class="mb-4">
                                <label class="text-gray-700 font-semibold">Task Deadline:</label>
                                <span class="ml-2 text-gray-900">{{ $category->deadline }}</span>
                            </div>
                            
                            <!-- Task Status -->
                            <div class="mb-4">
                                <label class="text-gray-700 font-semibold">Status:</label>
                                <span 
                                    class="ml-2 text-gray-900 text-2xl font-semibold {{ $category->status == 0 ? 'text-yellow-600' : 'text-green-700' }}"
                                >
                                    {{ $category->status == 0 ? 'Pending':'Done'}}
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- SweetAlert2 Script -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
    </div>
</x-layout>