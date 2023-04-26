<div class="col-md-9 pt-2" id="sdash">
    <p class="fold-style-bold"> DashBoard </p>
          <div class="row p-2">
            <!-- Total Posts -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body ">
                  <h5 class="card-title">Total Posts</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $userid = $_SESSION['user_id']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(name) FROM `images` WHERE name='$name'";

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Total Comments -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Comments</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(comment) FROM `comment` WHERE name='$name'";

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
            
            <!-- Total Likes -->
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Likes</h5>
                  <p class="card-text">
                  <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(likes) FROM `likes` WHERE user_id='$userid'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row p-2">
            <!-- Total Shares -->
            <div class="col-md-4">
              <div class="card">
                        <!-- Total Followers -->
        
            <div class="card-body">
              <h5 class="card-title">Total community posts</h5>
              <p class="card-text">
              <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(username)  FROM `community` where username='$name'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
              </p>
            </div>
          </div>
        </div>
        
        <!-- Total Following -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Your Groups</h5>
              <p class="card-text">
              <?php
              // Establishing a database connection
              $conn = new PDO("mysql:host=localhost;dbname=chat_app_db", "root", "");

              // Query to fetch the count of images with name "Testadmin"
              $name = $_SESSION['name']; // Store the session variable in a variable to avoid SQL injection
              $sql = "SELECT COUNT(admin_id)  FROM `groups` where admin_id='$userid'";
             

              // Executing the query and fetching the result
              $stmt = $conn->query($sql);
              $count = $stmt->fetchColumn();
              

              // Outputting the result
              echo  $count;
              ?>
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Blocks</h5>
              <p class="card-text">60</p>
            </div>
          </div>
        </div>
      </div>



      <!-- barchart starts here  -->

      <div class="barchart">
        <div class="text">
          <h1>Bar chart </h1>
        </div>

        <div class="dislaychart">
        <?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "chat_app_db");

// Query to retrieve like counts and image file names
$sql = "SELECT likes.photo_id, likes.likes, images.file_name,images.something FROM likes INNER JOIN images ON likes.photo_id = images.id WHERE likes.user_id = '$userid' ORDER BY likes.likes DESC";
$result = mysqli_query($conn, $sql);

// Initialize arrays for graph data
$pages = array();
$likes = array();
$images = array();
// Initialize array of colors
$colors = [
  'rgba(54, 162, 235, 0.5)',
  'rgba(255, 99, 132, 0.5)',
  'rgba(75, 192, 192, 0.5)',
  'rgba(255, 205, 86, 0.5)',
  'rgba(153, 102, 255, 0.5)',
  'rgba(255, 159, 64, 0.5)'
];

// Loop through query results and add data to arrays
$i = 0;
// Loop through query results and add data to arrays
while ($row = mysqli_fetch_assoc($result)) {
  $pages[] = substr($row['something'], 0, 6);
  // $pages[] = '<img src="http://localhost/main/client/assets/post/' . $row['file_name'] . '.jpg">';
    $likes[] = $row['likes'];
    $images[] = $row['file_name'];

    $backgroundColor[] = $colors[$i % count($colors)];
    $i++;

}

// Set up chart configuration
$config = [
  
    'type' => 'bar',
    'data' => [
      'labels' =>$pages,
        'datasets' => [
            [
                'label' => 'Likes',
                'data' => $likes,
                'backgroundColor' => $backgroundColor,
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'borderWidth' => 1,
                'width' => '10px',
                'responsive' => true,
                'maintainAspectRatio' => false,
                'barPercentage' => 0.5,
                'categoryPercentage' => 0.7,
                'backgroundImage' => array_map(function($image) {
                  return "url(http://main/client/assets/post/$image)";
              }, $images)
            ]
        ]
    ],
    'options' => [
        'scales' => [
            'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true
                    ]
                ]
            ]
        ] 
    ]          
                    ];

// Output chart to HTML
echo '<canvas id="likesChart" style="height: 36px; border-radius: 10px;"></canvas>';
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<script>';
echo 'var ctx = document.getElementById("likesChart").getContext("2d");';
echo 'var chart = new Chart(ctx, '.json_encode($config).');';
echo '</script>';
?>
        </div>
      </div>
    </div>

   <hr>

    <style>
         #sdash{
            border-radius: 10px;
            font-size: 20px;
            background-color: white;
            box-shadow: chartreuse;
            box-shadow: 1px 1px 5px 3px whitesmoke;
         }
        </style>


<style>

#likesChart{
  max-height: 20pc;
    max-width: 37pc;
    position: relative;
    
}
</style>