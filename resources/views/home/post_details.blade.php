<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <base href="/public">
     @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
       
      </div>
      <!-- header section end -->
      <div style="text-align: center;" class="col-md-12">

      <div style="text-align: center;">
      <img 
  src="{{ asset('postimage/' . $post->image) }}" 
  class="services_img" 
  style="float: none; display: block; margin-left: auto; margin-right: auto; padding: 20px; height: 400px; width: auto;">

     </div>

        <h3 class="custom-title"><b>{{$post->title}}</b></h3>
        <h4>{{$post->description}}</h4>
        <p class="custom-author">Post by <b>{{$post->name}}</b></p>
        </div>
               
      <!-- footer section start -->
    @include('home.footer')
      <!-- footer section end -->
     
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>    
   </body>
</html>