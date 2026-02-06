<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "regencies";
    // Table's primary key
    $primaryKey = 'id_kab';

    $columns = array(
        array( 'db' => 'id_prov', 'dt' => 1 ),
        array( 'db' => 'id_kab', 'dt' => 2 ),
        array( 'db' => 'nama_kabupaten', 'dt' => 3 ),
        array( 'db' => 'id_kab', 'dt' => 4 )
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