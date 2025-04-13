<!DOCTYPE html>
<html>
  <head> 
    

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')

    <style type="text/css">

<style type="text/css">

.title_deg {
  font-size: 48px !important;
  font-weight: 700;
  color: #ffffff;
  margin: 40px auto; /* auto untuk center horizontal */ 
  text-align: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  display: block;
  width: 100%;
}


/* Container styling */
.table_deg {
  width: 90%;
  margin: 0 auto;
  border-collapse: separate;
  border-spacing: 0;
  overflow: hidden;
  border-radius: 12px;
  background-color: #1f1f1f;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
}

/* Header styling */
.table_deg thead {
  background: linear-gradient(90deg, #00c6ff, #0072ff);
}

.table_deg th {
  padding: 16px;
  color: white;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  text-align:center;
}

/* Row styling */
.table_deg td {
  padding: 14px;
  font-size: 14px;
  color: #ddd;
  border-bottom: 1px solid #333;
  vertical-align: middle;
}

.table_deg tr:hover {
  background-color: #2e2e2e;
  transition: background 0.3s ease;
}

/* Image style */
.img_deg {
  width: 140px;
  height: 90px;
  object-fit: cover;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* Buttons */
.btn-success, .btn-danger {
  padding: 8px 18px;
  font-size: 14px;
  border-radius: 6px;
  font-weight: 500;
  transition: 0.3s ease;
}

.btn-success {
  background-color: #28a745;
  border: none;
}

.btn-success:hover {
  background-color: #218838;
}

.btn-danger {
  background-color: #dc3545;
  border: none;
}

.btn-danger:hover {
  background-color: #c82333;
}

/* Responsive tweaks (optional) */
@media (max-width: 768px) {
  .table_deg {
    font-size: 12px;
  }

  .img_deg {
    width: 100px;
    height: 70px;
  }

  .btn-success, .btn-danger {
    padding: 6px 12px;
    font-size: 12px;
  }
}

</style>

  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">

       @if(session()->has('message'))
         <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

            {{session()->get('message')}}


        </div>
       @endif

       <div style="text-align: center;">
  <h1 class="title_deg">All Post</h1>
</div>


        <table class="table_deg">
            <tr class="th_deg">
                <th>Post title</th>

                <th>Description</th>

                <th>Post by</th>

                <th>Post Status</th>

                <th>UserType</th>

                <th>Image</th>

                <th>Delete</th>

                <th>Edit</th>

            </tr>

            @foreach($post as $post)
            <tr>
            <td>{{$post->title}}</td>

            <td>{{$post->description}}</td>

            <td>{{$post->name}}</td>

            <td>{{$post->post_status}}</td>

            <td>{{$post->usertype}}</td>

            <td>
                <img class="img_deg"src="{{ asset('postimage/'. $post->image) }}">
            </td>

            <td>
                <a href="{{url('delete_post', $post->id)}}" class="btn btn-danger" onclick="confirmation(event)"> Delete</a>
            </td>

            <td>
                <a href="{{url('edit_page',$post->id)}}" class="btn btn-success">Edit</a>

            </td>
            </tr>
@endforeach
        </table>

    

      </div>

      
@include('admin.footer')

<script type="text/javascript">

function confirmation(ev)
{
    ev.preventDefault();

    var urlToRedirect=ev.currentTarget.getAttribute('href');
    
    console.log(urlToRedirect);

    swal({

        title:"Are you sure to delete this " ,
        
        text :"You won't be able to revert this delete ",

        icon : "warning",

        buttons : true,

        dangerMode : true,
    })

    .then((willCancel)=>
    {
        if(willCancel)
    {
        window.location.href=urlToRedirect;
    }

    });
  }
</script>


  </body>
</html>