<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Article Header -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-5 md:p-6">
                    <h1 class="text-2xl md:text-3xl font-bold text-black mb-2">{{$postDetails->post_title}}</h1>
                    <div class="flex items-center text-gray-200 text-sm">
                        <span class="mr-2">By {{$postDetails->user_id}}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{$postDetails->created_at}}</span>
                    </div>
                </div>

                <div class="md:flex">
                    <!-- Article Image (Smaller) -->
                    <div style="height:250px;" class="md:w-1/3 overflow-hidden h-48 md:h-auto">
                        <img class="w-full h-full object-cover" src="{{ asset('/storage/'. $postDetails->post_image) }}" alt="Featured image">
                    </div>

                    <!-- Article Content (Larger) -->
                    <div class="md:w-2/3 p-6">
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                                {{ $postDetails->post_content }}
                            </p>

                            <!-- Additional content section -->
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mt-6 mb-3">Additional Details</h2>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                                This section provides more in-depth information about the article topic. You can expand on the main points mentioned above and provide additional context, examples, or analysis. This allows readers to gain a deeper understanding of the subject matter.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mt-5 mb-2">Key Insights</h3>
                            <ul class="list-disc pl-5 mb-4 text-gray-700 dark:text-gray-300">
                                <li class="mb-2">First important point that builds on the main content</li>
                                <li class="mb-2">Second insight that provides additional value to readers</li>
                                <li class="mb-2">Third consideration that rounds out the discussion</li>
                            </ul>

                            <blockquote class="border-l-4 border-blue-500 pl-4 italic text-gray-600 dark:text-gray-400 my-4">
                                "This highlighted quote emphasizes an important aspect of the article topic and draws attention to a key concept worth remembering."
                            </blockquote>

                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                The conclusion ties everything together and leaves readers with final thoughts on the subject. It might suggest next steps, implications, or related topics for further exploration.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="bg-gray-50 dark:bg-gray-900 p-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <button class="flex items-center text-gray-500 hover:text-blue-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                Like
                            </button>
                            <button class="flex items-center text-gray-500 hover:text-blue-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                                Comment
                            </button>
                        </div>
                        <button class="flex items-center text-gray-500 hover:text-blue-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            Share
                        </button>
                    </div>
                </div>
                <!-- Comments Section -->
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-6">Comments ({{ count($comments) }})</h2>

                            <!-- Comment Form -->
                            <div class="mb-8 bg-gray-50 dark:bg-gray-900 p-4 rounded-lg">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Leave a comment</h3>
                                <form action="/comment/create" method="POST">
                                    @csrf
                                    <input  type="hidden" name="post_id" value="{{ $postDetails->id }}">

                                    <div class="mb-4">
                        <textarea
                            name="comment_content"
                            rows="4"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Share your thoughts..."
                            required
                        ></textarea>
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                            Post Comment
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Comments List -->
                            <div class="space-y-6">
                                @forelse ($comments as $comment)
                                    <div class="flex space-x-4 pb-6 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full" src="" alt="{{ $comment->name }}">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $comment->name }}</h4>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400"></span>
                                                </div>

                                                @if(Auth::id() === $comment->user_id)
                                                    <div class="flex space-x-2">
                                                        <button class="text-sm text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition">
                                                            Edit
                                                        </button>
                                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-sm text-black hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 transition">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="text-sm text-gray-700 dark:text-gray-300">
                                                {{ $comment->comment_content }}
                                            </div>
                                            <div class="mt-2 flex items-center space-x-4">
                                                <button class="text-xs text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 flex items-center transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                                    </svg>
                                                    Like ({{ $comment->likes_count ?? 0 }})
                                                </button>
                                                <button class="text-xs text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 flex items-center transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                    </svg>
                                                    Reply
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <p class="text-gray-500 dark:text-gray-400">No comments yet. Be the first to share your thoughts!</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- Pagination (if needed) -->
                            @if(isset($comments) && method_exists($comments, 'links'))
                                <div class="mt-6">
                                    {{ $comments->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
