<?php
 $burger = array(
            "musicals" => array("Oklahoma", "The Music Man", "South Pacific"),
            "dramas" => array("Lawrence of Arabia", "To Kill a Mockingbird", "Casablanca"),
            "mysteries" => array("The Maltese Falcon", "Rear Window", "North by Northwest")
 );

foreach ($burger as $key => $values){
    echo strtoupper($key);
    echo "<br>";
    foreach($values as $i => $value){
        echo "- - - -> $ = $value";
        echo "<br>";
    }
}

krsort($burger);
echo "<br><br><b>Sorted Array by Genre </b><br><br>";
foreach ($burger as $key => $values){
    echo strtoupper($key);
    echo "<br>";
    foreach($values as $i => $value){
        echo "- - - -> $i = $value";
        echo "<br>";
    }
}
?> 