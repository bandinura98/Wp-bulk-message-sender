<?php

include 'config.php';



$sql = "SELECT * from new_schema.persons where new_schema.persons.personid not in (SELECT new_schema.persons.personid FROM persongroup  INNER JOIN new_schema.persons on  new_schema.persons.personid = persongroup.personid and persongroup.groupid=".$_GET['id'].")";

$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
    // output data of each row
    echo "";
    while($row = $result2->fetch_assoc()) {
    
        echo "<option value= ".$row["personid"].">".$row["name"]."   ".$row["surname"]."   ".$row["phone"]."</option>";
    
    //<button name='submit' type='submit' class='btn btn-primary'><i class='fa fa-plus'></i></button>
    }
} else {
    echo "0 results";
}
echo "</select></div>";

$conn->close();

?>