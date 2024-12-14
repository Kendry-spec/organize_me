<x-layout>
    @auth
        <!-- Container for To-Do List -->
        <div class="container max-w-6xl mx-auto mt-14 px-4 sm:px-6 md:px-8">
            <div class="flex justify-center">
                <div class="w-full">
                    <div class="bg-gray-100 rounded shadow-md p-5">
                        <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
                            @if ($categories->isNotEmpty())
                                <h2 class="text-2xl sm:text-3xl md:text-4xl text-indigo-500 font-semibold mb-4 sm:mb-0">My To-Do List</h2>
                                <a href="{{ route('category.create') }}" class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-base sm:text-lg md:text-xl">
                                    Add New Task
                                </a>
                            @endif
                        </div>

                        @if ($categories->isEmpty())
                            <div class="flex justify-center items-center py-12">
                                <div class="text-center">
                                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">No tasks found</h2>
                                    <p class="text-lg sm:text-xl md:text-2xl text-gray-700 mb-6">You don't have any tasks yet. Please add one!</p>
                                    <a href="{{ route('category.create') }}" class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded text-base sm:text-lg md:text-xl">
                                        Add a task
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- To-Do List Table -->
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full text-left text-base sm:text-lg border border-gray-300">
                                    <thead class="bg-gray-200 border-b border-gray-300">
                                        <tr>
                                            <th class="px-4 py-2 border-r border-gray-300">ID</th>
                                            <th class="px-4 py-2 border-r border-gray-300">Task</th>
                                            <th class="px-4 py-2 border-r border-gray-300">Due Date</th>
                                            <th class="px-4 py-2 border-r border-gray-300">Status</th>
                                            <th class="px-4 py-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr class="border-b border-gray-300 {{ $category->status == 1 ? 'bg-sky-600 text-white' : '' }}">
                                                <td class="px-4 py-2 border-r border-gray-300">{{ $category->id }}</td>
                                                <td class="px-4 py-2 border-r border-gray-300">{{ $category->name }}</td>
                                                <td class="px-4 py-2 border-r border-gray-300">{{ $category->deadline }}</td>
                                                <td class="px-4 py-2 border-r border-gray-300">{{ $category->status === 0 ? 'Pending' : 'Done' }}</td>
                                                <td class="px-4 py-2 flex flex-wrap gap-2">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('category.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                                                        Edit
                                                    </a>

                                                    <!-- View Button -->
                                                    <a href="{{ route('category.show', $category->id) }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                                                        View
                                                    </a>

                                                    <!-- Confirm Button -->
                                                    @if ($category->status == 0)
                                                        <form action="{{ route('category.mark-as-done', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirmMarkAsDone(event)">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded">
                                                                Mark as Done
                                                            </button>
                                                        </form>
                                                    @else
                                                        <button class="bg-gray-400 text-white py-2 px-4 rounded" disabled>
                                                            Completed
                                                        </button>
                                                    @endif

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="mt-6">
                                    {{ $categories->links() }}
                                </div> --}}
                                {{-- Pagination Links --}}
                                <div class="pagination mt-6">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmMarkAsDone(event) {
                // Add your SweetAlert confirmation logic here
            }

            function confirmDelete(event) {
                // Add your SweetAlert confirmation logic here
            }
        </script>
    @endauth
</x-layout>
