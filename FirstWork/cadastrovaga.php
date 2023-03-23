<?php 

require 'php/config.php';
require 'php/Vaga.php';

if($_SERVER['REQUEST_METHOD'] === 'POST')
{

  $vaga = new vaga($mysql);
  $vaga->adicionar($_POST["Cargo"],$_POST["Salario"],$_POST["Carga_horaria"],$_POST["Requisitos"]
  ,$_POST["Categoria"]);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First work</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/cadastroVagaStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg"></div>        



<section class="page-section" id="vaga">
    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-22 col-14 mb-5">
                <h2 class="tm-text-primary text-center mb-5">Cadastro de vaga</h2>

                <div id="alertBox">
                 
                </div>


                 <form id="vagaForm"  method="POST" action="php/Vaga.php" class="tm-contact-form mx-auto">


                 <div class="form-group">
                         <input class="form-control" id="Cargo" name="Cargo" type="text" placeholder="Informe o Cargo"
                        data-sb-validations="required" />
                         <div class="invalid-feedback">O Cargo é requirida.</div>
                 </div>
                 
                 <div class="form-group">
                         <input class="form-control" id="Salario" name="Salario" type="number" placeholder="Informe o Salario"
                        data-sb-validations="required" />
                         <div class="invalid-feedback">O Salario é requirida.</div>
                 </div>

                 <div class="form-group">
                         <input class="form-control" id="carga_horaria" name="Carga_horaria" type="text" placeholder="Informe a Carga Horaria"
                        data-sb-validations="required" />
                         <div class="invalid-feedback">A Carga Horaria é requirida.</div>
                 </div>

                 
                 <div class="form-group">
                         <input textarea rows="8"class="form-control" id="Requisitos"  name="Requisitos" type="message"  placeholder="Requisitos para a vaga " 
                        data-sb-validations="required" />
                         <div class="invalid-feedback">Requisitos para a vaga. </textarea></div>
                 </div>

                 <div class="form-group">
                         <input textarea rows="8"class="form-control" id="Categoria"  name="Categoria" type="message"  placeholder="Categoria da vaga  " 
                        data-sb-validations="required" />
                         <div class="invalid-feedback">Categoria da vaga. </textarea></div>
                 </div>
                 </Br>
                    

                     
                     <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase"  type="submit">Cadastrar <i class="fa fa-check" aria-hidden="true"></i></button></div>
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