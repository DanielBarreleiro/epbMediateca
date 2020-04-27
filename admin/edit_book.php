<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/uikit.css" rel="stylesheet" />
	  <link href="../css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
  </head>
<?php
require '../config/config.php';

if(isset($_GET['bookid']))
{
$id = $_GET['bookid'];
}
?>
  <body>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Editar Livro</p>
      <div class="loginform">
        <h4 class="">Editar Livro</h4>
        <form class="" action="edit_book.php" method="post">
          <!--START TITULO-->
          <?php
            mysqli_set_charset($con, "utf8");
            $data_query = mysqli_query($con, "SELECT BookName, ISBNNumber FROM tblbooks where id = '$id'");
            $data_row = mysqli_fetch_array($data_query);
          ?>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: pencil"></span>
              <input class="uk-input" type="text" placeholder="Título" name="upd_bname" autocomplete="off" uk-tooltip="title: Título do livro; pos: right" value="<?php
              echo $data_row['BookName']; ?>">
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <select class="uk-input uk-select" name="upd_bauth" uk-tooltip="title: Selecione um item da lista; pos: right">
                <option value="<?php echo $data_row['AuthorId']; ?>">Selecionar Autor</option>//talvez remover
                <?php
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * from tblauthors";
                $query = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($query);
                while ($row = mysqli_fetch_assoc($query)) {
                  $AuthorName = $row['AuthorName'];
                  $id = $row['id'];
                  echo "<option value='$id'>$AuthorName </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: folder"></span>
              <select class="uk-input uk-select" name="upd_bcat" uk-tooltip="title: Selecione um item da lista; pos: right" required="required">
                <option value="<?php echo $data_row['CatId']; ?>">f</option>
                <?php
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * from  tblcategory";
                $query = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($query);
                while ($row = mysqli_fetch_assoc($query)) {
                  $CategoryName = $row['CategoryName'];
                  $id = $row['id'];
                  echo "<option value='$id'>$CategoryName </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: tag"></span>
              <input class="uk-input uk-disabled" type="text" placeholder="Referência" name="upd_isbn" uk-tooltip="title: Ex: TECNO003; pos: right" value="<?php
              echo $data_row['ISBNNumber']; ?>">
            </div>
          </div>
          <button type="submit" name="edit_book" class="uk-button uk-button-default uk-button-primary">EDITAR</button>
        </form>
      </div>
      <img class="sideimg" src="../img/profile.svg" alt="">
    </div>
  </body>
</html>
