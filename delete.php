<?php

include("db.php");

$sql = "DELETE FROM document WHERE documentId=".$_GET['id'];

if ($conn->query($sql) === TRUE) {
    header('Location: '."download.php?grade=".$_GET['grade']);
} else {
    echo "Error deleting record: " . $conn->error;
}

?>