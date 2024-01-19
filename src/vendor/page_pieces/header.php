<header>
  <?php if ($is_user) { ?>
    <h2 style="color:deeppink">♡⸜(˶˃ ᵕ ˂˶)⸝♡ Hello, <?= $_SESSION['user'][0]['name']; ?>! ദ്ദി ˉ͈̀꒳ˉ͈́ )✧</h2>
    <p><strong>Your role is:</strong> <?= $_SESSION['user'][0]['role'] ?></p>
  <?php } ?>
  <nav>
    <ul>
      <li ><a style="color: deeppink" href="/">Home</a></li>
      <li><a style="color: deeppink" href="/users.php">Users</a></li>
      <li><a style="color: deeppink" href="/secret_page.php">Secret Page</a></li>
      <li><a style="color: deeppink" href="/keks.php">Keks</a></li>
    </ul>
  </nav>
  <div>
    <?php if ($is_user) { ?>
      <?php if ($is_user_admin) { ?>
            <button style="background-color: #7a013b; color: white; border: #7a013b" class="btn btn-primary" id="signup">Sign up</button>
      <?php } ?>
    <?php } else { ?>
        <button style="background-color: #7a013b; color: white; border: #7a013b" class="btn btn-primary" id="signin">Sign in</button>
    <?php } ?>
    <?php if ($is_user) { ?>
      <a style="color: deeppink" href="./src/vendor/logout.php">Logout</a>
    <?php } ?>
  </div>
</header>