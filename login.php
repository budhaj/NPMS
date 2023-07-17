<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Login and Registration | SBS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
  #btn1{

    margin-left: 80px;
  }
    </style>
<body>

    <header>
        <h2 class="logo">News Portal System</h2>
        <nav class="navigation">
            <a href="admin/home.php">home</a>
          
            <a href="#">About</a>
            <a href="#">Login</a>
            <a href="Admin/add.php">AddNews</a>
        </nav> 
        <span> <a href="#"> <button class="btn btn-outline-primary" id="btn1">register</button></a></span>
    </header>

    <div class="wrapper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        
        <div class="form-box login">
            <h2>Login</h2>
            <form action="action.php?form=login" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="email"></ion-icon></span>
                    <input type="email"  name="email" placeholder="Email" required>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" placeholder="Password" name="password" required>
                </div>

                <div class="remember-forgot">
                    <label><input type="checkbox">
                    Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account? <a
                     href="#" class="register-link">Register</a></p>
            </form>
        </div>    

        

    </div>
    
    <script src="scripts.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>