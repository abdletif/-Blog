
@include('partials._header')

@include('partials._nav')
    <header class="masthead" style="background-image: url({{ asset("storage/posts/bg-home.jpg") }})">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>My post(s)</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <x-flash-message></x-flash-message>
        <div class="card">
            <div class="card-header">
                All Post(s)
                <span class="float-right btn btn-sm btn-success">
                    <a href="{{ route("posts.create") }}" class="text-white text-decoration-none">Create Post</a>
                </span>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ ++$i  }}</td>
                                <td>{{ Str::limit($post->title,15) }}</td>
                                <td>{{ Str::limit($post->title,40)  }}</td>
                                <td>
                                    @include('modals.PostUpdate')

                                    @include('modals.deletePost')
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('partials._footer')
