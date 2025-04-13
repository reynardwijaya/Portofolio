
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Experience </h1>
            <p class="services_text" style="margin-bottom: 16px">I have gained a wide range of valuable experiences throughout my studies at BINUS University.</p>
            <br>
            <p class="services_text">
            <span class="year-badge">Feb 2025 - Present</span>
             Laboratory Teaching Assistant
            </p>
            <p class="services_text">
           <span class="year-badge">Feb 2025 - Present</span>
            Duta Binusian (Scholarship Mentor Award)
            </p>
             <p class="services_text">
            <span class="year-badge">Sep 2024 - Present</span>
            CEO of BNCC Malang
            </p>

            <div class="services_section_2">
               <div class="row">

                  @foreach($post as $post )
                  <div class="col-md-4">
                     <div class="custom-card">
                       <img src="/postimage/{{$post->image}}" class="services_img">
                       <div class="custom-card-body">
                       <h4 class="custom-title">{{$post->title}}</h4>
                      <p class="custom-author">Post by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                    </div>
                  </div>
                   </div>
                  @endforeach
                  
               </div>
            </div>
         </div>
      </div>