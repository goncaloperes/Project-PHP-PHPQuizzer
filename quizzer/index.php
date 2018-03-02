<?php include 'database.php' ?>

<?php

    /*
    * Get Total Questions
    */
    $query = "SELECT * FROM questions";
    //Get results
    $results = $mysqli->query($query) or die($mysqli->error._LINE_);
    $total = $results->num_rows;

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php" class="app-name">PHP Quizzer</a></h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>
                Test Your PHP Knowledge
            </h2>
            <p>This is a multiple choice quiz to test your knowledge of PHP</p>
            <ul>
                <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong>Multiple Choice</li>
                <li><strong>Estimated Time: </strong><?php echo $total * .5 ; ?> Minutes</li>
            </ul>
            <a href="question.php?n=1" class="start"><span>Start Quiz</span></a>
        </div>

    </main>
    <footer class="footer">
        <div class="container" style="text-align: center">
            <span class="text-muted">© 2018 <a href="http://goncaloperes.com/" class="href">Gonçalo Peres</a>. All Rights Reserved</span>
        </div>
    </footer>
</body>
</html>