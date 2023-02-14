<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Benvenuto, <?php echo $_SESSION['name_surname'] ?></a>
        <button class="btn btn-success">
            <a class="btn btn-success" aria-current="page" data-bs-toggle="modal" data-bs-target="#showAccountModal" id="myAccount">Il mio account</a>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--<li class="nav-item">
                <btn class="nav-link active" aria-current="page" href="#">Home</btn>
            </li>-->
            <li class="nav-item">
                <a>We</a>
            </li>
        </ul>
        </div>
      </div>
    </nav>