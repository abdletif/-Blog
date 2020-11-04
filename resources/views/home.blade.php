
 @include('partials._header')

    <body>

    @include('partials._nav')

    @include('partials._bg_home')

    <!-- Main Content -->

    <div class="container">

        <x-flash-message></x-flash-message>

        <div class="row">
            <div class="col-lg-8 col-md-8">
                @forelse ($posts as $post)
                        <div class="post-preview">

                            <a href="{{ route("posts.show",$post) }}">
                                <h2 class="post-title">
                                    @if ($post->created_at->diffInHours() <1)
                                         <img  src="{{ asset("storage/images/new.gif") }}" style="width: 50px" alt="New post image">
                                    @endif
                                    {{ $post->title }}
                                </h2>
                                @if ($post->image)
                                    <img class="mb-3" src="{{ asset("storage/".$post->image->path) }}" alt="{{ $post->title }}" style="width: 730px" >
                                @endif
                                <h3 class="post-subtitle">
                                    {{ Str::limit($post->content,140) }}

                                </h3>

                                <a href="{{ route("posts.show",$post) }}">&rarr; Read more</a><br>
                                <x-tag :tags="$post->tags"></x-tag>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="{{ route("user.posts.index",$post->user) }}">{{ $post->user->name }}</a>
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p>
                                {{ $post->comments_count }} Comment(s)
                            </p>
                        </div>

                        @include('modals.PostUpdate')

                        @include('modals.deletePost')

                        <hr>
                @empty
                        <p>Empty.</p>
                @endforelse

                        <div class="container-fluid col-md-6">
                            {{ $posts->links("pagination::bootstrap-4") }}
                        </div>
                    <!-- create post -->
                    <div class="clearfix">
                        <a class="btn btn-primary float-right" href="{{ route("posts.create") }}">Create post &rarr;</a>
                    </div>
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                @include("partials.sidebar")
            </div>
        </div>
    </div>

    <hr>

  @include('partials._footer')
