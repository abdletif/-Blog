

@include('partials._header')

@include('partials._nav')

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>10 Best Popular Posts</h1><br>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
            <div>
                @forelse ($popularPosts as $post)
                        <div class="post-preview">

                            <a href="{{ route("posts.show",$post) }}">
                                <h2 class="post-title">
                                    @if ($post->created_at->diffInHours() <1)
                                        <img src="{{ asset("storage/images/new.gif") }}" style="width: 50px" alt="New post image">
                                    @endif
                                    {{ $post->title }}
                                </h2>
                                @if ($post->image)
                                    <img class="mb-3" src="{{ asset("storage/".$post->image->path) }}" alt="{{ $post->title }}" style="width: 730px" >
                                @endif
                                <h3 class="post-subtitle">
                                    {{ Str::limit($post->content,140) }}

                                </h3>
                                <a href="{{ route("posts.show",$post) }}">&rarr; Read more</a>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">{{ $post->user->name }}</a>
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p>
                                {{ $post->comments()->count() }} Comment(s)
                            </p>
                        </div>

                        @include('modals.PostUpdate')

                        @include('modals.deletePost')

                        <hr>
                @empty
                        <p>Empty.</p>
                @endforelse

            </div>
        </div><!-- end -->
        <div class="col-md-4">
            @include("partials.sidebar")
        </div>
      </div>
    </div>
  </article>

  <hr>

@include('partials._footer')
