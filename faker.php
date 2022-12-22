<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$table = 'site_web';

$conn = mysqli_connect($host, $user, $pwd, $table);

if (!$conn) {
    die("Erreur de connexion" . mysqli_connect_error());
}

mysqli_query($conn, "TRUNCATE `article` ");
mysqli_query($conn, "TRUNCATE `blog` ");
mysqli_query($conn, "TRUNCATE `carte` ");
mysqli_query($conn, "TRUNCATE `carte_pic` ");

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();
//boucle table : article 
for ($a = 1; $a < 6; $a++) {
    $art = 'INSERT INTO article VALUES(
        ' . $a . ',
        ' . rand(1, 3) . ',
        "' . $faker->sentence() . '",
        "' . $faker->date('Y-m-d h:i:s') . '",
        "' . $faker->date('Y-m-d h:i:s') . '",
        "' . $faker->slug() . '"
    )';
    mysqli_query($conn, $art);
}
//boucle table : blog
for ($b = 1; $b < 3; $b++) {
    $blog = 'INSERT INTO blog VALUES(
        ' . $b . ',
        "' . $faker->name() . '",
        "' . $faker->slug() . '"
    )';
    mysqli_query($conn, $blog);
}
//boucle table : carte
for ($m = 1; $m < 5; $m++) {
    $menu = 'INSERT INTO carte VALUES(
                    ' . $m . ',
                    "' . $faker->name() . '",
                    "' . $faker->sentence() . '",
                    "' . rand(1, 99) . '",
                    "' . $faker->name() . '"                
                )';
    mysqli_query($conn, $menu);
}
// boucle table : carte_pic
for ($p = 1; $p < 4; $p++) {
    $pic = 'INSERT INTO carte_pic VALUES(
                    ' . $p . ',
                    ' . rand(1, 5) . ',
                    "' . $faker->name() . '",
                    "' . $faker->sentence() . '"
                    )';
    echo $pic;
    mysqli_query($conn, $pic);
}
//boucle table : category
for ($c = 1; $c < 3; $c++) {
    $cat = 'INSERT INTO category VALUES(
            ' . $c . ',
            "' . $faker->sentence() . '",
            "' . $faker->slug() . '"
            )';
    mysqli_query($conn, $cat);
}
//boucle table : galery
for ($g = 1; $g < 4; $g++) {
    $gal = 'INSERT INTO galery VALUES(
            ' . $g . ',
            ' . rand(1, 3) . ',
            "' . $faker->name() . '",
            "' . $faker->sentence() . '"
        )';
    mysqli_query($conn, $gal);
}
//boucle table : reservation
for ($r = 1; $r < 8; $r++) {
    $re = 'INSERT INTO reservation VALUES(
                ' . $r . ',
                "' . $faker->name() . '",
                "' . $faker->firstName() . '",
                ' . rand(1, 10) . ',
                "' . $faker->email() . '",
                "' . $faker->sentence() . '",
                " ' . $faker->phoneNumber() . '",
                ' . rand(0, 1) . '
            )';
    mysqli_query($conn, $re);
}






mysqli_close($conn);
