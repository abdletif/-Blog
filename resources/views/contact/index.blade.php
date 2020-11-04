
 @include('partials._header')

 <body>

 @include('partials._nav')



 <header class="masthead" style="background-image: url({{ asset("storage/posts/bg-home.jpg") }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <span class="subheading">Contact us</span>
                </div>
            </div>
        </div>
    </div>
</header>

 <!-- Main Content -->
 <div class="container">

    <x-flash-message></x-flash-message>

     <div class="row">
         <div class="col-lg-8 col-md-6">
            <form action="{{ route("contact.store") }}" method="post">

                @csrf

                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="{{ old("username") }}" class="form-control @error("username") is-invalid @enderror" required autofocus>
                </div>
                <x-error error="username"></x-error>


                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" id="email" class="form-control @error("email") is-invalid @enderror" required>
                </div>
                <x-error error="email"></x-error>

                <div class="form-group">
                    <label for="content">Content :</label>
                    <textarea name="content" id="content" rows="5" class="form-control @error("content") is-invalid @enderror" required>
                        {{ old("content") }}
                    </textarea>
                </div>
                <x-error error="content"></x-error>

                <input type="submit" value="Send" class="btn btn-primary">

            </form>
         </div>
     </div>
 </div>

 <hr>

@include('partials._footer')
