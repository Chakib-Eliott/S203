<?php
// check if file parameter is set
if(isset($_GET['file'])) {
    // get file name from parameter
    $file = $_GET['file'];
    // check if file exists
    if(file_exists('uploads/' . $file)) {
        // create new Imagick object
        $image = new Imagick('uploads/' . $file);
        // check if form has been submitted
        if(isset($_POST['submit'])) {
            // check which action was selected
            $action = $_POST['action'];
            if($action == 'resize') {
                // get new image size from form
                $width = $_POST['width'];
                $height = $_POST['height'];
                // resize image
                $respectRatio = isset($_POST['respectRatio']);
                // resize image
                if($respectRatio) {
                    $image->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1, true);
                } else {
                    $image->resizeImage($width, $height, Imagick::FILTER_LANCZOS, 1);
                }
            } else if($action == 'border') {
                // get border parameters from form
                $color = $_POST['color'];
                $size = $_POST['size'];
                // add border
                $image->borderImage($color, $size, $size);
            }
            // save image
            $image->writeImage('uploads/' . $file);
            // redirect to edit.php
            header('Location: ../script.php');
            exit;
        }
        // display image and form
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Imagick</title>
    <link rel='stylesheet' href='../assets/style.css'>
</head>
<body>
    <main>
        <img src='uploads/<?php echo $file; ?>'>
        <form method='post'>
            <label for='action'>Action:</label>
            <select name='action' id='action'>
                <option value='resize'>Resize</option>
                <option value='border'>Border</option>
            </select><br>
            <div id='resize'>
                <label for='width' id='widthlabel'>Width:</label>
                <input type='number' name='width' id='width' value='<?php echo $image->getImageWidth(); ?>'><br>
                <label for='height' id='heightlabel'>Height:</label>
                <input type='number' name='height' id='height' value='<?php echo $image->getImageHeight(); ?>'><br>
                <label for='respectRatio'>Respect Ratio:</label>
                <input type='checkbox' name='respectRatio' id='respectRatio'><br>
                <select name='ratioby' id='ratioby' style='display:none;'>
                <option disabled selected value> -- select an option -- </option>
                    <option value='width'>Width</option>
                    <option value='height'>Height</option>
                </select><br>
            </div>
            <div id='border' style='display:none;'>
                <label for='color'>Color:</label>
                <input type='color' name='color' id='color' value='#000000'><br>
                <label for='size'>Size:</label>
                <input type='number' name='size' id='size' value='1'><br>
            </div>
            <input type='submit' name='submit' value='Save'>
        </form>
        <script src='script.js'></script>
    </main>
</body>
</html>
<?php
    }
} else { // if file parameter is not set or file does not exist, redirect to script.php
    header('Location: ../script.php');
    exit;
}
?>