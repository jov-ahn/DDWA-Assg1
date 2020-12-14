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
                                <h4 class="card-title">Lecturers</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Staff ID</th>
                                                <th>Name</th>
                                                <th>Contact No.</th>
                                                <th>Office Location</th>
                                                <th>Join Date</th>
                                                <th>Hours Spent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        $sql = 'SELECT * ';
        $sql .= 'FROM Lecturer ';
        $sql .= 'ORDER BY join_date DESC, name;';
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['staff_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['contact_no']}</td>
                        <td>{$row['office_location']}</td>
                        <td>{$row['join_date']}</td>
                        <td>{$row['hours_spent']}</td>
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