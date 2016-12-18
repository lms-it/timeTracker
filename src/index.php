<?php

require_once  'vendor/autoload.php';
use includes\helpers\OutputStrings;
use includes\helpers\TimerConfig;

include_once 'includes/templates/header.php';

?>

<?php

try {
    # connect to the database
    $dbh = new PDO("pgsql:host=".TimerConfig::HOST.";port=".TimerConfig::DB_PORT.";dbname=".TimerConfig::DB.";user=".TimerConfig::DB_USER.";");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    PHP_Timer::start();
    sleep(5);
    $time = PHP_Timer::stop();
    var_dump($time);

    // display a message if connected to the PostgreSQL successfully
    if ($dbh) {
        echo "Connected to the <strong>".TimerConfig::DB."</strong> database successfully!";
    }
}catch(\PDOException $e) {
    echo OutputStrings::DB_CNX;
    file_put_contents(TimerConfig::TMP_FOLDER_PATH.'PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}


//DEMO 12

?>

<h1>Hello world</h1>

<?php include_once 'includes/templates/footer.php'; ?>
