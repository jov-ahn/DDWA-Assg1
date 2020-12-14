<?php
    include('inc/header.php');
    include('inc/admin_sidebar.php');
    include('inc/topbar.php');
    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'imgd_resource_library';
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Test if connection occurred.
    if (mysqli_connect_errno()) {
        die('Database connection failed: ' . 
            mysqli_connect_error() . 
            ' (' . mysqli_connect_errno() . ')'
        );
    }
    else {
        
?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Projects</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Project No.</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>Completion Date</th>
                                                <th>Budget</th>
                                                <th>Company</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        $sql = 'SELECT * ';
        $sql .= 'FROM Project ';
        $sql .= 'ORDER BY start_date DESC;';
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['project_no']}</td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['completion_date']}</td>
                        <td>{$row['budget']}</td>
                        <td>{$row['company']}</td>
                    </tr>";
            }
        }
    }
?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php
    include('inc/scripts.php');
    include('inc/footer.php');
?>