<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Create Button -->
            <div class="flex justify-between items-center mb-6 ">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">All Posts</h1>
                <a  style="color:black;" href="/posts/create" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg  font-medium transition duration-200 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Create Post
                </a>
            </div>

            <!-- Empty State -->
            @if(count($posts) === 0)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-4 text-xl font-medium text-gray-700 dark:text-gray-300">No posts found</h3>
                    <p class="mt-2 text-gray-500 dark:text-gray-400">Get started by creating your first post</p>
                </div>
            @else
                <!-- Posts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($posts as $post)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                            <!-- Post Image -->
                            <div style="height: 200px;" class="h-48 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                <img
                                    src="{{ $post->post_image ? asset('/storage/'. $post->post_image) : 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80' }}"
                                    alt="{{ $post->post_title }}"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                            <!-- Post Header -->
                            <div class="px-6 pt-4">
                                <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}
                                </span>
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 text-xs font-semibold rounded">
                                    {{ $post->category ?? 'Design' }}
                                </span>
                                </div>

                                <!-- Post Title -->
                                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-2 hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                                    <a href="/post/{{$post->slug}}">{{ $post->post_title }}</a>
                                </h2>

                                <!-- Post Content -->
                                <p class="text-gray-600 dark:text-gray-300 text-sm line-clamp-3 mb-4">
                                    {{ $post->post_content }}
                                </p>
                            </div>

                            <!-- Post Footer -->
                            <div class="px-6 pb-4">
                                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <a href="/post/{{$post->slug}}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium text-sm flex items-center">
                                        Read more
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>

                                    <div class="flex items-center">

                                        <div class="flex space-x-2">
                                            @if($post->isArchived)
                                                <a style="background-color: darkgreen ;margin-right:5px;" href="posts/{{$post->id}}/restore" class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded transition">
                                                    Restore
                                                </a>
                                                <a href="posts/{{$post->id}}/restore" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded transition">
                                                    Delete
                                                </a>
                                            @else
                                                <a href="posts/{{$post->id}}/archive" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded transition">
                                                    Archive
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
