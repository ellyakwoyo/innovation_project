	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./nike.png" alt="">NIKE APP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-home" aria-hidden="true">&nbsp;</i>Home</a>
        </li>
        <?php
            if (isset($_SESSION["userid"])) {
              ?>
              <li class="nav-item active">
                <a class="nav-link active" href="admin.php">Admin</a>
              </li>
              <?php
            }
          ?>
        <li class="nav-item active">
          <a class="nav-link active" href="#">About</a>
        </li>
          <?php
            if (isset($_SESSION["userid"])) {
              ?>
              <li class="nav-item active">
                <a class="nav-link active" href="logout.php"><i class="fas fa-user">&nbsp;</i>Logout</a>
              </li>
              <?php
            }
          ?>
      </ul>
    </div>
  </div>
</nav>