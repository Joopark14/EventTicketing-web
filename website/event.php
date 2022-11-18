<?php
    include "navigation.php";
    include "./functions/pdo.php";
    include "./functions/event_func/search.php";
    $check = $_POST["event_cat"];

    //Gets the possible categories from the database. And checks if the user got here the right way
    $get_categories = "SELECT category_id FROM category_table;";
    $possible = $db->query($get_categories);
    $data = array();
    while($row1 = $possible->fetch()){
        $data[] = $row1['category_id'];
    }
    if(!in_array($check, $data)){
        //header("location: index.php?error=didYouGetLost");
    }
?>

    <div>
        <form method="POST">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="event_cat" value=<?= $_POST["event_cat"];?>>Search!</button>
        </form>
    </div>

    <h1>Events</h1>
    <div>
    <?php
        // $sql = "SELECT * FROM event_table WHERE category_id = ".$check.";";
        // $stmt = $db->query($sql);
        // while($row = $stmt->fetch()) {
        //     echo $row[1];
        //     echo $row["event_name"];
        // }

        // echo $_POST["event_cat"];
    ?>

    <br><br><br><br>
    </div>
    <div>
        <?php
            if (isset($_POST["search"])) {
                $search = $_POST["search"];
            } else {
                $search = null;
            }
            if ($search == null) {
                echo "not input";
                $sql = "SELECT * FROM event_table WHERE category_id = ".$check.";";
                $stmt = $db->query($sql);
                while($row2 = $stmt->fetch()) {
                    //echo $row2[1];
                    echo $row2["event_name"];
                }
            } else {
                //$stmt_search = $db->prepare("SELECT * FROM event_table WHERE category_id = ? and (event_nameLIKE LIKE '%?%' or short_description LIKE '%?%'or address LIKE '%?%');");
                $stmt_search = $db->prepare("SELECT * FROM event_table WHERE category_id = ? and (event_name LIKE '%' || ? || '%' or short_description LIKE '%' || ? || '%'or address LIKE '%' || ? || '%');");
                if(!$stmt_search->execute([$check, $search, $search, $search]) or !$stmt_search->fetch()) {
                    echo "searched for nothing";
                    $sql = "SELECT * FROM event_table WHERE category_id = ".$check.";";
                    $stmt = $db->query($sql);
                    while($row2 = $stmt->fetch()) {
                        echo $row2[1];
                        echo $row2["event_name"];
                    }
                }
                $stmt_search->execute([$check, $search, $search, $search]);
                while ($row2 = $stmt_search->fetch()) {
                    echo $row2["event_name"];
                }
            }
            
        ?>
    </div>
        
    <form action="display_form">
    
</form>
</body>
</html>