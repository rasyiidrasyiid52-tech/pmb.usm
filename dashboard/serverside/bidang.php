<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "status_bidang";
    // Table's primary key
    $primaryKey = 'id_bidang';

    $columns = array(
        array( 'db' => 'id_bidang', 'dt' => 1 ),
        array( 'db' => 'nama_bidang', 'dt' => 2 ),
        array( 'db' => 'id_bidang', 'dt' => 3 )
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
   SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null)
);
} else {
    echo '<script>window.location="administrator"</script>';
}
?>