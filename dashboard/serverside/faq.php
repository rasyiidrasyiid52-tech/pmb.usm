<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = "faq";
    // Table's primary key
    $primaryKey = 'id_faq';

    $columns = array(
        array( 'db' => 'pertanyaan', 'dt' => 1 ),
        array( 'db' => 'jawaban', 'dt' => 2 ),
        array( 'db' => 'id_faq', 'dt' => 3 )
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