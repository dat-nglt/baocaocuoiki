<?php
function getAllBanner($conn)
{
    $sql = "select * from banner";
    $resultData = mysqli_query($conn, $sql);
    return $resultData;
}

?>