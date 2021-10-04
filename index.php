<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:180px;
}
.h-80 {
    height: 80% !important;
}
</style>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
      <div class="card-header"><center><img src="logo.png" class="login_main_img" style="height: 60px;width: 200px;margin-top: 4px;" /></center>

      <form action="login_check.php" method="post">

            <h5 class="card-title text-center"></h5>
            <form class="form-signin">
              <div class="form-label-group">
                <label for="inputEmail">Username</label>

                <input type="username" name="username" class="form-control" placeholder="Username" required autofocus>
              </div>

              <div class="form-label-group">
                <label for="inputPassword">Password</label>
             
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>

                        <div class="form-label-group">
                <label for="Station">Station</label>
                  <select class="form-control"  name="st_id" id="st_id" required>
            		        <option value="">Select Terminal</option>
            		        <option value="T-1">T-1</option>
            		        <option value="T-2">T-2</option>
            		        <option value="T-3">T-3</option>

                             </select>
              </div>
                <br>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
<h4>Admin Login</h4><label class="switch"><input type="checkbox" name="admin"><span class="slider round"></span></label>
           
           </form>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>