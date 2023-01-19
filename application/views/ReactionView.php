<?php

use models\ReagirMOdel;

$like_manager = new ReagirMOdel();
$likes_count = count($like_manager->get_post_users_likes_by_post($pid));
$lk = "like-black-filled.png";
if($likes_count == 0) {
    $likes_count = "";
    $lk = "like-black.png";
}

$like_text_state = "Like";
$like_manager->setData(array(
    "user_id"=>$user->getPropertyValue("id"),
    "post_id"=>$pid
));
$like_image = "like-black.png";
if($like_manager->exists()) {
    $like_text_state = "Liked";
   
    $like_image = "like-black-filled.png";
}



?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>




</body>
</html>