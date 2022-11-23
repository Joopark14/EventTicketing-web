<?php

include "navigation.php";
include "./functions/pdo.php";


?>

<link rel="stylesheet" href="./styles/ticket.css">

<div class="container">
        <?php
        $sql = "SELECT * FROM ticket_category_table WHERE event_id = ".$_POST["event_cat"].";";
        $stmt = $db->query($sql);
        while ($row = $stmt->fetch()){ ?>
             <div class="left-container">
                  <form action="./functions/buy_ticket_finction.php" method="post">
                  <h3 class="text"><?=$row[0];?></h3>
                  <h3 class="text"><?=$row[1];?></h3>
                  <h3 class="text"><?=$row[2];?></h3>
                  <h3 class="text"><?=$row[3];?></h3>
                  <h3 class="text"><?=$row[4];?></h3>
                  <button type="submit" value="<?= $row[0]?>" name="add_to_cart">____________</button>
                  </form>
             </div>
        <?php
        }
        ?>
</div>

</body>

</html>