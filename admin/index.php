




<?php

include 'model/db.php'
?>

<?php 
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include 'include/sidebar.php' ?> 
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'include/nav.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content All Page Content Here  -->
                <?php include 'include/main_content.php' ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           <?php include 'include/footer.php' ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   
   

</body>

</html>