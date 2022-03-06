<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Bookshelf</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css\styles.css">
  <link rel="icon" href="resources/favicon F.ico">
  <style>
    body{
        background-color: #f4f1ea;
    }
</style>
</head>
<body>
    <!-- Navbar content -->
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">BOOKSHELF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
       
      </ul>
      <form action="search_books.php" method="GET" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search a book" name="bk">
        <input type="submit" value="Search" name="sub" class="form-control btn btn-info">
      </form>
    </div>
  </nav>

  <br>
  


  <!-- main -->

    <div class="container" align="center">
        <form action="login.php" style="height: 260px; width: 700px;" method="POST" class='form-control bg-transparent'>
            <h3 align="center" style="font-weight: bolder">User Login</h3>
            <h4 align="left" style="font-weight: bolder;">Email:</h4>
            <input type='email' class='form-control' placeholder='Email' name='email'>
            <h4 align="left" style="font-weight: bolder;">Password:</h4>
            <input type='password' class='form-control mb-3' placeholder='Password' name='pass'>
            <input type="submit" class='form-control btn-info' name='log' value='Login'>
        </form>

        <?php
            if(isset($_POST['log'])){
                $em=$_POST['email'];
                $ps=$_POST['pass'];
                $q='SELECT * FROM registration';
                $slogid=0;
                $con=mysqli_connect('localhost','root','','bookshelf');
                if($con){
                    $f=0;
                    $res=mysqli_query($con,$q);
                    while($row=mysqli_fetch_row($res)){
                        if($row[4]==$em && $row[5]==$ps){
                            $slogid=$row[0];
                            echo '<h2 style="font-weight: bolder;">Login Successful.</h2>';
                            echo '<a style="font-weight: bolder;" href="index.html?slogid='.$slogid.'&pid=0">Go to Homepage</a>';
                            $f=1;
                            break;
                        }
                    }
                    
                    if(!$f){
                        echo '<br><h2 style="font-weight: bolder;">Login Unsuccessful</h2>';
                    }
                }
            }
        ?>
    </div>



    <!-- footer -->

<footer class="navbar navbar-light font fixed-bottom" style=" color: black; background-color: #f4f1ea;">

<div class="row">
  <div class="col-sm-5 marginr">
    <h3 class="display-4">BOOK<br> SHELF</h3>
  </div>
  <div class="col-sm-1 marginr">
    <div class="vl"></div>
  </div>
  <div class="col-sm-6 marginl join">
    <p style="color: black;" >Join our community and get updeted.</p>
    <a href="">About Us</a> <br>
    <a href="">Contuct Us</a> <br>
    <a href="">Help</a>
  </div>
</div>

</footer>
</body>
</html>