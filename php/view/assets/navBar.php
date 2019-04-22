<!--Top Header-->
<header class="mdl-layout__header">
  <div class="mdl-layout__header-row mdl-scroll-spy-1">
    <!-- Title -->
    <a href="./"><span class="mdl-layout-title"><?php echo $profileOwner->getFullName();?></span></a>
    <div class="mdl-layout-spacer"></div>
    <ul class="nav mdl-navigation mdl-layout--large-screen-only">
      <li><a class="mdl-navigation__link" data-scroll href="#body">about</a></li>
      <li><a class="mdl-navigation__link" data-scroll href="#references_sec">references</a></li>
      <li><a class="mdl-navigation__link" data-scroll href="#books_sec">Books</a></li>
      <li><a class="mdl-navigation__link" data-scroll href="#skills_sec">skills</a></li>
    </ul>


    <?php
      if(isset($_SESSION['userLogin'])){
    ?>
    <!-- Right aligned menu below button -->
    <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon ver-more-btn">
      <i class="material-icons">more_vert</i>
    </button>
    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
      data-mdl-for="demo-menu-lower-right">
      <li class="mdl-menu__item"><a href="addbook.php"><i class="zmdi zmdi-upload font-blue pr-10"></i>Add book</a></li>

      <li class="mdl-menu__item"><a href="php/controller/logoutHandler.php"><i class="lower pr-10 font-red material-icons">power_settings_new</i>logout</a></li>
    </ul>
    <?php
      }
    ?>
  </div>
</header>
<!--/Top Header-->
