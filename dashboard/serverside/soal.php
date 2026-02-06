<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    $table = "tbl_soal";
    $primaryKey = 'id_soal';
    $columns = array(
        array( 'db' => 'soal', 'dt' => 1 ),
        array( 'db' => 'gambar', 'dt' => 2 ),
        array( 'db' => 'knc_jawaban', 'dt' => 3 ),
        array( 'db' => 'id_soal', 'dt' => 4 )
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