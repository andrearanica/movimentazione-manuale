<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Benvenuto, <?php echo $_SESSION['name_surname']; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#showAccountModal">Il mio account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="help.php">Aiuto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="?logout">Logout</a>
        </li>
    </div>
  </div>
</nav>
<!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand">Benvenuto, <?php echo $_SESSION['name_surname'] ?></a>
        <!--<button class="btn btn-success">
            <a class="btn btn-success" aria-current="page" data-bs-toggle="modal" data-bs-target="#showAccountModal" id="myAccount">Il mio account</a>
        </button>-->
        <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--<li class="nav-item">
                <btn class="nav-link active" aria-current="page" href="#">Home</btn>
            </li>-->
            <!--<li class="nav-item">
                <a href="?logout">Logout</a>
            </li>
                        <li class="nav-item">
                <a data-bs-toggle="modal" data-bs-target="#showAccountInfoModal">Il mio account</a>
            </li>
        </ul>
        </div>
      </div>
    </nav>-->