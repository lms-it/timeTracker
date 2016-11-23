<?php include_once 'header.php'; ?>


<?php


$host = 'database';
$db = 'crediwire';
$username = 'crediwirec';


$dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;";


try {
    # connect to the database
    $dbh = new PDO($dsn);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // display a message if connected to the PostgreSQL successfully
    if ($dbh) {
        echo "Connected to the <strong>$db</strong> database successfully!";
    }
}catch(PDOException $e) {
    echo "I'm sorry, I can't connect to the database.";
    file_put_contents('tmp/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}


?>

<h1>Hello world</h1>

<?php include_once 'footer.php'; ?>
