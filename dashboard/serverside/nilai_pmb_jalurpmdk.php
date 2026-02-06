<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "users INNER JOIN tbl_nilai ON users.id_user = tbl_nilai.id_users INNER JOIN fakultas ON users.id_fak = fakultas.id_fak INNER JOIN prodi ON users.id_pro = prodi.id_pro";
    // Table's primary key
    $primaryKey = 'id_user';
    $where = 'id_gel = 1 AND id_level = 3';
    $columns = array(
        array( 'db' => 'id_user', 'dt' => 1 ),
        array( 'db' => 'npm', 'dt' => 2 ),
        array( 'db' => 'nisn', 'dt' => 3 ),
        array( 'db' => 'name', 'dt' => 4 ),
        array( 'db' => 'nama_fak', 'dt' => 5 ),
        array( 'db' => 'nama_pro', 'dt' => 6),
        array( 'db' => 'keterangan', 'dt' => 7 ),
        array( 'db' => 'gambar', 'dt' => 8 ),
        array( 'db' => 'email', 'dt' => 9 ),
        array( 'db' => 'nik', 'dt' => 10 ),
        array( 'db' => 'hp', 'dt' => 11 )
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