<?php include_once('correios.class.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Validação do WebService dos Correios</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="app.css">

    <script src="app.js"></script>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Validação do WebService dos Correios</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form nav navbar-nav navbar-right" method="POST" action="valida.php">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Insira o CEP de destino" name="cepDestino">
                  </div>
                  <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-md-12">

        <?php

        $correios = new Correios;

        ?>


        
        <h3>Pesquisa retornando dados do cep <?php $correios->RetornoCep(); ?></h3>

        <table class='table'>
          <thead>
            <tr>
              <th>Código</th>
              <th>Prazo</th>
              <th>Entrega Domiciliar</th>
              <th>Entrega Sábado</th>
            </tr>
          </thead>
          <tbody>
              <?php $correios->Exibe(); ?>
          </tbody>
        </table>

        </div>

      </div>
    </div>

    <div class="container">
      <div class="row">
      <hr>
        <div class="col-lg-12">
          <div class="col-md-8">
            <a href="http://www.atosinternet.com.br/">Criação e desenvolvimento: William carriello</a>    
          </div>
          <div class="col-md-4">
            <p class="muted pull-right">Validação do WebService dos Correios</p>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>