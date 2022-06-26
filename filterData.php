<?php

$reviews = file_get_contents('reviews.json');
$reviewsArray = json_decode($reviews,true);

$prioritizeText = $_POST['textPrioritize'] ?? null;
$rating = $_POST['rating'] ?? null;
$date = $_POST['date'] ?? null;



if($prioritizeText == 'Yes') {
    array_multisort(array_column($reviewsArray, 'reviewText'), SORT_DESC ,
                    array_column($reviewsArray, 'rating'),  $rating == 'Highest first' ? SORT_DESC : SORT_ASC ,
                    array_column($reviewsArray, 'reviewCreatedOnTime'), $date == 'Oldest first' ? SORT_ASC : SORT_DESC ,
                    $reviewsArray);
    $filteredArr = array_filter($reviewsArray,function($val){
        $minRating = $_POST['minRating'] ?? null;
        return $val['rating'] >= $minRating;
    });          
           
} else {
    array_multisort(array_column($reviewsArray, 'rating'), $rating == 'Highest first' ? SORT_DESC : SORT_ASC,
                    array_column($reviewsArray, 'reviewCreatedOnTime'), $date == 'Oldest first' ? SORT_ASC : SORT_DESC,
                    $reviewsArray);
    $filteredArr = array_filter($reviewsArray,function($val) {
        $minRating = $_POST['minRating'] ?? null;
        return $val['rating'] >= $minRating;
    });

}

?>