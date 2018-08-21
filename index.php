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
  <script src="./js/ajax_nav.js"></script>
<script src="./js/app.js"></script>
</head>
<body>

<div>
  <h2>Ajax content Manipulation</h2>
  <!-- <button type="button" onclick="loadDoc()">Change Content</button> -->
  <header>
    <nav>
      <ul>
        <li><a href="#page1" class="active" id="page1-link">Page 1</a></li>
        <li><a href="#page2" id="page2-link">Page 2</a></li>
        <li><a href="#page3" id="page3-link">Page 3</a></li>
      </ul>
    </nav>
  </header>
  <div id="main-content">
    <section id="page1">
      <form id="data-form">
        <input id="dec" name="dec" type="text">
        <input id="send" type="submit" value="send">
      </form>
      <ul id="demo">
      </ul>
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
