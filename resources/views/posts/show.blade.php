

@include('partials._header')

@include('partials._nav')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{ $post->title }}</h1>
            <h2 class="subheading">{{ Str::limit($post->content,40) }}</h2>
            <span class="meta">Posted by
              <a href="#">{{ $post->user->name }}</a>
              on {{ $post->created_at->diffForHumans() }}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @if ($post->image)
              <img src="{{ asset("storage/".$post->image->path) }}" alt="{{ $post->title }}" style="width: 730px" >
            @endif
            <p>{{ $post->content }}</p>

            {{-- Form to add Comment --}}
            @auth
                <form action="{{ route("posts.comments.store",$post) }}" method="post">
                    @csrf

                    <label for="content">Content : </label>

                    <textarea name="title" id="content" rows="4" class="form-control @error("content") is-invalid @enderror" required>{{ old("content") }}</textarea>

                    <input type="submit" value="Add Comment" class="btn btn-sm btn-success my-3">
                </form>
            @endauth

            <span class="h4 my-4">Comment(s) :</span><br>

            @forelse ($post->comments as $comment)

                <p>{{ $comment->title }}
                    <span class="text-muted">
                       &larr;
                       <a href="" class="text-decoration-none">{{ $comment->user->name }}</a>
                    </span>
                </p>
            @empty
                <p>0 comment(s).</p>
            @endforelse
        </div>
      </div>
    </div>
  </article>

  <hr>

@include('partials._footer')
