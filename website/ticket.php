<?php
include "navigation.php";
include "./functions/pdo.php";

?>

<link rel="stylesheet" href="./styles/ticket.css">

<section class="ticket">
    <?php
    $sql = "SELECT * FROM ticket_category_table WHERE event_id = " . $_POST["event_cat"] . ";";
    $stmt = $db->query($sql);
    $lastid = null;
    while ($row = $stmt->fetch()) {
        echo "<div class='ticket-container'>";
        echo "<form action='??????' method='post'>";
        echo "<p class='text'>$row[0]</p>";
        echo "<p class='text'>$row[1]</p>";
        echo "<p class='text'>$row[2]</p>";
        echo "<p class='text'>$row[3]</p>";
        echo "<p class='text'>$row[4]</p>";
        echo '</form> </div>';
    }
    ?>

    <!-- <button type="submit" name="check_out">check_out</button> -->

</section>

<div>


</div>


</body>

</html>