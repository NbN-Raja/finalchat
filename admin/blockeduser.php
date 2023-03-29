




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
                <?php include 'include/analytics.php' ?>

                
                <?php include 'include/blockeduser.php' ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   
   

</body>

</html>

<style>
    .row{
margin-right: 2.25rem;
    margin-left: 2.25rem;
    }
</style>