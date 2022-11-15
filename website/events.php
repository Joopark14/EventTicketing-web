<?php
    include "navigation.php";
    include "./functions/pdo.php";
    $check = $_POST["event_cat"];

    //Gets the possible categories from the database. And checks if the user got here the right way
    $get_categories = "SELECT category_name FROM category_table;";
    $possible = $db->query($get_categories);
    $data = array();
    while($row1 = $possible->fetch()){
        $data[] = $row1['category_name'];
    }
    if(!in_array($check, $data)){
        header("location: index.php?error=didYouGetLost");
    }
?>

    <div>
        <form action="search.php" method="POST">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="submit_search">Search!</button>
        </form>
    </div>

    <h1>Events</h1>
    <div>
    <?php
        $sql = "SELECT * FROM event_table;";
        $stmt = $db->query($sql);
        while($row = $stmt->fetch()) {
            echo $row[1];
        }

        echo $_POST["event_cat"];
    ?>
    </div>

</body>
</html>