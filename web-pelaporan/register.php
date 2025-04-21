<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Register</title>
  <link rel="icon" type="image/png" href="gambar/logo.png">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
    .register-container {
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
        text-align: center;
    }
    .form-control { border-radius: 5px; }
    .btn-primary { background-color: #007bff; border: none; }
    .btn-primary:hover { background-color: #0056b3; }
  </style>

</head>

<body class="bg-primary d-flex align-items-center justify-content-center" style="height: 100vh;">

  <div class="register-container">
    <h3 class="text-primary"><i class="bi bi-person-plus-fill"></i> Register</h3>
    <p class="text-muted">Silakan buat akun baru</p>

    <form method="post" action="register_proses.php">
      <div class="mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>

      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" name="daftar" class="btn btn-primary w-100">Daftar</button>

      <div class="mt-3">
        <span>Sudah Punya Akun? 
          <a href="login.php" class="text-decoration-none">Masuk</a>
        </span>
      </div>
    </form>
  </div>

</body>
</html>
