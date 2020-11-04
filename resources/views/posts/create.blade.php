
 @include('partials._header')

 <body>

 @include('partials._nav')

 @include('partials._bg_home')
 <!-- Main Content -->
 <div class="container">

     <div class="row">
         <div class="col-lg-8 col-md-6">
            <form action="{{ route("posts.store") }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text" name="title" id="title" value="{{ old("title") }}" class="form-control @error("title") is-invalid @enderror" required autofocus>
                </div>
                <x-error error="title"></x-error>


                <div class="form-group">
                    <label for="image">Image :</label>
                    <input type="file" name="image" id="image" class="form-control @error("image") is-invalid @enderror" required>
                </div>
                <x-error error="image"></x-error>

                <div class="form-group">
                    <label for="content">Content :</label>
                    <textarea name="content" id="content" rows="5" class="form-control @error("content") is-invalid @enderror" required>
                        {{ old("content") }}
                    </textarea>
                </div>
                <x-error error="content"></x-error>

                <input type="submit" value="Create Post" class="btn btn-primary">

            </form>
         </div>
     </div>
 </div>

 <hr>

@include('partials._footer')
