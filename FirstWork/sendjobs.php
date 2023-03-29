
<?php


include 'Artigo.php';
$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>

<?php

include 'config.php';

session_start();


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['register'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass'] );
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `user` WHERE name = ? AND email = ?");
   $select_user->execute([$name, $email]);

   if($select_user->rowCount() > 0){
      $message[] = 'username or email already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `user`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);
         $message[] = 'registered successfully, login now please!';
      }
   }

}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete_cart_item'])){
   $delete_cart_id = $_GET['delete_cart_item'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$delete_cart_id]);
   header('location:index.php');
}

if(isset($_GET['logout'])){
   session_unset();
   session_destroy();
   header('location:index.php');
}

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
      $message[] = 'please login first!';
   }else{

      $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $image = $_POST['image'];
      
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND name = ?");
      $select_cart->execute([$user_id, $name]);

      if($select_cart->rowCount() > 1){
         $message[] = 'already added to cart';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'added to cart!';
      }

   }

}

if(isset($_POST['order'])){

   if($user_id == ''){
      $message[] = 'please login first!';
   }else{
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $address = 'flat no.'.$_POST['flat'].', '.$_POST['street'].' - '.$_POST['pin_code'];
      $address = filter_var($address, FILTER_SANITIZE_STRING);
      $method = $_POST['method'];
      $method = filter_var($method, FILTER_SANITIZE_STRING);
      $total_price = $_POST['total_price'];
      $total_products = $_POST['total_products'];

      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = 1");
      $select_cart->execute([$user_id]);

      if($select_cart->rowCount() > 0){
         $insert_order = $conn->prepare("INSERT INTO `orders`(user_id, name, number, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?)");
         $insert_order->execute([$user_id, $name, $number, $method, $address, $total_products, $total_price]);
         $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
         $delete_cart->execute([$user_id]);
         $message[] = 'order placed successfully!';
      }else{
         $message[] = 'your cart empty!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complete Responsive Pizza Shop Website Design</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   

</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<!-- header section starts  -->

<header class="header">

   <section class="flex">

      <a href="index.php" class="logo"><img src="img/logotipo.png" width="200px" alt=""></a>

      <nav class="navbar">
         <a href="index.php">Início</a>
         <a href="contact.php">Sobre</a>
         
         
         
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="order-btn" class="fas fa-box"></div>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
        
      </div>

   </section>

</header>

<!-- header section ends -->

<div class="user-account">

   <section>

      <div id="close-account"><span>close</span></div>

      <div class="user">
         <?php
            $select_user = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
            $select_user->execute([$user_id]);
            if($select_user->rowCount() > 0){
               while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){
                  echo '<p>welcome ! <span>'.$fetch_user['name'].'</span></p>';
                  echo '<a href="index.php?logout" class="btn">logout</a>';
               }
            }else{
               echo '<p><span>you are not logged in now!</span></p>';
            }
         ?>
      </div>

      <div class="display-orders">
         <?php
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if($select_cart->rowCount() > 0){
               while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                  echo '<p>'.$fetch_cart['name'].' <span>('.$fetch_cart['price'].' x '.$fetch_cart['quantity'].')</span></p>';
               }
            }else{
               echo '<p><span>your cart is empty!</span></p>';
            }
         ?>
      </div>

      <div class="flex">

         <form action="user_login.php" method="post">
            <h3>login now</h3>
            <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
            <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20">
            <input type="submit" value="login now" name="login" class="btn">
         </form>

         <form action="" method="post">
            <h3>register now</h3>
            <input type="text" name="name" oninput="this.value = this.value.replace(/\s/g, '')" required class="box" placeholder="enter your username" maxlength="20">
            <input type="email" name="email" required class="box" placeholder="enter your email" maxlength="50">
            <input type="password" name="pass" required class="box" placeholder="enter your password" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="cpass" required class="box" placeholder="confirm your password" maxlength="20" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="register now" name="register" class="btn">
         </form>

      </div>

   </section>

</div>

<div class="my-orders">

   <section>

      <div id="close-orders"><span>close</span></div>

      <h3 class="title"> my orders </h3>

      <?php
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){   
      ?>
      <div class="box">
         <p> placed on : <span><?= $fetch_orders['placed_on']; ?></span> </p>
         <p> name : <span><?= $fetch_orders['name']; ?></span> </p>
         <p> number : <span><?= $fetch_orders['number']; ?></span> </p>
         <p> address : <span><?= $fetch_orders['address']; ?></span> </p>
         <p> payment method : <span><?= $fetch_orders['method']; ?></span> </p>
         <p> total_orders : <span><?= $fetch_orders['total_products']; ?></span> </p>
         <p> total price : <span>$<?= $fetch_orders['total_price']; ?>/-</span> </p>
         <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">nothing ordered yet!</p>';
      }
      ?>

   </section>

</div>

<div class="shopping-cart">

   <section>

      <div id="close-cart"><span>close</span></div>

      <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
              $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
              $grand_total += $sub_total; 
      ?>
      <div class="box">
         <a href="index.php?delete_cart_item=<?= $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this cart item?');"></a>
         <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
         <div class="content">
          <p> <b><?= $fetch_cart['name']; ?></b> <span>Salário <?= $fetch_cart['price']; ?></span></p>
          <form action="" method="post">
             <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
             <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" onkeypress="if(this.value.length == 2) return false;" disabled>
               <button type="submit" class="fas fa-edit" name="update_qty"></button>
          </form>
         </div>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty"><span>your cart is empty!</span></p>';
      }
      ?>

      <div class="cart-total">Quero me candidata a esta vaga<span><?= $grand_total; ?></span></div>

      <a href="sendjobs.php" class="btn">Quero me candidata</a>

   </section>

</div>

<!--  -->

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg"></div>        



<section class="page-section" id="vaga">
    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-22 col-14 mb-5">
                <h2 class="tm-text-primary text-center mb-5">Cadastro de vaga</h2>

                <div id="alertBox">
                    <?php if($_GET) : ?>
                        <h3 class="section-subheading"><strong>Ocoreu um erro ao tentar cadastrar no banco.</strong></h3>
                    <?php endif; ?>
                </div>


                <form method="POST" action="boxMessage.php">
                <label for="id_boxMessage">ID da mensagem:</label>
                    <div class="form-group">
                        <label for="nome_boxMessage">Nome:</label>
                        <input  class="form-control type="text" name="nome_boxMessage" id="nome_boxMessage">
                    </div>
                    <div class="form-group">
                        <label for="email_boxMessage">E-mail:</label>
                        <input class="form-control" type="email" name="email_boxMessage" id="email_boxMessage">
                    </div>
                    <div class="form-group">
                        <label for="telefone_boxMessage">Telefone:</label>
                        <input class="form-control" type="text" name="telefone_boxMessage" id="telefone_boxMessage">
                    </div>
                        <div class="form-group">
                        <label for="message_boxMessage">Mensagem:</label>
                        <textarea class="form-control" name="message_boxMessage" id="message_boxMessage"></textarea>
                    </div>
                        <button  class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                        </form>      
            </div>
        </div> <!-- container-fluid, tm-container-content -->
    </section>






    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Sobre o First Work</h3>
                    <p>Estamos Construindo essa plataforma que vai auxiliar jovens inexperientes a ingressar no mercado de trabalho</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>

<!-- custom js file link  -->
<script src="js/script.js"></script>





<!-- custom js file link  -->
<script src="js/index.js"></script>

