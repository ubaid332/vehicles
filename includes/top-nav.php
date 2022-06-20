<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Task</a>
      <input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">
      <span class="text-white pull-right" style="position: relative;right: -80px;">Welcome, <?php echo $_SESSION['user']['fname'] ?></span>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Sign out</a>
        </li>
      </ul>
    </nav>