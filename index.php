<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="./js/ajax_nav.js"></script>
<script src="./js/app.js"></script>
</head>
<body>

<div>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="#page1" class="active nav-link" id="page1-link">Conversões</a></li>
          <li class="nav-item"><a href="#page2" class="nav-link" id="page2-link">Operações</a></li>
          <li class="nav-item"><a href="#page3" class="nav-link" id="page3-link">Page 3</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <div id="main-content" class="container">
  <!-- CONTEUDO PRIMEIRA PAGINA -->
    <section id="page1">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form id="convert-form">
              <div class="form-group">
                <label for="dec">Número decimal:</label>
                <input id="dec" class="form-control" name="dec" type="text" autocomplete="off">
              </div>
              <input id="send"class="btn btn-primary" type="submit" value="send">
              <button id="clear-json" type="button" class="btn btn-primary">Apagar Tabela</button>
          </form>
          <hr>
          <table class="table">
          <thead>
            <tr>
              <th>Decimal</th>
              <th>Binário</th>
            </tr>
          </thead>
          <tbody id="converter-content">
          </tbody>
          </table>
        <ul id="demo">
        </ul>
        </div>
      </div>
    </section>
    <!-- CONTEUDO SEGUNDA PAGINA -->
    <section id="page2">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form id="operation-form">
            <div class="form-group">
              <label for="first-numb">Primeiro Decimal:</label>
              <input class="form-control" type="text" name="first-numb" id="first-numb">
              <hr>
                <div class="radio">
                  <label><input type="radio" name="optradio" checked>Todas Operações</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Somatória</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Subtração</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Divisão</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="optradio">Multiplicação</label>
                </div>
              <hr>
              <label for="first-numb">Primeiro Decimal:</label>
              <input class="form-control" type="text" name="first-numb" id="first-numb">
            </div>
          </form>
        </div >
    </div>
    <hr>
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th>Primeiro Número</th>
            <th>Operação</th>
            <th>Segundo Número</th>
            <th>Operação</th>
          </tr>
        </thead>
        <tbody id="operations-content"></tbody>
        </table>
    </div>
    </section>
    <!-- CONTEUDO TERCEIRA PAGINA -->
    <section id="page3">
      <p>teste 3</p>
    </section>
  </div>
  
</div>
</body>
</html>
