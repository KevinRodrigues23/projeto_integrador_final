<?php include_once('./php/agency.crud.php'); ?>
<?php foreach (listaUsuario() as $usuario) : ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Work</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <style>

.personal-image{
 margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.wrapper{
  min-height: 100vh;
  width: 100%;
  max-width: 550px;
  text-align: center;
  right: auto;
  background: #fff;
  border-radius: 15px;
  padding: 25px;
  box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
}

.img3-logo{
  width: 120px;
  height: 120px;
  background: purple;
  border-radius: 50%;
  position: relative;
  top: -70px;
  left: 190px;
}
.img3-logo{
  width: 120px;
  padding: 10px;
}

h3{
  margin-top: -50px;
  color: #1da1f2;
}
p{
  margin-top: 5px;
}
.media-info{
  margin-top: 10px;
}

i{
  border-radius: 50%;
  width: 22px;
  height: 22px;
}

.btn{
  margin-top: 40px;
}

button{
  margin: 20px;
  width: 180px;
  height: 50px;
  border: none;
  padding: 10px;
  outline: none;
  color: white;
  cursor: pointer;
  font-weight: 600;
  border-radius: 30px;
  box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.25);
}

.btn button:first-child{
  background: #1da1f2;
}
.btn button:last-child{
  background: #1da1f2;
}
.btn button:first-child:hover{
  background: transparent;
  border: 1px solid #1da1f2;
  color: #1da1f2;
}
.btn button:last-child:hover{
  background: transparent;
  border: 1px solid #1da1f2;
  color: blueviolet;
}

    </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="./img/logotipo.png" width="200px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <a class="nav-link nav-link-1" aria-current="page" href="index.php">Categorias</a>
        </li>
        <li class="nav-item">
                <a class="nav-link nav-link-3" href="about.php">Sobre</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link nav-link-4" href="contact.php">Contato</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link nav-link-4 active" href="cadastro.php">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-4" href="cadastrovaga.php">Cadastro de vagas</a>
            </li>
        </ul>
        </div>
    </div>
</nav>
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg" ></div>
    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h1 class="col-12 tm-text-primary">
                Perfil
            </h1>

         <div>
              <br/>
              <br/>
              <br/> 
          </div>
            <link rel="stylesheet" href="style.css">
    <link rel="preconnect"
        href="https://fonts.gstatic.com">
    <link href=
"https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap"
        rel="stylesheet">
</head>
 
<body>
            <div class="personal-image">
                <div class="wrapper">
                    <div class="img3-logo">
                      <img src="pic/Logo.png">
                    </div>
                    <h3><?= $usuario->nome ?></h3>
                        <p><?= $usuario->formacao ?> <br>
                            <?= $usuario->descr ?> <br>
                            <?= $usuario->telefone ?> <br>
                            <?= $usuario->Data_nascimento ?> <br>
                            <?= $usuario->Estado ?> <br>
                            <?= $usuario->email ?> <br>
                            <?= $usuario->descr ?> <br>
                            <?= $usuario->rede_social ?>
                    
                        
                    
      <section class="page-section" id="usuario">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"></h2>
                    
                    <?php if($_GET) : ?>
                    <h3 class="section-subheading text-danger"><strong></strong></h3>
                    <?php endif; ?>
                </div>
                <table class="table table-stripped" style="color: black;">
           
                  
                        
                    <?php if($_GET) : ?>
                        <tfoot>
                            <tr>
                                <?php if(isset($_GET['error'])): ?>
                                    <td colspan="5"><h3 style="font-size: small;" class="text-danger"><strong>Ocoreu um erro ao tentar cadastrar/apagar no banco.</strong></h3></td>
                                <?php elseif(isset($_GET['success'])): ?>
                                    <td colspan="5"><h3 style="font-size: small;" class="text-success"><strong>Gravado/Apagado com sucesso do banco.</strong></h3></td>
                                <?php endif; ?>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>
            </div>
        </section>
                        
                    <div class="btn">
                      <button>Message</button>
                      <button>Follow</button>
                    </div>
                  </div>
            </div>
            <div>
               <br/>
               <br/>
               <br/>  
            </div>
  </body>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <br/>
                    <br/>
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Sobre o First Work</h3>
                    <p>Estamos Construindo essa plataforma que vai auxiliar jovens inexperientes a ingressar no mercado de trabalho</p>
                </div>
                <!-- 
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> -->
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
</body>
</html>
<?php endforeach; ?>