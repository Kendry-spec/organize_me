<x-layout>
@auth
    <!-- Container for To-Do List -->
    <div class="container max-w-6xl mx-auto mt-24">
        <div class="flex justify-center">
            <div class="w-full md:w-12/12 lg:w-12/12 xl:w-12/12">
                <div class="bg-gray-100 rounded shadow-md p-5">
                    <div class="flex justify-between items-center mb-5">
                        <h2 class="text-4xl text-indigo-500">My To-Do List</h2>
                        <a 
                            href="{{ route('category.create') }}" 
                            class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 text-xl rounded"
                        >
                            Add New Task
                        </a>
                    </div>

                    <!-- To-Do List Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full text-left text-lg border border-gray-300">
                            <thead class="bg-gray-200 border-b border-gray-300">
                                <tr>
                                    <th class="px-4 py-2 border-r border-gray-300">ID</th>
                                    <th class="px-4 py-2 border-r border-gray-300">TASK</th>
                                    <th class="px-4 py-2 border-r border-gray-300">DEADLINE</th>
                                    <th class="px-4 py-2 border-r border-gray-300">TASK CATEGORY</th>                                    
                                    <th class="px-2 py-2 border-r border-gray-300">STATUS</th>
                                    <th class="px-4 py-2">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                <tr 
                                    class="border-b border-gray-300 {{ $category->status == 1 ? 'bg-sky-600 text-white' : '' }}"
                                >
                                    <td class="px-4 text-xl py-2 border-r border-gray-300">{{ $category->id }}</td>
                                    <td class="px-4 text-xl py-2 border-r border-gray-300">{{ $category->name }} </td>
                                    <td class="px-4 text-xl py-2 border-r border-gray-300">{{ $category->deadline }}</td>
                                    <td class="px-4 text-xl py-2 border-r border-gray-300">{{ $category->category }}</td>
                                    <td class="px-4 text-xl py-2 border-r border-gray-300">
                                        {{ $category->status === 0 ? 'Pending' : 'Done' }}
                                    </td>
                                    <td class="px-4 py-2 flex justify-around">
                                        <!-- Edit Button Icon -->
                                        <a 
                                            href="{{ route('category.edit', $category->id) }}" 
                                            class="bg-[#03A9F4] hover:bg-[#0067c1] text-white py-2 px-4 rounded h-12 mx-1"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>

                                        <!-- View Button Icon -->
                                        <a 
                                            href="{{ route('category.show', $category->id) }}" 
                                            class="bg-[#4CAF50] hover:bg-[#3E8E41] text-white py-2 px-4 rounded h-12 mx-2"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                        
                                        <!-- Confirm Button Icon -->
                                        @if ($category->status == 0)
                                        <form 
                                            action="{{ route('category.mark-as-done', $category->id) }}"
                                            method="POST"
                                            class="d-inline mx-2"
                                              onsubmit="return confirmMarkAsDone(event)"
                                            >
                                          @csrf
                                          @method('PATCH')
                                            <button 
                                                type="submit" 
                                                class="bg-orange-500 hover:bg-orange-700 text-white py-2 px-4 rounded h-12"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                </svg>
                                            </button>
                                        </form>
                                      @else
                                        <button 
                                            class="bg-[#8BC34A] hover:bg-[#65C258] text-white h-12 py-2 px-4 mx-2" 
                                                disabled
                                            >
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                          </svg>
                                        </button>
                                      @endif
                                      
                                      <!-- Delete Button Icon -->
                                      <form 
                                        action="{{ route('category.destroy', $category->id) }}" 
                                        method="post" 
                                        class="d-inline mx-2"
                                        onsubmit="return confirmDelete(event)"
                                      >
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button 
                                          type="submit" 
                                          class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded h-12"
                                        >
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                          </svg>
                                        </button>
                                      </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Link importing sweetalert --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- JavaScript function for confirmation button --}}
        <script>
            function confirmMarkAsDone(event) {}
        </script>
    
@endauth
</x-layout>
