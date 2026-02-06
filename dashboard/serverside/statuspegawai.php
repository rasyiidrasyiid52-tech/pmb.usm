<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "status_pegawai";
    // Table's primary key
    $primaryKey = 'id_sp';

    $columns = array(
        array( 'db' => 'id_sp', 'dt' => 1 ),
        array( 'db' => 'nama_sp', 'dt' => 2 ),
        array( 'db' => 'id_sp', 'dt' => 3 )
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