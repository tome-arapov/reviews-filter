<?php
$reviews = file_get_contents('reviews.json');
$reviewsArray = json_decode($reviews,true);

$prioritizeText = $_POST['textPrioritize'];
$rating = $_POST['rating'];
$date = $_POST['date'];
var_dump($prioritizeText);
var_dump($rating);
var_dump($date);

    if($prioritizeText == 'Yes') {
        array_multisort(array_column($reviewsArray, 'reviewText'), SORT_DESC ,
                        array_column($reviewsArray, 'rating'),  $rating == 'Lowest first' ? SORT_ASC : SORT_DESC ,
                        array_column($reviewsArray, 'reviewCreatedOnTime'), $date == 'Oldest first' ? SORT_ASC : SORT_DESC ,
                        $reviewsArray);
        $newArr = array_filter($reviewsArray,function($val){
            $minRating = $_POST['minRating'];
            return $val['rating'] >= $minRating;
        });              
    }
    
    array_multisort(array_column($reviewsArray, 'rating'), $rating == 'Highest first' ? SORT_DESC : SORT_ASC,
                    array_column($reviewsArray, 'reviewCreatedOnTime'), $date == 'Oldest first' ? SORT_ASC : SORT_DESC,
                    $reviewsArray);
    $newArr = array_filter($reviewsArray,function($val) {
        $minRating = $_POST['minRating'];
        return $val['rating'] >= $minRating;
    });

     

var_dump($newArr);
?>