<!DOCTYPE html>
<html>
<head>
    <title>Imagick</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <?php
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0");
    ?>
</head>
<body>
    <main>
        <?php
            // list all files in 'uploads/' directory
            $files = scandir('uploads/');
            foreach($files as $file) {
                // check if file is a directory
                if(is_dir($file)) {
                    continue;
                }
                // get file name
                $filename = pathinfo($file, PATHINFO_FILENAME);
                // get file extension
                $extension = pathinfo($file, PATHINFO_EXTENSION);
                // get file size
                $size = filesize('uploads/' . $file);
                
                ?>
                <!-- display file details -->
                <hr>
                <p>File name: <?php echo $filename; ?></p>
                <p>File extension: <?php echo $extension; ?></p>
                <p>File size: <?php echo $size; ?></p>
                <p><img src="uploads/<?php echo $file; ?>" width="200"></p>
                <p>
                    <form class="actions" action="uploads/<?php echo $file; ?>" method="get">
                        <button type="submit" class="download-button">Download</button>
                    </form>
                    <form class="actions" action="delete.php" method="post">
                        <input type="hidden" name="file" value="<?php echo $file; ?>">
                        <button type="submit" class="delete-button">Delete</button>
                    </form>
                    <form class="actions" action="edit.php" method="get">
                        <input type="hidden" name="file" value="<?php echo $file; ?>">
                        <button type="submit" class="edit-button">Edit</button>
                    </form>
                </p>
            <?php
            }
            ?>
                <hr>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:<br>
                    <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                    <input type="submit" value="Upload Image" name="submit">
                </form>
    </main>
</body>
</html>