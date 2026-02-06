<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    $table = "galeri";
    $primaryKey = 'id_gal';
    $columns = array(
        array( 'db' => 'nama_gal', 'dt' => 1 ),
        array( 'db' => 'gambar_gal', 'dt' => 2 ),
        array( 'db' => 'id_gal', 'dt' => 3 )
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