<?php

//1_ sql проверка сколько абонент пользуется услугами
//2_ sql установить максимальную скидку 30%
//3_ sql проверить если сейчас скидка 10% то сделать ему 30% ????


    $conn = new PDO("mysql:host=localhost;dbname=discount", "root", "");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$curr_date_sec = strtotime(date("Y-m-d"));
print '<h2>дата текущая: '.date("Y-m-d"). "</h2><br>";
$sql = 'SELECT * FROM users where max_discount < 30';
foreach ($conn->query($sql) as $row) {
    print 'айди: <b>'. $row['id'] . "</b><br>";
    print 'дата регистрации: <b>'.$row['reg_date'] . "</b><br>";

    $how=floor(($curr_date_sec - strtotime($row['reg_date'])) / (60*60*24*365)) ; // check how long

    print 'разница  в годах : <b>'. $how. "</b><br>";
    print 'скидка : <b>'.$row['discount'] . "</b><br>";
    print 'максимальная скидка : <b>'.$row['max_discount'] . "</b><br>";


    if ($how > 5) {
        print 'скидка будет <b>30</b>';
        print "<br>";
    } else{
        print 'скидка остается <b>10</b>';
        print "<br>";
    }
    echo '<br><hr>'; echo '<br>';
}



$conn = null;