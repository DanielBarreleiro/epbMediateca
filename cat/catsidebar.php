<div class="catsidebar uk-align-left">
  <hr class="catsidetop">
  <ul>
    <li>Catálogo</li>
    <?php

      mysqli_set_charset($con,"utf8");
      $sql = "SELECT * FROM tblcategory";
      $consulta = mysqli_query($con, $sql);
      if( !$consulta ){
          echo "Erro ao carregar as categorias.";
          exit;
      }
      $cnt = 1;
      while( $dados = mysqli_fetch_assoc($consulta) ){
        $dir = $dados['CategoryName'];
        $dir = str_replace(' ', '', $dir);
        echo "<li><a href='/cat/" . $dir . "'>" . $dados['CategoryName'] . "</a></li>";
      }

    ?>
  </ul>
</div>
