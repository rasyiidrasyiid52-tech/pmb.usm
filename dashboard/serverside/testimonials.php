<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "testimoni";
    // Table's primary key
    $primaryKey = 'id_testi';

    $columns = array(
        array( 'db' => 'nama_testi', 'dt' => 1 ),
        array( 'db' => 'pekerjaan_testi', 'dt' => 2 ),
        array( 'db' => 'uraian_testi', 'dt' => 3 ),
        array( 'db' => 'status_testi', 'dt' => 4 ),
        array( 'db' => 'gambar_testi', 'dt' => 5 ),
        array( 'db' => 'id_testi', 'dt' => 6 )
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