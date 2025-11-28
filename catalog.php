<!DOCTYPE HTML>

<?php
    include('database_connection.txt');
    $conn = mysqli_connect($host, $user, $password, $db) or die("database connection has failed");
    $query = "select * from person_summary";
    $result = mysqli_query($conn, $query) or die("query has failed");

?>

<html>

<head>
    <title>Catalog</title>
    <link rel="stylesheet" href="graphics.css">
</head>

<body>
    <div class="container-column">
        <div class="block_text">
            <h1>Catalog of persons</h1>
        </div>
        <div class="block">

            <div class="container-row">

            <?php
            while ($row = mysqli_fetch_object($result)) {
                ECHO" <div class='container-column'>
                    <div class='block_image'>
                        <img src='Images/", $row -> picture,"'/>

                    </div>
                    <div class='block_image_text'>
                        <p>", $row -> first_name,"</p>
                    </div>
                </div>";
            }
            ?>
            </div>
        </div>
</body>

</html>

<?php
mysqli_close($conn);
?>