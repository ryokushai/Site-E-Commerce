<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="item.php">Shop</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                     <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-user"></i> Profil </a>
                        </li>
                        <li>
                            <a href="../public/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
          </ul>              
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <?php
                        require '../ressources/config.php';
    $pdo = Database::connect();
    
                        include 'fonctions.php';
                       
                $pdo = Database::connect();
                        category();
                        ?>
                

<div class="col-md-9">

<!--Row For Image and Short Description-->


<?php
                       
                         $id=null;
    
         if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
}
                       
                        $sql=$pdo->prepare('SELECT * from produit where product_id=?');
                        $sql->execute(array($id));
                        
                        while($item = $sql->fetch()) 
                        {               
                            $price = $item['product_price'];
                            $desc = $item['product_desc'];
                            $title = $item['product_title'];
                            $pic = $item['product_img'];
                            $idd = $item['product_id']; 
                            $res = <<<EOF
                            <div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="$pic" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#">$title</a> </h4>
        <hr>
        <h4 class="">$$price</h4>

    <div class="ratings">
     
        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>
          
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

   
    <form method="post">
        <div class="form-group">
            <input type="submit" name="addcart" class="btn btn-primary" value="ADD TO CART">
        </div>
EOF;                       
echo $res; 
        
       if(isset($_POST['addcart'])){
     $sub_id = $_SESSION['user_id'];
  
    
    $quantity = 3;
$sqlo = "INSERT INTO checkout values(?,?,?,?)" ;
$q = $pdo->prepare($sqlo);
$q->execute(array($title,$price,$quantity,$sub_id)); 



} 
$reso = <<<EOC

    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->

EOC;                       
echo $reso;     
                        }
                        
                        ?>

   
        <hr>



<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>


    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">
       <h3>2 Reviews From </h3>
         <?php 
              
                      $sqll = $pdo->prepare('SELECT * from review where produit_id=?');
                      $sqll->execute(array($id));
                      while($item = $sqll->fetch()) 
                        {   
                                    
                            $rating = $item['rating'];
                            $name = $item['name'];
                            $email = $item['email'];
                            $test = <<<EKK
                             <hr>
     <div class="row">
            <div class="col-md-12">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                $name
                <span class="pull-right">12 days ago</span>
                <p>$rating </p>
            </div>
        </div>
EKK;                       echo $test;   
                        }
                        
                ?>
        
    </div>
    <div class="col-md-6">
        <h3>Add A review</h3>
<?php $form= <<<EKC
<form  action="item.php?id=$id" class="form-inline" method="post">
EKC;    
echo $form;
?>
     
        <div class="form-group">
            <label for="">Name</label>
                <input type="text" name="name" class="form-control" >
            </div>
             <div class="form-group">
            <label for="">Email</label>
                <input type="test" name="email" class="form-control">
            </div>

        <div>
            <h3>Your Rating</h3>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
        </div>

            <br>
            
             <div class="form-group">
             <textarea name="rating" id="" cols="60" rows="10" class="form-control"></textarea>
            </div>

             <br>
              <br>
            <div class="form-group">
                <input type="submit" name="review" class="btn btn-primary" value="SUBMIT">
            </div>
            <?php
    
    if(isset($_POST['review']))
    {
    $review_id = $id;
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $email = $_POST['email'];
    
    $sqll = 'INSERT INTO review (name,email,rating,produit_id) VALUES (?,?,?,?)';
    $q = $pdo->prepare($sqll);  
    $q->execute(array($name,$email,$rating,$review_id)); 
    }
?>
        </form>

    </div>


    

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>

</div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
