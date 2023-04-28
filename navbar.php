<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");
  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    font-family: "Poppins", sans-serif;
    min-height: 100vh;
    background: black;
  }

  .navigation {
    position: fixed;
    width: 90px;
    height: 100%;
    background: #ff7700;
    overflow: hidden;
    transition: 0.5s;
  }

  .navigation:hover,
  .navigation.active {
    width: 240px;
  }

  .navigation ul {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
  }

  .navigation ul li {
    position: relative;
    width: 100%;
    list-style: none;
    transition: 1s;
  }

  .navigation ul li:hover {
    background: #3e3e3e;
  }

  .navigation ul li a {
    position: relative;
    display: block;
    width: 100%;
    display: flex;
    text-decoration: none;
    color: #000000;
  }

  .navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
  }

  .navigation ul li a .icon .fa {
    font-size: 24px;
  }

  .navigation ul li a .title {
    position: relative;
    display: block;
    padding: 0 10px;
    height: 60px;
    line-height: 60px;
    text-align: start;
    white-space: nowrap;
  }

  .toggle {
    position: absolute;
    top: 0;
    right: 0;
    width: 60px;
    height: 60px;
    background: #d56500;
    cursor: pointer;
    transition: 0.7s;
  }

  .toggle.active {
    background: #ff7700;
  }

  .toggle::before {
    content: "\f0c9";
    font-family: fontAwesome;
    position: absolute;
    width: 100%;
    height: 100%;
    line-height: 60px;
    text-align: center;
    font-size: 24px;
    color: #fff;
  }

  .toggle.active::before {
    content: "\f00d";
  }

  @media (max-width: 767px) {
    .navigation {
      left: -60px;
    }
    .navigation.active {
      left: 0px;
      width: 110%;
    }
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
  <?php
  
    if(@$_SESSION['userstatus']=="admin"){
  ?>
  <div class="navigation" style="margin-left: -32px;z-index: 1;">
    <ul>
      <li>
        <a href="dashboard.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-dashboard"></i></span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <!-- <li>
                <a href="#">
                    <span class="icon"></span>
                    <span class="icon">Home</span>
                </a>
            </li> -->
      <li>
        <a href="listenroll.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-calendar"></i></span>
          <span class="title">Enroll</span>
        </a>
      </li>
      <li>
      <li>
        <a href="listuser.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-user"></i></span>
          <span class="title">User</span>
        </a>
      </li>
      <li>
        <a href="listcourse.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-message"></i></span>
          <span class="title">Course</span>
        </a>
      </li>
      <!-- <li>
        <a href="#">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-circle-info"></i></span>
          <span class="title">Help</span>
        </a>
      </li>
      <li>
        <a href="#">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-gear"></i></span>
          <span class="title">Settings</span>
        </a>
      </li> -->
      <!-- <li>
        <a href="#">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-lock"></i></span>
          <span class="title">Password</span>
        </a>
      </li> -->
      <li>
        <a href="logout.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-right-from-bracket"></i></span>
          <span class="title">Logout</span>
        </a>
      </li>
    </ul>
  </div>
  <?php
    }else{
  ?>
    <div class="navigation" style="margin-left: -32px;z-index: 1;">
    <ul>
      <li>
        <a href="index.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-house"></i></span>
          <span class="title">Home</span>
        </a>
      </li>
      <?php
        if(@$_SESSION['userstatus']=="user"){
      ?>
      <li>
        <a href="enroll.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-calendar"></i></span>
          <span class="title">Enroll</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-right-from-bracket"></i></span>
          <span class="title">Logout</span>
        </a>
      </li>
      <?php
        }else{
      ?>
        <li>
          <a href="logout.php">
            <span class="icon"><i style="margin-top: 21px;" class="fa-solid fa-right-from-bracket"></i></span>
            <span class="title">Login</span>
          </a>
        </li>
      <?php
        }
      ?>
    </ul>
  </div>
  <?php
    }
  ?>
  <div class="toggle" onclick="toggleMenu()" style="z-index: 1;"></div>

  <script type="text/javascript">
    function toggleMenu() {
      let navigation = document.querySelector('.navigation');
      let toggle = document.querySelector('.toggle');
      navigation.classList.toggle('active');
      toggle.classList.toggle('active');
    }
  </script>
</body>

</html>