<?php
include "connectDB.php";
$consulta4 = "SELECT count(*) FROM information_schema.tables where table_schema='qRqbwVn75h';";
$consulta3 = "SELECT table_name FROM information_schema.tables where table_schema='qRqbwVn75h';";
 echo '<script>';
 echo 'var tables=new Array();';
 echo '</script>';
  if($resultado = $enlace->query($consulta4)) {
  
        while($row = $resultado->fetch_array()) {
 
          $tablenum = $row[0];
        // echo json_encode($tablenum);
        echo '<script>';
        echo 'var tablenum = ' . json_encode($tablenum) . ';';
        echo '</script>';
        }
        $resultado->close();
      }
      if($resultado = $enlace->query($consulta3)) {
  
        while($row = $resultado->fetch_array()) {
 
          $tables = $row[0];
       //  echo json_encode($tables)."<br>";
        
        echo '<script>';
       
        echo 'tables.push(' . json_encode($tables) . ');';
        echo '</script>';
        }
        $resultado->close();
      }
      $enlace->close();
 

?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" type="text/css" href="main.css">
      <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Plantilla">
      <meta name="keywords" content="HTML,CSS,PHP,SQL,Palntilla">
      <meta name="author" content="Costas Carles & Jordi Plà">
   </head>
   <body>
   	 <div class="browser">
       <script src="header.js"></script>
      <script src="navbar.js"></script>
      <section>
        <div class="form-style-5">
      <form>
<select name="action" >
  <optgroup label="Action" id="act">
  <script type="text/javascript">                
      for(var i=0;i<tablenum;i++){
            var opt = document.createElement("option"); //input element, text
            opt.value = tables[i];
             opt.innerHTML = tables[i];
            document.getElementsByTagName('optgroup')[0].appendChild(opt);
          }
  </script>
</optgroup>
  </select>
        <?php
include "connectDB.php";

$consulta = "SELECT count(*) FROM information_schema.columns WHERE table_name = 'users'";
$consulta2 = "SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name = 'users'";
 echo '<script>';
 echo 'var colNames=new Array();';
 echo '</script>';
      if($resultado = $enlace->query($consulta)) {
  
        while($row = $resultado->fetch_array()) {
 
          $colNum = $row[0];
        // echo json_encode($colNum);
        echo '<script>';
        echo 'var col = ' . json_encode($colNum) . ';';
        echo '</script>';
        }
        $resultado->close();
      }
       if($resultado = $enlace->query($consulta2)) {
  
        while($row = $resultado->fetch_array()) {
 
          $colNanmes = $row[0];
         // echo json_encode($colNanmes)."<br>";
        
        echo '<script>';
       
        echo 'colNames.push(' . json_encode($colNanmes) . ');';
        echo '</script>';
        }
        $resultado->close();
      }
      $enlace->close();
 

?>
        <script type="text/javascript"> 
              
          for(var i=0;i<col;i++){
            var input = document.createElement("input"); //input element, text
            input.setAttribute('type',"text");
            input.setAttribute('name',i);
            input.setAttribute('id',i);
           input.setAttribute('placeholder',colNames[i])
            document.getElementsByTagName('form')[0].appendChild(input);
          }
        </script>
         <input type="submit" value="Submit">
      </form>
    </div>
	    </section>
      <script src="footer.js"></script>
    </div>

</body>
</html>
