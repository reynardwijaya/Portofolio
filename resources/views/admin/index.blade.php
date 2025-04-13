<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
  .page-content {
    background-color: #2A2A2A;
    color: white;
    min-height: 100vh;
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
  }

  .form-wrapper {
    background-color: #1f1f1f;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
    max-width: 600px;
    width: 100%;
  }

  .form-wrapper h2 {
    margin-bottom: 25px;
    text-align: center;
    font-size: 24px;
    color: #fff;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #ccc;
  }

  .form-control {
  width: 100%;
  padding: 10px 14px;
  border: none;
  border-radius: 8px;
  background-color: #eee;
  color: #333;
  font-size: 14px;
}

.form-control:focus {
  outline: none;
  border: 2px solid #2196f3; /* garis biru saat focus */
  background-color: #fff;
}

.form-control {
  transition: border 0.3s ease, background-color 0.3s ease;
}



  .form-control[type="file"] {
    padding: 8px;
    background-color: #fff;
  }

  .btn-primary {
    background-color: #E91E63;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    color: white;
    font-weight: bold;
    font-size: 14px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #c2185b;
  }

  .alert {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
  }

  .close {
    background: none;
    border: none;
    color: white;
    font-size: 16px;
    float: right;
    cursor: pointer;
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
  <div class="form-wrapper">
    @if(session()->has('message'))
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}
      </div>
    @endif

    <h2>Add Post</h2>
    <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label>Post Title</label>
        <input type="text" name="title" class="form-control" required />
      </div>

      <div class="form-group">
        <label>Post Description</label>
        <textarea name="description" class="form-control" rows="5" required></textarea>
      </div>

      <div class="form-group">
        <label>Add Image</label>
        <input type="file" name="image" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

@include('admin.footer')
  </body>
</html>