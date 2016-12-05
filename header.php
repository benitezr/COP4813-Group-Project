<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pageTitle; ?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <?php
        //Populate the $styles array with paths to other CSS files
            if(isset($styles)){
                foreach($styles as $path){
                    echo "<link rel='stylesheet' type='text/css' href='$path'>\n";
                }
            }
        ?>
    </head>
    <body>