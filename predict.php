<?php

$age = $_POST['age'];
$income = $_POST['income'];
$spending = $_POST['spending'];
$frequency = $_POST['frequency'];
$total_spend = $_POST['total_spend'];

/* Python prediction file */
$script = __DIR__ . DIRECTORY_SEPARATOR . "python" . DIRECTORY_SEPARATOR . "predict.py";

/* Run Python */
$command = "python " .
           escapeshellarg($script) . " " .
           escapeshellarg($age) . " " .
           escapeshellarg($income) . " " .
           escapeshellarg($spending) . " " .
           escapeshellarg($frequency) . " " .
           escapeshellarg($total_spend) .
           " 2>&1";

$result = shell_exec($command);

$result = trim($result);


/* Cluster meanings */

$cluster_meanings = [
    "0" => "Budget Customers",
    "1" => "High Value Customers",
    "2" => "Regular Customers",
    "3" => "Low Activity Customers"
];


/* Get meaning */

$meaning = $cluster_meanings[$result] ?? "Customer Segment";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Prediction Result</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .cluster-result {
            margin-top: 25px;
            padding: 20px;
            background: #eff6ff;
            border-radius: 10px;
            text-align: center;
        }

        .cluster-result h2 {
            margin-bottom: 10px;
            color: #1e3a8a;
        }

        .cluster-result h3 {
            color: #d97706;
            font-size: 24px;
        }

        .cluster-description {
            margin-top: 10px;
            color: #444;
            font-size: 16px;
        }

    </style>

</head>

<body>


<!-- Navigation -->

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


<!-- Prediction Result -->

<section class="prediction">

    <h2>Prediction Result</h2>

    <br>


    <p>
        Customer Age:
        <strong>
            <?php echo htmlspecialchars($age); ?>
        </strong>
    </p>


    <p>
        Annual Income:
        <strong>
            <?php echo htmlspecialchars($income); ?>
        </strong>
    </p>


    <p>
        Spending Score:
        <strong>
            <?php echo htmlspecialchars($spending); ?>
        </strong>
    </p>


    <p>
        Purchase Frequency:
        <strong>
            <?php echo htmlspecialchars($frequency); ?>
        </strong>
    </p>


    <p>
        Total Spend:
        <strong>
            <?php echo htmlspecialchars($total_spend); ?>
        </strong>
    </p>


    <!-- Cluster Result -->

    <div class="cluster-result">

        <h2>
            Customer Cluster:
            <?php echo htmlspecialchars($result); ?>
        </h2>


        <h3>
            <?php echo htmlspecialchars($meaning); ?>
        </h3>


        <p class="cluster-description">

            <?php

            if ($result == "0") {

                echo "Customers who generally have lower spending and purchasing activity.";

            } elseif ($result == "1") {

                echo "Customers with high income, strong spending behavior and significant customer value.";

            } elseif ($result == "2") {

                echo "Customers with regular purchasing activity and moderate spending behavior.";

            } elseif ($result == "3") {

                echo "Customers with relatively low purchasing activity and spending.";

            } else {

                echo "Customer segment could not be determined.";

            }

            ?>

        </p>

    </div>


    <br>


    <a href="index.php" class="button">

        Predict Another Customer

    </a>


</section>


</body>

</html>