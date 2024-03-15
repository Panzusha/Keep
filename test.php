<?php
include "api/database.php";
$test = new Test();

// calcule 10 +3
echo $test->somme(10 ,3);



$_POST['categories_id'] = ['demo', 'titi', 'tutu', 'element'];
?>
<ul>
    <?php foreach ($_POST['categories_id'] as $item) : ?>
    <li><?= $item ?></li>
    <?php endforeach ?>
</ul>