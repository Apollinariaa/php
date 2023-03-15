<?php

require_once "vendor/autoload.php";

use classes\User;
use classes\Comment;
use Symfony\Component\Validator\Validation;


$user1 = new User(1, "Полина", "email2002@gmail.com", "polina1234");
$user2 = new User(2, 1122, "email200.com", "polina1234!!!");


$validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

$errors = $validator->validate($user1);

if (count($errors) !== 0) {
    foreach ($errors as $tempError) {
        echo $tempError . "<br>";
    }
} else {
    echo "OK" . "<br>";
}

$errors = $validator->validate($user2);

if (count($errors) !== 0) {
    foreach ($errors as $tempError) {
        echo $tempError . "<br>";
    }
}

$comment1 = new Comment($user2, "Комент 1");
$comment2 = new Comment($user2, "Комент 2");
$comment3 = new Comment($user2, "Комент 3");
$comment4 = new Comment($user2, "Комент 4");
$comment5 = new Comment($user1, "Комент 5");
$comment6 = new Comment($user1, "Комент 6");
$comment7 = new Comment($user1, "Комент 7");
$comment8 = new Comment($user1, "Комент 8");

$array = [$comment1, $comment2, $comment3, $comment4, $comment5, $comment6, $comment7, $comment8];
$timeNow = new DateTime("now");

echo '<pre>';
foreach ($array as $item) {
    if ($item->user->getTime() < $timeNow) {
        var_dump($item);
    }
}
echo '</pre>';

