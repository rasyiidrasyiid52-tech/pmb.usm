<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "kontak_panitia";
    // Table's primary key
    $primaryKey = 'id_kp';

    $columns = array(
        array( 'db' => 'nama_kp', 'dt' => 1 ),
        array( 'db' => 'prodi_kp', 'dt' => 2 ),
        array( 'db' => 'hp_kp', 'dt' => 3 ),
        array( 'db' => 'id_kp', 'dt' => 4 )
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