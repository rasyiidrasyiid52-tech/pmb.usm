<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "blangko";
    // Table's primary key
    $primaryKey = 'id';

    $columns = array(
        array( 'db' => 'nama', 'dt' => 1 ),
        array( 'db' => 'ukuran', 'dt' => 2 ),
        array( 'db' => 'jenis', 'dt' => 3 ),
        array( 'db' => 'gambar', 'dt' => 4 ),
        array( 'db' => 'gambar1', 'dt' => 5 ),
        array( 'db' => 'id', 'dt' => 6 )
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