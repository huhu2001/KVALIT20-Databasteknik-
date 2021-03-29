<?php
    
/***************************************
 * 
 *                DELETE
 *          Ta bort en kontakt
 * 
 ***************************************/


require_once ("../database.php");

$id = $_GET['id'];

if($id == 0) {
    $sql = "DELETE FROM contactform ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
} else {
    $sql = "DELETE FROM contactform WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
}


Header("Location: read.php");

