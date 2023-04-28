<?php
    include('controller.user.php');
?>
<link rel="stylesheet" href="csjs/css.css">
<script src="csjs/js.js"></script>
<style>
  /* cyrillic-ext */
  @font-face {font-family: 'Raleway'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVsEpbCFPrEHJA.woff2) format('woff2'); unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
  /* cyrillic */
  @font-face {font-family: 'Raleway'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVsEpbCMPrEHJA.woff2) format('woff2'); unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
  /* vietnamese */
  @font-face {font-family: 'Raleway'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVsEpbCHPrEHJA.woff2) format('woff2'); unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;}
  /* latin-ext */
  @font-face {font-family: 'Raleway'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVsEpbCGPrEHJA.woff2) format('woff2'); unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
  /* latin */
  @font-face {font-family: 'Raleway'; font-style: normal; font-weight: 600; src: url(https://fonts.gstatic.com/s/raleway/v28/1Ptxg8zYS_SKggPN4iEgvnHyvveLxVsEpbCIPrE.woff2) format('woff2'); unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}

  /* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  } */

  body {
    /* width: 100%; */
    /* height: 100vh; */
    align-items: top;
    justify-content: center;
    background-color: #00e388;
  }

  h1 {
    color: #fff;
    font-family: "Raleway", sans-serif;
    font-size: 5vw;
    font-weight: 600;
    text-transform: uppercase;
  }
  .h1login {
    color: #fff;
    font-family: "Raleway", sans-serif;
    font-size: 220%;
    font-weight: 600;
    text-transform: uppercase;
    display: flex;
    justify-content: center;
  }
  .plogin {
    color: #5a5a5a;
    font-family: "Raleway", sans-serif;
    font-size: 140%;
    font-weight: 600;
    display: flex;
    justify-content: left;
  }
  h1 span {
    display: inline-block;
    opacity: 0;
    transform: translateY(20px) rotate(90deg);
    transform-origin: left;
    animation: in 0.5s forwards;
  }

  h1 span:nth-child(1) {animation-delay: 0.1s;}
  h1 span:nth-child(2) {animation-delay: 0.2s;}
  h1 span:nth-child(3) {animation-delay: 0.3s;}
  h1 span:nth-child(4) {animation-delay: 0.4s;}
  h1 span:nth-child(5) {animation-delay: 0.5s;}
  h1 span:nth-child(6) {animation-delay: 0.6s;}
  h1 span:nth-child(7) {animation-delay: 0.7s;}

  .w3-animate-bottom {
    position: relative; animation: animatebottom 1.4s;
  }
  .cardlogin{
    height:450px; width:30vw; display: block;margin-left:auto; margin-right:auto; margin-top: -8%;
  }
  .cardregis{
    height:650px; width:30vw; display: block;margin-left:auto; margin-right:auto; margin-top: -8%;
  }
  .smradiuscard{
    border-radius: 15px 15px 15px 15px;
  }
  .smradiusp{
    border-radius: 15px 15px 0px 0px;
  }
  .formcontrol{
    width: 75%;
    margin-left: auto;
    margin-right: auto;
  }
  @keyframes animatebottom {
    from {
      bottom: -300px;
      opacity: 0
    }
    to {
      bottom: 0;
      opacity: 1
    }
  }

  @keyframes in {
    0% {
      opacity: 0;
      transform: translateY(180px) rotate(90deg);
    }
    100% {
      opacity: 1;
      transform: translateY(0) rotate(0);
    }
  }
  @media screen and (max-width:1300px) {
    .cardlogin {
      margin-top: -8%;
      width: 40vw;
      height: 450px;
    }
  }
  @media screen and (max-width:1000px) {
    .cardlogin {
      margin-top: -15%;
      width: 55vw;
      height: 450px;
    }
  }
    @media screen and (max-width:700px) {
    .cardlogin {
      margin-top: -20%;
      width: 60vw;
      height: 450px;
    }
  }
  @media screen and (max-width:1300px) {
    .cardregis {
      margin-top: -8%;
      width: 40vw;
      height: 650px;
    }
  }
  @media screen and (max-width:1000px) {
    .cardregis {
      margin-top: -15%;
      width: 55vw;
      height: 650px;
    }
  }
    @media screen and (max-width:700px) {
    .cardregis {
      margin-top: -20%;
      width: 60vw;
      height: 650px;
    }
  }
</style>

<body>
  <?php 
      if(isset($_GET["regis"]) == true){
  ?>
  <br><br><br><br><br><br><br><br><br>
  <span>
    <div class="card w3-animate-bottom cardregis smradiuscard">
      <div class="smradiusp bg-dark" style="color: #fff; padding-top:10px; padding-bottom: 1px;">
        <p class="h1login">REGISTER</p>
      </div>
      <div>
          <form action="controller.user.php?regiser" method="post" style="margin-top: 15px">
            <p class="plogin formcontrol">Username</p>
            <input type="text" class="form-control formcontrol" name="username" style="margin-top: -15px" required><br>
            <p style="margin-top: -20px" class="plogin formcontrol">Password</p>
            <input type="password" class="form-control formcontrol" name="password" style="margin-top: -15px" required><br>
            <p style="margin-top: -20px" class="plogin formcontrol">Confirm Password</p>
            <input type="password" class="form-control formcontrol" name="varpassword" style="margin-top: -15px" required><br>

            <p style="margin-top: -20px" class="plogin formcontrol">First Name</p>
            <input type="text" class="form-control formcontrol" name="fname" style="margin-top: -15px" required><br>
            <p style="margin-top: -20px" class="plogin formcontrol">Last Name</p>
            <input type="text" class="form-control formcontrol" name="lname" style="margin-top: -15px" required><br>
            <button class="btn btn-success" style="width:75%; margin-left:auto; margin-right:auto; display:block;">Submit</button> <br>
            <button class="btn btn-danger" style="width:75%; margin-left:auto; margin-right:auto; display:block; margin-top: -20px">Reset</button>
          </form>
          <a href="login.php" style="margin-left: 12%; margin-top: -55px">login</a>
          
      </div>
    </div>
  </span>
  <?php 
      }else{
  ?>
  <h1 style="margin-top: 3vw;display: flex;align-items: top;justify-content: center;">
    <span>w &nbsp;</span>
    <span>e &nbsp;</span>
    <span>l &nbsp;</span>
    <span>c &nbsp;</span>
    <span>o &nbsp;</span>
    <span>m &nbsp;</span>
    <span>e &nbsp;</span>
  </h1>
  <br><br><br><br><br><br>
  <span>
    <div class="card w3-animate-bottom cardlogin smradiuscard">
      <div class="smradiusp bg-dark" style="color: #fff; padding-top:10px; padding-bottom: 1px;">
        <p class="h1login">LOGIN</p>
      </div>
      <div>
          <form action="controller.user.php?login" method="post" style="margin-top: 15px">
            <p class="plogin formcontrol">Username</p>
            <input type="text" class="form-control formcontrol" name="username" style="margin-top: -15px" required><br>
            <p class="plogin formcontrol">Password</p>
            <input type="password" class="form-control formcontrol" name="password" style="margin-top: -15px" required><br>
            <button class="btn btn-success" style="width:75%; margin-left:auto; margin-right:auto; display:block;">Submit</button> <br>
            <button class="btn btn-danger" style="width:75%; margin-left:auto; margin-right:auto; display:block; margin-top: -20px">Reset</button>
          </form>
          <a href="login.php?regis" style="margin-left: 12%;">register</a>
          <a href="index.php" style="margin-left: 53%; margin-right: -55px; text-align: right">Home</a>
      </div>
    </div>
  </span>
  <?php
      }
  ?>
</body>