<x-app-layout>
<div id="posts">
    <!-- Example Post 1 -->
    @foreach($posts as $post)
        <div class="post">
            <a href="/post/{{$post->slug}}" ><div class="post-cover" style="background-image: url('{{ asset('/storage/'. $post->post_image) }}')"></div></a>
            <a href="/post/{{$post->slug}}" ><div class="post-content">
                <h2>{{$post->post_title}}</h2>
                <p>{{$post->post_description}}</p>
                <small>Posted on: {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</small>
            </div></a>
        </div>
    @endforeach
    <!-- Add more posts as needed -->
</div>
</x-app-layout>
