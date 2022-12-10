<?php
    include("controlador/mainController.php");
   
    if(isset($_GET['color'])){
      $cont  = new mainController();
      $articulos= $cont->getData($_GET['color']);
      $cont->setFile($articulos);

      $table="";
      foreach (json_decode($articulos) as $value) {
        $table.="<tr>";
        $table.=" <td>".$value->id."</td>";
        $table.=" <td>".$value->type."</td>";
        $table.=" <td>".$value->color."</td>";
        $table.="</tr>";
      }
    }

    

?>
<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Practica 1</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

    <form class="was-validated form-style"  method="get">
      <div class="clo-lg-6 col-md-6 mb-6">
        <div class="form-group">
          <select class="custom-select" name="color" required>
            <option value="">Selecciona un color</option>
            <option value="red" <?php echo (isset($_GET['color']) && $_GET['color'] == "red") ? 'Selected' : '';?>>Red</option>
            <option value="green" <?php echo ((isset($_GET['color']) && $_GET['color'] == "green") || !isset($_GET['color'])) ? 'Selected' : '';?>>Green</option>
            <option value="blue" <?php echo (isset($_GET['color']) && $_GET['color'] == "blue") ? 'Selected' : '';?>>Blue</option>
            <option value="brown" <?php echo (isset($_GET['color']) && $_GET['color'] == "brown") ? 'Selected' : '';?>>Brown</option>
          </select>
          <div class="invalid-feedback">Debes elegir un color</div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Generar datos</button>
      </div>
    </form>

    <?php if(isset($_GET['color'])){?>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">tipo</th>
            <th scope="col">color</th>
          </tr>
        </thead>
        <tbody>
          <?php echo $table;?>
        </tbody>
      </table>
    <?php }?>

  </body>
</html>