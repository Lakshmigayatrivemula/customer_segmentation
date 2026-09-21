<?php

$file = "data/segmented_customers.csv";

$data = [];

if (($handle = fopen($file, "r")) !== false) {

    while (($row = fgetcsv($handle)) !== false) {

        $data[] = $row;

    }

    fclose($handle);
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Customer Data</title>

    <link rel="stylesheet" href="style.css">

    <style>

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #172554;
            color: white;
        }

        tr:nth-child(even) {
            background: #f3f4f6;
        }

    </style>

</head>

<body>


<nav>

    <div class="logo">
        Customer Segmentation
    </div>

    <div class="nav-links">

        <a href="index.php">Home</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="data.php">Customer Data</a>
        <a href="about.php">About</a>

    </div>

</nav>


<h1 style="text-align:center; margin-top:40px;">
    Customer Data
</h1>


<table>

<?php

foreach ($data as $row) {

    echo "<tr>";

    foreach ($row as $cell) {

        if ($row === $data[0]) {

            echo "<th>" . htmlspecialchars($cell) . "</th>";

        } else {

            echo "<td>" . htmlspecialchars($cell) . "</td>";

        }

    }

    echo "</tr>";
}

?>

</table>


</body>

</html>