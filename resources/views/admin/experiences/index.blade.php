<!DOCTYPE html>
<html>
<head> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">

.title_deg {
  font-size: 48px !important;
  font-weight: 700;
  color: #ffffff;
  margin: 40px auto;
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
  text-align: center;
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

.star-rating {
  color: #fbbf24;
  font-size: 16px;
}

.alert {
  background-color: #4caf50;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  margin-bottom: 20px;
}

.alert-danger {
  background-color: #dc3545;
}

.close {
  background: none;
  border: none;
  color: white;
  font-size: 16px;
  float: right;
  cursor: pointer;
}

/* Responsive tweaks */
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
        @include('admin.sidebar')
        
        <div class="page-content" style="background-color: #2A2A2A; color: white; min-height: 100vh; padding: 30px; width: 100%;">

            @if(session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session('success') }}
                </div>
            @endif

            <div style="text-align: center;">
                <h1 class="title_deg">All Posts</h1>
            </div>

            <table class="table_deg">
                <thead>
                    <tr class="th_deg">
                        <th>Post Title</th>
                        <th>Description</th>
                        <th>Rating</th>
                        <th>Maps Link</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $experience)
                    <tr>
                        <td>{{ $experience->title }}</td>
                        <td>{{ Str::limit($experience->description, 80) }}</td>
                        <td>
                            <span class="star-rating">★</span> {{ $experience->rating }}
                        </td>
                        <td>
                            @if($experience->maps_link)
                                <a href="{{ $experience->maps_link }}" target="_blank" style="color: #00c6ff;">View Map</a>
                            @else
                                <span style="color: #666;">No Link</span>
                            @endif
                        </td>
                        <td>
                            <img class="img_deg" src="{{ asset('images/dummy/' . $experience->image) }}" alt="{{ $experience->title }}">
                        </td>
                        <td>
                            <form method="POST" action="{{ route('experiences.destroy', $experience) }}" 
                                  style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="confirmation(event)">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('experiences.edit', $experience) }}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #666;">
                            No posts found. <a href="{{ route('admin.add-post') }}" style="color: #00c6ff;">Create one now</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div style="text-align: center; margin-top: 30px;">
                <div class="pagination-wrapper">
                    {{ $experiences->links() }}
                </div>
            </div>

            <style>
            .pagination-wrapper .pagination {
                justify-content: center;
            }
            .pagination-wrapper .pagination .page-link {
                background-color: #333;
                border-color: #555;
                color: #fff;
            }
            .pagination-wrapper .pagination .page-link:hover {
                background-color: #555;
                border-color: #777;
                color: #fff;
            }
            .pagination-wrapper .pagination .page-item.active .page-link {
                background-color: #00c6ff;
                border-color: #00c6ff;
                color: #fff;
            }
            </style>

        </div>
    </div>

    @include('admin.footer')

<script type="text/javascript">
function confirmation(ev) {
    ev.preventDefault();
    
    var urlToRedirect = ev.currentTarget.closest('form').getAttribute('action');
    
    console.log(urlToRedirect);

    swal({
        title: "Are you sure to delete this?",
        text: "You won't be able to revert this delete",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCancel) => {
        if (willCancel) {
            ev.currentTarget.closest('form').submit();
        }
    });
}
</script>

</body>
</html>
