<!DOCTYPE html>
<html>
<head>

    <title>Customer Segmentation</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<!-- NAVBAR -->

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


<!-- HERO SECTION -->

<section class="hero">

    <div class="hero-content">

        <h1>Customer Segmentation</h1>

        <p>
            Machine Learning based customer analysis
            using K-Means clustering.
        </p>

        <a href="#prediction" class="button">
            Predict Customer
        </a>

    </div>

</section>


<!-- PREDICTION SECTION -->

<section id="prediction" class="prediction">

    <h2>Customer Segment Prediction</h2>

    <p>
        Enter customer details to predict the customer segment.
    </p>


    <form action="predict.php" method="POST">

        <label>Age</label>

        <input
            type="number"
            name="age"
            min="18"
            max="100"
            required
        >


        <label>Annual Income</label>

        <input
            type="number"
            name="income"
            min="0"
            required
        >


        <label>Spending Score</label>

        <input
            type="number"
            name="spending"
            min="0"
            max="100"
            required
        >


        <label>Purchase Frequency</label>

        <input
            type="number"
            name="frequency"
            min="0"
            required
        >


        <label>Total Spend</label>

        <input
            type="number"
            name="total_spend"
            min="0"
            required
        >


        <button type="submit">
            Predict Segment
        </button>

    </form>

</section>


<!-- FOOTER -->

<footer>

    <p>
        Customer Segmentation using Machine Learning
    </p>

</footer>

</body>
</html>