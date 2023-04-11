<?php
include 'vendor/autoload.php';

use App\User;
use App\Comment;

$user1 = new User(1, 'John', 'john@example.com', 'Password123');

try{
    $user2 = new User(-1, ' ', 'sdfsfsf', 'pass');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage()."\n";
}


$comments = [
    new Comment($user1, 'sfsdfsfsdf'),
    new Comment($user1, 'asdad'),
    new Comment($user1, 'sgfjgjtytyurerte'),
];

$datetime = new DateTime('2023-03-13');

$datetime1 = new DateTime('2023-03-20');

$filterComments = array_filter($comments, function (Comment $comment) use ($datetime) {
    return $comment->getUser()->getCreatedAt() > $datetime;
});

foreach ($filterComments as $comment) {
    echo $comment->getUser()->getName() . " " . $comment->getMessage(). "\n";
}


$filterComments1 = array_filter($comments, function (Comment $comment) use ($datetime1) {
    return $comment->getUser()->getCreatedAt() > $datetime1;
});
// nothing to show
foreach ($filterComments1 as $comment) {
    echo $comment->getUser()->getName() . " " . $comment->getMessage(). "\n";
}