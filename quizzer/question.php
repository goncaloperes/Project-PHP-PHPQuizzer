<?php include 'database.php' ?>
<?php session_start(); ?>
<?php

    //Set Question number
    $number = (int) $_GET['n'];

    /*
     * Get Total Questions
     */
    $query = "SELECT *
              FROM questions";
    //Get results
    $results = $mysqli->query($query) or die($mysqli->error._LINE_);
    $total = $results->num_rows;


    /*
     * Get Question
     */
    $query = "SELECT *
              FROM questions
              WHERE question_number = $number";
        //Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();


    /*
    *	Get Choices
    */
    $query = "SELECT *
              FROM choices
              WHERE question_number = $number";
    //Get results
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

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
        <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
        <p class="question">

            <?php echo $question['text']; ?>

        </p>
        <form method="post" action="process.php">
            <ul class="choices">

                <?php while($row = $choices->fetch_assoc()): ?>

                    <li>
                        <input name="choice" type="radio" value="<?php echo $row['id']; ?>" />

                        <?php echo $row['text']; ?>
                    </li>

                <?php endwhile; ?>

            </ul>
            <input type="submit" value="Submit">
            <input type="hidden" name="number" value="<?php echo $number; ?>" />
        </form>
    </div>
</main>
<footer class="footer">
    <div class="container" style="text-align: center">
        <span class="text-muted">© 2018 <a href="http://goncaloperes.com/" class="href">Gonçalo Peres</a>. All Rights Reserved</span>
    </div>
</footer>
</body>
</html>