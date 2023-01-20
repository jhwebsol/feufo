<?php include("includes/db_config.php"); 
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM hired_enquiry WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'img/' . $file['cv'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('img/' . $file['cv']));
        readfile('img/' . $file['cv']);
        exit;
    }

}

?>