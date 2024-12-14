<x-layout>

    <!-- Container for Task Details -->
    <div class="container max-w-5xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-gray-100 rounded-lg shadow-xl p-6 sm:p-8">
                    
                    <!-- Header Section -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-5">
                        <h2 class="text-2xl sm:text-3xl lg:text-3xl font-bold text-indigo-500 mb-4 sm:mb-0">
                            View Task Details
                        </h2>
                        <a 
                            href="{{ route('category.index') }}" 
                            class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 text-sm sm:text-base lg:text-lg rounded"
                        >
                            Back
                        </a>
                    </div>  
    
                    <hr class="my-4">
                        
                    <!-- Task Details Card -->
                    <div class="card bg-white rounded-lg shadow-lg mt-4">
                        <div class="card-body p-4 sm:p-6 space-y-6 text-xl">
                            
                            <!-- Task Name -->
                            <div class="flex flex-col sm:flex-row">
                                <label class="text-gray-700 font-semibold sm:w-1/3">Name:</label>
                                <span class="text-gray-900 sm:w-2/3">{{ $category->name }}</span>
                            </div>
                
                            <!-- Task Description -->
                            <div class="flex flex-col sm:flex-row">
                                <label class="text-gray-700 font-semibold sm:w-1/3">Description:</label>
                                <span class="text-gray-900 sm:w-2/3">{{ $category->description }}</span>
                            </div>
                
                            <!-- Task Category -->
                            <div class="flex flex-col sm:flex-row">
                                <label class="text-gray-700 font-semibold sm:w-1/3">Task Category:</label>
                                <span class="text-gray-900 sm:w-2/3">{{ $category->category }}</span>
                            </div>

                            <!-- Task Deadline -->
                            <div class="flex flex-col sm:flex-row">
                                <label class="text-gray-700 font-semibold sm:w-1/3">Task Deadline:</label>
                                <span class="text-gray-900 sm:w-2/3">{{ $category->deadline }}</span>
                            </div>
                            
                            <!-- Task Status -->
                            <div class="flex flex-col sm:flex-row">
                                <label class="text-gray-700 font-semibold sm:w-1/3">Status:</label>
                                <span 
                                    class="text-gray-900 font-semibold text-base sm:text-lg lg:text-2xl sm:w-2/3 {{ $category->status == 0 ? 'text-yellow-600' : 'text-green-700' }}"
                                >
                                    {{ $category->status == 0 ? 'Pending':'Done'}}
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-layout>
