<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    $table = "fakultas";
    $primaryKey = 'id_fak';
    $columns = array(
        array( 'db' => 'nama_fak', 'dt' => 1 ),
        array( 'db' => 'logo_fak', 'dt' => 2 ),
        array( 'db' => 'id_fak', 'dt' => 3 )
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
    echo '<script>window.location="./"</script>';
}
?>