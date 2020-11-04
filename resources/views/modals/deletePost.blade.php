

   <!-- Delete Post -->
    @can("delete",$post)
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#post-delete-{{ $post->id }}">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
            </svg>
        </button>
    @endcan

    <!-- Our Modal for deleting post -->
    <div class="modal fade" id="post-delete-{{ $post->id }}" tabindex="-1" aria-labelledby="PostDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PostDeleteLabel">Delete post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want delete this post?

                    <form action="{{ route("posts.destroy",$post) }}" method="post">
                        @csrf

                        @method("DELETE")

                </div>
                <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
