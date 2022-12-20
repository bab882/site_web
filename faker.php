<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$table = 'site_web';

$conn = mysqli_connect($host, $user, $pwd, $table);

if (!$conn) {
    die("Erreur de connexion" . mysqli_connect_error());
}

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

    /* 
     *insert into catagory
     * je dois mettre 5 categorie 
     */
    for( $c = 1; $c <= 5; $c++ ) {
        $cat = 'INSERT INTO category( 
            id,
            title,
            slug
        ) 
        VALUES(
            '.$c.',
            "'.$faker->words(3, true).'",
            "'.$faker->slug().'"

        )'; 
        
        if(mysqli_query($conn, $cat)){
            echo 'save done !';
        }
        else {
            echo 'error'.$sql.'<br>'.mysqli_error($conn);
        } 
        for($r = 1; $r <= 9; $r++){
            $res = 'INSERT INTO reservation VALUES(
                '.$r.',
                '.$c.',
                "'.$faker->name().'",
                "'.$faker->firstName().'",
                '.$faker->rand(1,26).',
                "'.$faker->email().'",
                "'.$faker->sentence().'",
               " '.$faker->phoneNumber().'",
                "'.$faker->paragraphs().'"
            )';
            if(mysqli_query($conn, $res)){
                echo 'good reservation';
            }
            else {
                echo 'error reservation'.$sql.'<br>'.mysqli_error($conn);
            }
        } 
        for($m = 1; $m <= 7; $m++){
            $menu = 'INSERT INTO carte VALUES(
                '.$m.',
                '.$c.',
                "'.$faker->name().'" 
                "'.$faker->sentence().'",
                '.$faker->randomFloat(1, 20, 30).',
                '.$faker->rand(1,8).',

            )';   
        }
        for($b = 1; $b <= 4; $b++){
            $blog = 'INSERT INTO blog VALUES(
                '.$b.',
                '.$c.',
                "'.$faker->name().'",
            )';
        }   
    }
    
    
        
    
    
    



?>
