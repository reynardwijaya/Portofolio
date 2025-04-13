<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
     @include('home.homecss')

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- Experience section start -->
       @include('home.services')
      <!-- Experience section end -->
      <!-- about section start -->
       @include('home.about')
      <!-- about section end -->
      <!-- blog section start -->
      @include('home.blog')
      <!-- blog section end -->
       <!-- contact section start -->
<div class="choose_section layout_padding">
         <div class="container">
            <h1 class="choose_taital">GET IN TOUCH</h1>
    <div class="choose_text">
        BINUS University<br>
        Malang, East Java, Indonesia<br>
        reynard.wijaya005@binus.ac.id
    </div>
 </div>
</div>
<!-- contact section end -->
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