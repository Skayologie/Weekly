<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="my-5 mb-8">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Category Management</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Create and manage categories for your posts</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category Form Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Add New Category</h2>

                    <form method="post" action="/category">
                        @csrf
                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Category Name
                            </label>
                            <input
                                name="category_name"
                                type="text"
                                class="w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-transparent dark:text-white"
                                id="category"
                                placeholder="Enter category name"
                                required
                            >
                            @error('category_name')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            style="background-color: black ; width:200px;"
                            type="submit"
                            class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-md transition duration-200 flex justify-center items-center"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Add Category
                        </button>
                    </form>
                </div>

                <!-- Categories List Card -->
                <div class="md:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Existing Categories</h2>

                    @if(count($categories) === 0)
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                            <p class="mt-2 text-gray-500 dark:text-gray-400">No categories found</p>
                        </div>
                    @else
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($categories as $category)
                                <div class="py-3 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 rounded-full {{ $category->isArchived ? 'bg-gray-400' : 'bg-green-500' }} mr-3"></div>
                                        <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $category->category_name }}</span>
                                        @if($category->isArchived)
                                            <span class="ml-3 text-xs px-2 py-1 bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300 rounded-full">
                                                Archived
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex space-x-2">
                                        @if($category->isArchived)
                                            <a href="category/{{$category->id}}/restore" style="background-color: darkgreen;color: white" class="px-3 py-1 bg-green-600 hover:bg-green-700  text-sm font-medium rounded transition flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Restore
                                            </a>
                                            <a href="category/{{$category->id}}/restore" style="background-color: red;color: white" class="ml-2 px-3 py-1 bg-green-600 hover:bg-green-700  text-sm font-medium rounded transition flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                </svg>
                                                Delete
                                            </a>
                                        @else
                                            <a href="category/{{$category->id}}/archive" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded transition flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                                Archive
                                            </a>
                                        @endif
                                        <a href="category/{{$category->id}}/edit" class="px-3 py-1 bg-gray-200 hover:bg-gray-300 text-gray-700 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 text-sm font-medium rounded transition flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
