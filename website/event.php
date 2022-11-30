<?php
    include "navigation.php";
    include "./functions/pdo.php";
    include "./functions/event_func/search.php";
    $check = $_GET["event_cat"];

    //Gets the possible categories from the database. And checks if the user got here the right way
    $get_categories = "SELECT category_id FROM category_table;";
    $cat_name = "SELECT category_name FROM category_table;";
    $cat_name = $db->query($cat_name) -> fetch();
    $category_name = $cat_name[0];
    $possible = $db->query($get_categories);
    $data = array();
    while($row1 = $possible->fetch()){
        $data[] = $row1['category_id'];
    }
    if(!in_array($check, $data)){
        header("location: index.php?error=didYouGetLost");
    }
?>
    <link rel="stylesheet" href="./styles/event.css">

    
    <div class="wraper">
        <h1><?php echo ucfirst($category_name)." Events";?></h1>
        <div class="divider-event"></div>
        <div>
            <div class="search-filter">
                <form method="GET">
                    <input type="text" name="search" placeholder="Search for event, cities, dates..." class="search"<?php if(isset($_GET["search"])){?>value=<?=$_GET["search"]?><?php }?>>
                    <input type="hidden" name="sort_by" value=<?php if(isset($_GET["sort_by"])){?><?= $_GET["sort_by"]?><?php }?>>
                    <input type="hidden" name="order_by" value=<?php if(isset($_GET["order_by"])){?><?= $_GET["order_by"]?><?php }?>>
                    <button type="submit" name="event_cat" value=<?= $_GET["event_cat"];?> class="search-button">Search</button>
                </form>
            </div>
        </div>
        <div class="filter-choice">
            <form method="GET" class="choice">
                <input type="radio" name="sort_by" id="first" value="none" checked>
                <label for="first">None</label>
                <input type="radio" name="sort_by" id="second" value="price"<?php if(isset($_GET["sort_by"]) && $_GET["sort_by"] == "price"){?>checked<?php }?>>
                <label for="second">Price</label>
                <input type="radio" name="sort_by" id="third" value="amount"<?php if(isset($_GET["sort_by"]) && $_GET["sort_by"] == "amount"){?>checked<?php }?>>
                <label for="third">Tickets</label>
                <input type="radio" name="sort_by" id="fourth" value="alph" <?php if(isset($_GET["sort_by"]) && $_GET["sort_by"] == "alph"){?>checked<?php }?>>
                <label for="fourth">A-Z</label>
                <div class="divider-vertical"></div>
                <input type="radio" name="order_by" id="fifth" value="asc" checked >
                <label for="fifth">asc</label>
                <input type="radio" name="order_by" id="sixth" value="desc" <?php if(isset($_GET["order_by"]) && $_GET["order_by"] == "desc"){?>checked<?php }?>>
                <label for="sixth">desc</label>
                <input type="hidden" name="search" value=<?php if(isset($_GET["search"])){?><?=$_GET["search"]?><?php }?>>
                <button type="submit" name="event_cat" value="<?= $_GET["event_cat"];?>" class="filter-button">Sort by</button>
            </form>
        </div>
        
        <div class="divider-event"></div>
            <?php
            if (isset($_GET["search"])) {
                $search = $_GET["search"];
            } else {
                $search = null;
            }
            if (isset($_GET["sort_by"]) && isset($_GET["order_by"])) {
                search_display($check, $db, $search, $_GET["sort_by"], $_GET["order_by"]);        
            } else {
                search_display($check, $db, $search);
            }
        ?>
        <div class="" style="height: 100vh;"></div>
    <div class="" style="height: 100vh;"></div>
    <div class="" style="height: 100vh;"></div>
    </div>
    
</body>
</html>