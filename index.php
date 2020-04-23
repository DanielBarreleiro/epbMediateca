<?php require 'config/config.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>epbMediateca</title>
    <link href="css/uikit.css" rel="stylesheet" type="text/css" />
	  <link href="css/master.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <?php include 'includes/header.php'; ?>
  <body>
    <div class="sidebar uk-align-left">
      <hr class="sidetop">
      <ul>
        <li><a href="#">Categorias</a></li>
      </ul>
    </div>
    <div class="catalogo uk-align-right">
      <hr class="top">
      <p class="p18" >Categorias</p>
      <div class="uk-margin">
        <div class="uk-search uk-search-default">
          <div class="uk-search">
            <span uk-search-icon></span>
            <input id="catInput" class="uk-search-input" type="search" placeholder="Pesquisar...">
          </div>
          <button type="submit" name="button" class="uk-button uk-button-primary" onclick="catSearch()" >Pesquisar</button>
          <button type="submit" name="button" class="uk-button uk-button-secondary" onclick="catClear()" >Limpar Filtros</button>
        </div>
      </div>
      <!--START Category items-->
      <div id="catDiv" style="margin-left: 5%;">
        <section class="itemCategoria">
          <a href="cat/Informática"><img class="imgcatalogo" src="img/informatica.svg" alt="tech">
          <p class="p18">Informática</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/TecnologiasAdministrativas"><img class="imgcatalogo" src="img/notfound.svg" alt="tech">
          <p class="p18">Tecnologias Administrativas</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/DesignGráfico"><img class="imgcatalogo" src="img/design.svg" alt="tech">
          <p class="p18">Design Gráfico</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/ConstruçãoCivil"><img class="imgcatalogo" src="img/construcao_civil.svg" alt="tech">
          <p class="p18">Construção Civil</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/ContabilidadeeGestão"><img class="imgcatalogo" src="img/contabilidade_gestao.svg" alt="tech">
          <p class="p18">Contabilidade e Gestão</p></a>
        </section>
        <span id="seeMore"></span>
        <style>
          #more {display: none;}
        </style>
        <span id="more">
        <section class="itemCategoria">
          <a href="cat/Biologia"><img class="imgcatalogo" src="img/biologia.svg" alt="tech">
          <p class="p18">Biologia</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Direito"><img class="imgcatalogo" src="img/direito.svg" alt="tech">
          <p class="p18">Direito</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/EducaçãoInformação"><img class="imgcatalogo" src="img/notfound.svg" alt="tech">
          <p class="p18">Educação Informação</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Eletrónica"><img class="imgcatalogo" src="img/eletronica.svg" alt="tech">
          <p class="p18">Eletrónica</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Física-Química"><img class="imgcatalogo" src="img/fisica_quimica.svg" alt="tech">
          <p class="p18">Física-Química</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Línguas"><img class="imgcatalogo" src="img/linguas.svg" alt="tech">
          <p class="p18">Línguas</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Marketing"><img class="imgcatalogo" src="img/marketing.svg" alt="tech">
          <p class="p18">Marketing</p></a>
        </section>
        <section class="itemCategoria">
          <a href="cat/Matemática"><img class="imgcatalogo" src="img/matematica.svg" alt="tech">
          <p class="p18">Matemática</p></a>
        </section>
        </span>
        <!--END Category items-->
        <!--START see more button-->
        <section class="itemCategoria">
          <!--START script para botão "mostrar mais"/"mostrar menos"-->
          <script>
            function showMore() {
              var seeMore = document.getElementById("seeMore");
              var moreText = document.getElementById("more");
              var btnText = document.getElementById("myBtn");

              if (seeMore.style.display === "none") {
                seeMore.style.display = "inline";
                btnText.innerHTML = "Ver mais";
                moreText.style.display = "none";
              } else {
                seeMore.style.display = "none";
                btnText.innerHTML = "Ver menos";
                moreText.style.display = "inline";
              }
            }
          </script>
          <!--END script para botão "mostrar mais"/"mostrar menos"-->
          <button onclick="showMore()" id="myBtn" class="uk-button uk-button-primary itemCategoriaButton" >Ver mais</button>
        </section>
        <!--END see more button-->
        <!--START script botão para pesquisa de categorias-->
        <script>
          function catSearch() {
            if (seeMore.style.display != "none") {
              showMore();
            }
            var input, filter, div, section, p, i, txtValue;
            input = document.getElementById("catInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("catDiv");
            section = div.getElementsByTagName("section");
            for (i = 0; i < section.length; i++) {
              p = section[i].getElementsByTagName("p")[0];
              txtValue = p.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                section[i].style.display = "";
              } else {
                section[i].style.display = "none";
              }
            }
          }
        </script>
        <!--END script botão para pesquisa de categorias-->
        <!--START script botão para limpar filtros | dificuldade-->
        <script>
          function catClear() {
            document.getElementById("catInput").value = '';
            var seeMore = document.getElementById("seeMore");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");
            if (seeMore.style.display === "none") {
              seeMore.style.display = "inline";
              btnText.innerHTML = "Ver mais";
              moreText.style.display = "none";
            }
            var input, filter, div, section, p, i, txtValue;
            input = document.getElementById("catInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("catDiv");
            section = div.getElementsByTagName("section");
            for (i = 0; i < section.length; i++) {
              p = section[i].getElementsByTagName("p")[0];
              txtValue = p.textContent || p.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                section[i].style.display = "";
              } else {
                section[i].style.display = "none";
              }
            }
          }
        </script>
        <!--END script botão para limpar filtros-->
      </div>
      <!--END Category-->
    </div>
    <!--<div class="catalogo uk-align-right">
      <hr class="top">
      <p>CD'S / DVD'S</p>
      <div class="uk-margin">
        <form class="uk-search uk-search-default" method="post">
          <div class="uk-search">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" placeholder="Pesquisar...">
          </div>
          <button type="submit" name="button" class="uk-button uk-button-primary">Pesquisar</button>
        </form>
      </div>
    </div>
    <footer>
      <div class="uk-container uk-container-small">
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="linkedin"></a>
        <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="youtube"></a>
      </div>
    </footer>-->
  </body>
</html>
