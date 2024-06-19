<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .login-container {
      margin-top: 10%;
      max-width: 400px;
    }
    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-logo a {
      font-size: 36px;
      color: #007bff;
      font-weight: bold;
      text-decoration: none;
    }
    .login-card-body {
      padding: 2rem;
      border: 1px solid #e3e3e3;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .login-box-msg {
      margin-bottom: 20px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>
<body class="hold-transition login-page bg-light">
<div class="container login-container">
  <div class="login-logo">
    <a href="#">Admin</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Đăng nhập</p>
      @include('admin.alert')
      <form action="/admin/users/login/store" method="post">
        @csrf
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
       
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
        </div>
      </form>
    </div>
  </div>
</div>

@include('admin.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
