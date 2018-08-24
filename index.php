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
          <li class="nav-item"><a href="#page1" class="active nav-link" id="page1-link">Page 1</a></li>
          <li class="nav-item"><a href="#page2" class="nav-link" id="page2-link">Page 2</a></li>
          <li class="nav-item"><a href="#page3" class="nav-link" id="page3-link">Page 3</a></li>
        </ul>
      </div>
    </nav>
  </header>
  <div id="main-content" class="container">
    <section id="page1">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form id="data-form">
              <div class="form-group">
                <label for="dec">Número decimal:</label>
                <input id="dec" class="form-control" name="dec" type="text" autocomplete="off">
              </div>
              <input id="send"class="btn btn-primary" type="submit" value="send">
          </form>
          <table>
          <thead>
            <tr>
              <th>Decimal</th>
              <th>Binário</th>
            </tr>
          </thead>
          <tbody id="table-content">
          </tbody>
          </table>
        <ul id="demo">
        </ul>
        </div>
      </div>
    </section>
    <section id="page2">
      <p>teste 2</p>
    </section>
    <section id="page3">
      <p>teste 3</p>
    </section>
  </div>
  
</div>
</body>
</html>
