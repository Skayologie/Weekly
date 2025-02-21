<x-app-layout>
    <form method="post" action="/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Title</label>
            <input name="post_title" type="text" class="form-control" id="post_title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post Content</label>
            <textarea  class="form-control"  name="post_content">
            </textarea>
        </div>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cover</label>
            <input name="post_image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app-layout>
