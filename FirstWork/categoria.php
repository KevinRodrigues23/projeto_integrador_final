<?php

require 'php/config.php';
require 'php/Vaga.php';


$obj_vaga = new vaga($mysql);
$vaga = $obj_vaga->encontrarPorId($_GET['id']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Work</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <!--<div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>-->
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
                    <a class="nav-link nav-link-4 active" href="tipocadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="cadastrovaga.php">Cadastro de vagas</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center conteiner" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" id="input" onkeyup="instantSearch()" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">Photo title goes here</h2>
        </div>
        
        <div class="row mb-3 tm-gallery">

        <!-- php -->
        
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5 item">
                <a href="categoria.php?id=<?php echo $vaga['id_vaga'];?>">
                <figure class="effect-ming tm-video-item">
                    <img src="img/img-01.jpg" alt="Image" class="img-fluid">
                    <div class="d-flex justify-content-between tm-text-white">
                        <h2 ><?php echo $vaga['Cargo'];?></h2>
                        
                        
                    </div>    
                    <div class="d-flex justify-content-between tm-text-white">
                    <input type="time" value="<?php echo $vaga['Carga_horaria'];?>"disabled>
                    <input type="text" value="<?php echo $vaga['Salario'];?>" disabled>
                    
                        
                    </div> 
                        <p><?php echo $vaga['Requisitos'];?></p>         
                        <button><a href="#">View more </a></button>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">16 Oct 2020</span>
                    <span>12,460 views</span>
                </div>
                    </a>
            </div>
        </a>

           

            <!-- fim php -->


            
                    
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5  item">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Sobre o First Work</h3>
                    <p>Estamos Construindo essa plataforma que vai auxiliar jovens inexperientes a ingressar no mercado de trabalho</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5  item">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5  item">
                    <ul class="tm-social-links d-flex justify-content-end pl-0  item">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
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
    <script src="js/index.js">
    function instantSearch() {
  document.querySelectorAll('.item').forEach(item => item.querySelectorAll('h2')[0].innerText.toLowerCase().indexOf(document.querySelector('#input').value.toLowerCase()) > -1 ? item.style.display = 'block' : item.style.display = 'none');
}
</script>
</body>
</html>