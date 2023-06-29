<?php
$userid = $_SESSION['user_id'];

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

// Check if the connection was successful
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Query to retrieve user data
$sql = "SELECT likes.photo_id, likes.likes, images.file_name, images.something FROM likes INNER JOIN images ON likes.photo_id = images.id WHERE likes.user_id = '$userid' ORDER BY likes.likes DESC";
$result = mysqli_query($conn, $sql);

// Initialize an array for chart data
$chartData = array();

// Loop through query results and add data to the chart array
while ($row = mysqli_fetch_assoc($result)) {
    $chartData[] = array(
        "label" => $row['something'],
        "y" => $row['likes']
    );
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        .chart-container {
            width: 100%;
            height: 0;
            padding-bottom: 30%; /* Adjust the aspect ratio as needed */
            position: relative;
        }

        .chart {
            position: absolute;
            top: 0;
            left: 10;
            width: 50%;
            height: 100%;
        }
    </style>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>
<body>
    <div class="chart-container">
        <div id="chartContainer" class="chart"></div>
    </div>

    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "User "
                },
                axisY: {
                    title: " Likes"
                },
                axisX: {
                    title: "User Pos"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($chartData, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
</body>
</html>

