<?php include 'includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $conn = $pdo->open();
    $results_per_page = 10;

    $stmt = $conn->prepare("Select * From products");
    $stmt->execute();
    $number_of_results = $stmt->fetchColumn();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "$row[name] <br>";
    }
    // echo $number_of_results;
    // echo "<br>";

    $number_of_pages = ceil($number_of_results / $results_per_page);
    // print_r($page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    echo $this_page_first_result = ($page-1)*$results_per_page;

    $sql = $conn->prepare("Select * From products LIMIT " . $this_page_first_result . ',' . $results_per_page . " ");
    $sql->execute();
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        echo "$row[name]  $row[description]";
    }

    for ($page = 1; $page <= $number_of_pages; $page++) {
        echo '<a href="sample-pagination.php?page=' . $page  .  '">'  .  $page . '</a> ';
    }
    ?>


</body>

</html>