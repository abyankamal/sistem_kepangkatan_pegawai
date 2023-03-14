<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kepangkatan Pegawai (SKP) - Badan Kepegawaian Diklat Kabupaten Garut</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <!-- Header -->
    <header>
    <nav class="navbar navbar-dark bg-info h1 mb-0" role="navigation">
    <div class="container-fluid">
    <a href="#" class="navbar-brand">
    <img src="assets/images/Lambang_Kabupaten_Garut.png" height="60" width="45">
    <span>Sistem Kepangkatan Pegawai (SKP)</span>
    </a>
    </div>
    </nav>
    </header>
    <nav class="navbar bg-secondary bg-opacity-75">
    <div class="container-fluid">
    <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
</nav>
    <div class="container mb-5 align-items-center">
        <div class="col-md-6 mt-5 offset-md-3 card">
        <h3 class="text-white shadow-sm text-center card-header bg-info">Silahkan Log In</h3>
          <div class="card-body">
            <form action="validasilogin.php" method="post" class="row">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                </div>
                <button class="btn btn-info">Masuk</button>
            </form>
          </div>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</html>