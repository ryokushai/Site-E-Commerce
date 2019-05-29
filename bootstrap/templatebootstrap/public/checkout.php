<?php session_start();
if(!isset($_SESSION['user_role']))
{
    header("Location: index.php");
}else
   {
    if($_SESSION['user_role'] !== 'Subscriber')
{
header("Location: index.php");
} 
   }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

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

<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>

<form>
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php
             require '../ressources/config.php';
             $pdo = Database::connect();
             $sub_id = $_SESSION['user_id'];
             $ct = 1;
             $sql=$pdo->prepare('SELECT * from checkout 
     where sub_id=? GROUP BY product');
                        $sql->execute(array($sub_id));
                        while($item = $sql->fetch()) 
                        {

                           $Product = $item['product'];
                           $Price = $item['price'];
                           
                           

$resu=<<<EOF
            <tr>
                <td>$Product</td>
                <td>$$Price</td>
EOF;
echo $resu;           

            
$sqlO=$pdo->prepare('SELECT count(*) as summ from checkout where sub_id=? and product=?');
                        $sqlO->execute(array($sub_id,$Product));
                        while($item = $sqlO->fetch())
                        {
$Quantity = $item['summ'];

$ros=<<<EOC

            <td>$Quantity</td>
EOC;
echo $ros;  
}
$sqli=$pdo->prepare('SELECT sum(price) as summ from checkout where sub_id=? and product=?');
                        $sqli->execute(array($sub_id,$Product));
                        while($item = $sqli->fetch())
                        {
$summ = ROUND($item['summ'], 2);

$roos=<<<EOC
                <td>$$summ</td>
            </tr>
EOC;
echo $roos;  
}
}
            ?>    
                

                        
            

            
        </tbody>
    </table>
</form>
<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">

</span> <?php  $cnt =$pdo->prepare('SELECT count(*) as test from checkout where sub_id=?');
             $cnt->execute(array($sub_id));
             while($item = $cnt->fetch())
             {
                $nb = $item['test'];
             }
             echo $nb;
              ?></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">$
    <?php  $so =$pdo->prepare('SELECT sum(price) as test from checkout where sub_id=?');
             $so->execute(array($sub_id));
             while($item = $so->fetch())
             {
                $num = $item['test'];
                $sum = ROUND($num, 2);
             }
             echo $sum;
              ?></span></strong></td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->


           <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2030</p>
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