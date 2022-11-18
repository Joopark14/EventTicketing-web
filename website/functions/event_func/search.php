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

