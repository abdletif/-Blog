

   <!-- Delete Post -->
    @can("update",$post)
        <a class="btn btn-sm btn-info" data-toggle="modal" data-target="#post-update-{{ $post->id }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
    @endcan

<!-- Our Modal for deleting post -->
<div class="modal fade" id="post-update-{{ $post->id }}" tabindex="-1" aria-labelledby="PostUpdateLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="PostUpdateLabel">Update post</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">

               <form action="{{ route("posts.update",$post) }}" method="post" enctype="multipart/form-data">
                   @csrf

                   @method("PUT")

                   <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error("title") is-invalid @enderror" name="title" id="title" value="{{ $post->title }}">
                   </div>
                   <x-error error="title"></x-error>

                   <div class="form-gourp">
                       <label for="image">Image :</label>
                       <input type="file" class="form-control @error("image") is-invalid @enderror" name="image" id="image">
                   </div>
                   <x-error error="image"></x-error>

                   <div class="form-gourp">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="8" class="form-control @error("content") is-invalid @enderror">{{ $post->content }}</textarea>
                    </div>
                   <x-error error="content"></x-error>



           </div>
           <div class="modal-footer">
                   <button type="submit" class="btn btn-sm btn-info">Update</button>
           </form>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
       </div>
   </div>
</div>
