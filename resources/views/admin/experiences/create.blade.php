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

        select.form-control {
            cursor: pointer;
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
            margin-right: 10px;
        }

        .btn-primary:hover {
            background-color: #c2185b;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s ease;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            color: white;
            text-decoration: none;
        }

        .alert {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-danger {
            background-color: #f44336;
        }

        .close {
            background: none;
            border: none;
            color: white;
            font-size: 16px;
            float: right;
            cursor: pointer;
        }

        .invalid-feedback {
            color: #f44336;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        
        <div class="page-content">
            <div class="form-wrapper">
                @if(session('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>Add Post</h2>
                
                <form action="{{ route('experiences.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Post Title *</label>
                        <input type="text" 
                               name="title" 
                               id="title"
                               class="form-control @error('title') is-invalid @enderror" 
                               value="{{ old('title') }}"
                               required 
                               placeholder="Enter post title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Post Description *</label>
                        <textarea name="description" 
                                  id="description"
                                  class="form-control @error('description') is-invalid @enderror" 
                                  rows="5" 
                                  required 
                                  placeholder="Describe the post...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating (1-5) *</label>
                        <select name="rating" 
                                id="rating"
                                class="form-control @error('rating') is-invalid @enderror" 
                                required>
                            <option value="">Select Rating</option>
                            <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 - Poor</option>
                            <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 - Fair</option>
                            <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 - Good</option>
                            <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 - Very Good</option>
                            <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 - Excellent</option>
                        </select>
                        @error('rating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="maps_link">Google Maps Link</label>
                        <input type="url" 
                               name="maps_link" 
                               id="maps_link"
                               class="form-control @error('maps_link') is-invalid @enderror" 
                               value="{{ old('maps_link') }}"
                               placeholder="https://maps.google.com/...">
                        <small class="text-muted">Optional: Add Google Maps link for this location</small>
                        @error('maps_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Add Image</label>
                        <input type="file" 
                               name="image" 
                               id="image"
                               class="form-control @error('image') is-invalid @enderror" 
                               accept="image/*">
                        <small class="text-muted">Leave empty to use default image. Supported formats: JPEG, PNG, JPG, GIF (Max: 2MB)</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.manage-post') }}" class="btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
