<?php

$file = __DIR__ . "/data/segmented_customers.csv";

$data = [];

if (file_exists($file)) {

    if (($handle = fopen($file, "r")) !== false) {

        while (($row = fgetcsv($handle)) !== false) {
            $data[] = $row;
        }

        fclose($handle);
    }
}

$total_customers = 0;
$clusters = [];

if (count($data) > 0) {

    $total_customers = count($data) - 1;

    for ($i = 1; $i < count($data); $i++) {

        if (isset($data[$i][5])) {

            $cluster = $data[$i][5];

            if (!isset($clusters[$cluster])) {
                $clusters[$cluster] = 0;
            }

            $clusters[$cluster]++;
        }
    }
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">

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

<section class="prediction">

    <h2>Customer Dashboard</h2>

    <br>

    <h3>
        Total Customers:
        <?php echo $total_customers; ?>
    </h3>

    <br>

    <h3>Customers in Each Cluster</h3>

    <br>

    <?php if (count($clusters) > 0): ?>

        <?php foreach ($clusters as $cluster => $count): ?>

            <p>
                Cluster <?php echo htmlspecialchars($cluster); ?> :
                <strong><?php echo $count; ?> customers</strong>
            </p>

            <br>

        <?php endforeach; ?>

    <?php else: ?>

        <p>
            No customer data found.
        </p>

        <p>
            Please make sure
            <strong>segmented_customers.csv</strong>
            is inside the <strong>data</strong> folder.
        </p>

    <?php endif; ?>

</section>

</body>

</html>