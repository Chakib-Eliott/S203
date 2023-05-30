<?php
    // check if file parameter is set
    if(isset($_GET['file'])) {
        // get file name from parameter
        $file = $_GET['file'];
        // check if file exists
        if(file_exists('uploads/' . $file)) {
            // delete file
            unlink('uploads/' . $file);
            // redirect to edit.php
            header('Location: script.php');
            exit;
        }
    }
    // if file parameter is not set or file does not exist, redirect to edit.php
    header('Location: script.php');
    exit;
?>