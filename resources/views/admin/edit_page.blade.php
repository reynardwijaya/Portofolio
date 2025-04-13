<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')

    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #2A2A2A;
        color: white;
        font-family: Arial, sans-serif;
      }

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

      .form-group,
      .form-data {
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
        transition: border 0.3s ease, background-color 0.3s ease;
      }

      .form-control:focus {
        outline: none;
        border: 2px solid #2196f3;
        background-color: #fff;
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

      .old-image {
        margin: 15px 0;
      }

      .old-image img {
        display: block;
        max-width: 150px;
        height: auto;
        border-radius: 8px;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      @include('admin.sidebar')

      <div class="page-content">
        <div class="form-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}
            </div>
          @endif

          <h2>Edit Post</h2>

          <form action="{{ url('update_post', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-data">
              <label>Post Title</label>
              <input type="text" name="title" value="{{ $post->title }}" class="form-control" />
            </div>

            <div class="form-data">
              <label>Post Description</label>
              <textarea name="description" class="form-control">{{ $post->description }}</textarea>
            </div>

            <div class="old-image">
              <label>Old Image</label>
              <img src="/postimage/{{ $post->image }}" alt="Old Post Image">
            </div>

            <div class="form-data">
              <label>Update Image</label>
              <input type="file" name="image" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    @include('admin.footer')
  </body>
</html>
