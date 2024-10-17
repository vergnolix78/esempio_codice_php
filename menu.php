
<nav class="navbar navbar-expand-sm bg-primary">
  <div class="container">
    
    <ul class="nav navbar-nav ">
      <li class="nav-item">
        <a class="nav-link text-light" href="index.php">Homepage</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="chi-siamo.php">Chi siamo</a>
      </li>
      <?php if($autenticadedProvider->userIsAutenticaded() === true): ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="creaPost.php">Nuovo Post</a>
        </li>  
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link text-light" href="contatti.php">Contatti</a>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php if($autenticadedProvider->userIsAutenticaded() !== true): ?>
        <li class="nav-item text-center">
          <a class="text-light" href="login.php">
            <small class="text-light">
              <img src="../image/user.png" width="24"><br>
              <span style="font-size:0.8rem">Accedi </span>
            </small>
          </a>
            
          <span class="text-light" style="font-size:0.8rem"> / </span>

          <a class="text-light" href="register.php">
            <small class="text-light">
              <span style="font-size:0.8rem">Registrati</span>
            </small>
          </a>
        </li>
      <?php else: ?>
        <li class="nav-item text-center mx-2"><small class="text-light text-capitalize"><?php echo 'Welecome <br><span style="font-size:0.8rem">'. $_SESSION['username'] . '</span>'; ?></small></li>  
        <li class="nav-item text-center mx-2"><a href="profilo.php"><small class="text-light"><img src="../image/user1.png" width="24"><br><span style="font-size:0.8rem">Profilo</span></small></a></li>  
        <li class="nav-item text-center mx-2"><a href="logout.php"><small class="text-light"><img src="../image/uscita.png" width="24"><br><span style="font-size:0.8rem">Logout</span></small></a></li>        
      <?php endif; ?>  
    </ul>

  </div>
</nav>

