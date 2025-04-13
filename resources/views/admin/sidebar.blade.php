<!-- SIDEBAR MODERN -->
<nav id="sidebar">
  <div class="sidebar-header">
    <h3>Dashboard</h3>
  </div>
  <ul class="nav-list">
    <li class="active">
      <a href="index.html">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
      </a>
    </li>
    <li>
      <a href="{{url('post_page')}}">
        <i class="fa-solid fa-circle-plus"></i>
        <span>Add Post</span>
      </a>
    </li>
    <li>
      <a href="{{url('/show_post')}}">
        <i class="fa-solid fa-chart-bar"></i>
        <span>Show Post</span>
      </a>
    </li>
  </ul>
</nav>

<!-- STYLE -->
<style>
  #sidebar {
    background-color: #1f1f2e;
    color: white;
    width: 220px;
    min-height: 100vh;
    padding: 20px 0;
    float: left;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.4);
  }

  .sidebar-header {
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #333;
    margin-bottom: 20px;
  }

  .sidebar-header h3 {
    color: #fff;
    font-size: 20px;
    margin: 0;
    letter-spacing: 1px;
  }

  .nav-list {
    list-style: none;
    padding: 0 20px;
  }

  .nav-list li {
    margin-bottom: 15px;
  }

  .nav-list li a {
    color: #bbb;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 10px 12px;
    border-radius: 8px;
    transition: 0.3s ease;
  }

  .nav-list li a i {
    margin-right: 12px;
    font-size: 18px;
  }

  .nav-list li a span {
    font-size: 15px;
  }

  .nav-list li a:hover,
  .nav-list li.active a {
    background-color: #2c2c3c;
    color: white;
  }
</style>

<!-- FONT AWESOME -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
