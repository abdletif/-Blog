
 @include('partials._header')

 <body>

 @include('partials._nav')



 <header class="masthead" style="background-image: url({{ asset("storage/posts/bg-home.jpg") }})">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>Ooops! Page not found</h2>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

 <!-- Main Content -->
 <div class="container">

     <div class="row">
         <div class="col-lg-8 col-md-12">
            <h3 class="text-center">
                403 we are sorry ! But you don't have access to this page or resource.
            </h3>
            Back to <a href="/" class="text-decoration-none">Home &larr;</a>
         </div>
     </div>
 </div>

 <hr>

@include('partials._footer')
