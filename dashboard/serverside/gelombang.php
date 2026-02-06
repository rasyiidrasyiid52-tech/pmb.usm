<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "gelombang";
    // Table's primary key
    $primaryKey = 'id_gelombang';

    $columns = array(
        array( 'db' => 'nama_gelombang', 'dt' => 1 ),
        array( 'db' => 'biaya', 'dt' => 2 ),
        array( 'db' => 'tgl_a','dt' => 3,
            'formatter' => function( $d, $row ) {
                return date( 'd-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'tgl_b','dt' => 4,
            'formatter' => function( $d, $row ) {
                return date( 'd-m-Y', strtotime($d));
            }
        ),
        array( 'db' => 'id_gelombang', 'dt' => 5 )
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