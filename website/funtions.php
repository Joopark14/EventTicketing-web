 

<?php
function call_db($table)
{

    try {
        $array = [];
        $username = "prj1_user";
        $password = "prj1_password";
        $db = new PDO("pgsql:host=db;port=5432;dbname=prj1", $username, $password);
        $sql = "SELECT * from $table";
        foreach ($db->query($sql) as $row) {
            array_push($array, $row["category_name"]);
        }
    } catch (PDOException $e) {
        print('<span class="error">Not working &#128557</span>');
        print('<span>Error message</span>');
        print('<pre class="error">' . $e->getMessage() . '</pre>');
    }
    return $array;
}
