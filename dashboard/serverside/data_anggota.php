<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "users";
    // Table's primary key
    $primaryKey = 'id_user';
    $where = 'status_data = 1 AND id_level = 3';
    $columns = array(
        array( 'db' => 'nik', 'dt' => 1 ),
        array( 'db' => 'npa', 'dt' => 2 ),
        array( 'db' => 'name', 'dt' => 3 ),
        array( 'db' => 'email', 'dt' => 4 ),
        array( 'db' => 'hp', 'dt' => 5 ),
        array( 'db' => 'ktp', 'dt' => 6 ),
        array( 'db' => 'gambar', 'dt' => 7 ),
        array( 'db' => 'id_user', 'dt' => 8 )
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
   SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, $where)
);
} else {
    echo '<script>window.location="./"</script>';
}
?>