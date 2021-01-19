<nav>
  <ul>
  <?php
    foreach($routes as $key=>$value){
    ?>
      <li><a href="?p=<?php echo $key; ?>"><?php echo $value; ?></a></li>
    <?php
    }
  ?>
  </ul>
</nav>