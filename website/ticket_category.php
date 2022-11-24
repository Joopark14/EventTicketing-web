<?php
include "navigation.php";
include "./functions/pdo.php";

?>
<link rel="stylesheet" href="./styles/ticket.css">

<div class="container">
        <?php
          
        $sql = "SELECT * FROM ticket_category_table WHERE event_id = ".$_POST["event"].";";
       // $sql2 = "SELECT * FROM event_table WHERE event_id = ".$_POST["event"].";";
        $stmt = $db->query($sql);
       // $stmt2 = $db->query($sql2);

        while ($row = $stmt->fetch()){ ?>
             <div class="left-container">
                  <h3 class="text"><?=$row[0];?></h3>
                  <h3 class="text"><?=$row[1];?></h3>
                  <h3 class="text"><?=$row[2];?></h3>
                  <h3 class="text"><?=$row[3];?></h3>
                  <form action="./functions/buy_ticket_finction.php" method="POST">
                    <input type="hidden" value="<?= $row[0];?>" name="add_to_cart">
                    <button type="submit" name="event" value="<?php $_POST["event"];?>">ADD TO CART</button>
                  </form>
             </div>
        <?php
        }
        ?>
</div>
