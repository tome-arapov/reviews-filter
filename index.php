<?php require_once __DIR__."/filterData.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Filter reviews</title>
        <meta charset="utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />

        <!-- Latest compiled and minified Bootstrap 4.6.1 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <!-- Latest Font-Awesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container py-5">
            <div class="row">
                <div class="col-6 offset-3 mb-4 ">
                    <h3>Filter reviews</h3>
                </div>
                <div class="col-6 offset-3 mb-5">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

                        <div class="form-group">
                            <label for="rating">Order by rating:</label>
                            <select id="rating" name="rating" class="form-control">
                                <option selected value="Highest first">Highest first</option>
                                <option value="Lowest first">Lowest first</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="minRating">Minimum rating:</label>
                            <select id="minRating" name="minRating" class="form-control">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">Order by date:</label>
                            <select id="date" name="date" class="form-control">
                                <option selected value="Oldest first">Oldest first</option>
                                <option value="Newest first">Newest first</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="textPrioritize">Prioritize by text:</label>
                            <select id="textPrioritize" name="textPrioritize" class="form-control">
                                <option selected value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>

                    <?php if (!empty($_POST)) {?>
                <div class="col-8 offset-2 <?= 'd-block' ?>">
                    

                    <table class="table table-dark">      
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Review text</th>
                                <th scope="col">Date created:</th>
                                <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $counter = 1;    
                            ?>
                        
                            <?php foreach($filteredArr as $review) : ?>
                                <tr>
                                    <th scope="row"><?= $counter ?></th>
                                    <td><?= $review['reviewText'] ?></td>
                                    <td><?php $reviewDate = $review['reviewCreatedOnDate']; $date = strtotime($reviewDate); echo date('d.m.Y H:i:s', $date); ?></td>
                                    <td><?= $review['rating'] ?></td>
                                </tr>   
                                
                                <?php 
                                    $counter++;    
                                ?>
                            <?php endforeach ?>
                        
                        </tbody>
                    </table>
                </div>
                <?php } else {?>

                    <div class="col-8 offset-2 text-center">
                        <p class="lead font-weight-bold">Please enter information to render the reviews.</p>
                    </div>
                    
                <?php } ?>    
            </div>
        </div>
        
        
        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        
        <!-- Latest Compiled Bootstrap 4.6.1 JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    </body>
</html>