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
                                <h4 class="card-title">Softwares</h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Publisher</th>
                                                <th>Version</th>
                                                <th>Price Per License</th>
                                                <th>No. Of Licenses</th>
                                                <th>Purchase Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
        $sql = 'SELECT * ';
        $sql .= 'FROM Software ';
        $sql .= 'ORDER BY purchase_date DESC, title;';
        $result = $connection->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['title']}</td>
                        <td>{$row['publisher']}</td>
                        <td>{$row['version']}</td>
                        <td>{$row['price_per_license']}</td>
                        <td>{$row['no_of_licenses']}</td>
                        <td>{$row['purchase_date']}</td>
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