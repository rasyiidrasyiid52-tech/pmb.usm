<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "users";
    // Table's primary key
    $primaryKey = 'id_user';

    $columns = array(
        array( 'db' => 'name', 'dt' => 1 ),
        array( 'db' => 'email', 'dt' => 2 ),
        array( 'db' => 'password', 'dt' => 3 ),
        array( 'db' => 'gambar', 'dt' => 4 ),
        array( 'db' => 'id_user', 'dt' => 5 )
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
   SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, 'id_level="2"')
);
} else {
    echo '<script>window.location="administrator"</script>';
}
?>