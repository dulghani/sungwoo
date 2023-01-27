<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>maribelajarcoding.com - Membuat Autocomplete JQuery Database Mysql PHP</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {

    $( "#partnumber" ).autocomplete({
      source: "data.php"
    });
  });
  </script>
</head>
<body>
 
<div class="ui-widget">
  <form method="POST">
    <label >Nama Negara: </label>
    <input type="text" id="partnumber">
  </form>
</div>

</body>
</html>