<?php
include "navigation.php";
include "./functions/pdo.php";

?>

<link rel="stylesheet" href="./styles/ticket.css">

<div class="container">
        <?php
        $sql = "SELECT * FROM ticket_category_table WHERE event_id = ".$_POST["event_cat"].";";
        $stmt = $db->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<div class='left-container'>";
                 echo "<form action='./functions/buy_ticket_finction.php' method='post'>";
                 echo "<h3 class='text'>$row[0]</h3>";
                 echo "<h3 class='text'>$row[1]</h3>";
                 echo "<h3 class='text'>$row[2]</h3>";
                 echo "<h3 class='text'>$row[3]</h3>";
                 echo "<h3 class='text'>$row[4]</h3>";
                 echo "<button type='submit' name='check_out'>____________</button>";
                 echo '</form>';
            echo '</div>';
        }
        ?>
</div>

</body>

</html>