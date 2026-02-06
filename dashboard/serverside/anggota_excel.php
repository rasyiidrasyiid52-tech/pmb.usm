<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "users INNER JOIN jenis_keanggotaan ON users.id_jeniskeanggotaan = jenis_keanggotaan.id_jeniskeanggotaan";
    // Table's primary key
    $primaryKey = 'id_user';
    $where= 'status_data = 0 AND ket = 1 AND id_level = 3';
    $columns = array(
        array( 'db' => 'nik', 'dt' => 1 ),
        array( 'db' => 'nama_jeniskeanggotaan', 'dt' => 2 ),
        array( 'db' => 'name', 'dt' => 3 ),
        array( 'db' => 'email', 'dt' => 4 ),
        array( 'db' => 'hp', 'dt' => 5 ),
        array( 'db' => 'id_user', 'dt' => 6 ),
        array( 'db' => 'id_user', 'dt' => 7 )
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
    echo '<script>window.location="administrator"</script>';
}
?>