<?php

// function search_display($category, $dbConn, $search = null) {
//     if ($search === null) {
//         $sql = "SELECT * FROM event_table WHERE category_id = ".$category.";";
//         $stmt = $dbConn->query($sql);
//         while($row2 = $stmt->fetch()) {
//             echo $row2[1];
//             echo $row2["event_name"];
//         }
//     } else {
//         $stmt_search = $dbConn->prepare("SELECT * FROM event_table WHERE category_id = ? and (event_name LIKE ? or short_description LIKE ? or address LIKE ?);");
        
//         if(!$stmt_search->execute([$category, $search, $search, $search])) {
//             search_display($category, $dbConn);
//         }

//         while ($row2 = $stmt_search->fetch()) {
//             echo $row2["event_name"];
//         }
//     }
// }

function search_display($check, $db, $search = null, $type_sort = null, $order_by = null) {
    if ($search == null) {
        echo "not input";
        $sql = "SELECT * FROM event_table WHERE category_id = ".$check.";";
        $stmt = $db->query($sql);
        while($row2 = $stmt->fetch()) {
            print_event($row2);
        }
    } else {
        //$stmt_search = $db->prepare("SELECT * FROM event_table WHERE category_id = ? and (event_nameLIKE LIKE '%?%' or short_description LIKE '%?%'or address LIKE '%?%');");
        $stmt_search = $db->prepare("SELECT * 
        FROM event_table 
        WHERE category_id = ? and ((event_name LIKE '%' || ? || '%' and not short_description LIKE '%' || ? || '%') 
        or (short_description LIKE '%' || ? || '%' and not event_name LIKE '%' || ? || '%') 
        or (address LIKE '%' || ? || '%' and not short_description LIKE '%' || ? || '%')
        or (short_description LIKE '%' || ? || '%' and not address LIKE '%' || ? || '%') 
        or (event_name LIKE '%' || ? || '%' and not address LIKE '%' || ? || '%') 
        or (address LIKE '%' || ? || '%' and not event_name LIKE '%' || ? || '%'));");
        if(!$stmt_search->execute([$check, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search]) or !$stmt_search->fetch()) {
            echo "searched for nothing";
            $sql = "SELECT * FROM event_table WHERE category_id = ".$check.";";
            $stmt = $db->query($sql);
            while($row2 = $stmt->fetch()) {
                print_event($row2);
            }
        }
        $stmt_search->execute([$check, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search, $search]);
        echo "searched";
        while ($row2 = $stmt_search->fetch()) {
            print_event($row2);
        }
    }
}

function print_event($row2) {
    $event_name = $row2["event_name"];
    $description = $row2["short_description"];
    $time_of_event = $row2["time_of_event"];
    $address = $row2["address"];
    echo "<div class='item'>";
    echo $event_name;
    echo $description;
    echo $time_of_event;
    echo $address;
    echo "<form action='ticket_category.php' method='POST'>";
    echo "<button name='event'>View Event</button>";
    echo "</form>";
    echo "</div>";
}