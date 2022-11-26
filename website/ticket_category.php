<?php
include "navigation.php";
include "./functions/pdo.php";

?>
<link rel="stylesheet" href="./styles/ticket.css">

<div class="container">
     <?php

     $sql = "SELECT * FROM ticket_category_table WHERE event_id = " . $_GET["event"] . ";";
     $stmt = $db->query($sql);

     while ($row = $stmt->fetch()) { ?>
          <div class="left-container">
               <form action="./functions/buy_ticket_finction.php" method="GET">
                    <h3 class="text"><?= $row[0]; ?></h3>
                    <h3 class="text"><?= $row[1]; ?></h3>
                    <h3 class="text"><?= $row[2]; ?></h3>
                    <h3 class="text"><?= $row[3]; ?></h3>
                    <input type="hidden" value="<?= $row[0]; ?>" name="cart_id">
                    <button type="submit" name="add_to_cart" value="<?php $row[1]; ?>">ADD TO CART</button>
               </form>
          </div>
     <?php
     }
     ?>
</div>