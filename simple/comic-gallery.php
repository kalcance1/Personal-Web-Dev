<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Sneaker Gallery</title>

</head>

<body style = "background-color: rgb(172, 147, 114);">

<?php include("inc/header.php"); ?>
    <div class = "sneaker-section">
        <div class="container-fluid">
            <div class = "row">
                <div class = "col-sm">
                    <h1>Comic Book Gallery</h1>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div id="collectible-journeys"></div>
    <p>&nbsp;</p>
    <div class = "sneaker-section">
        <div class="container-fluid">
            <!-- <div class = "row">
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
            </div> -->


            <div class="image-container">
            <?php
            // Directory where images are stored
            $imageDir = "img/sneakers/";

            // Get all image files from the directory
            $images = glob($imageDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            // Loop through the images and display them
            $counter = 0;
            echo '<div class="image-row">'; // Open the first row
            foreach ($images as $image) {
                echo '<img src="' . $image . '" alt="Image">';
                $counter++;
                // Check if three images are displayed, then start a new row
                if ($counter % 3 == 0) {
                    echo '</div><div class="image-row">';
                }
            }
            echo '</div>'; // Close the last row
            ?>
    </div>


            <!-- <div class = "row">
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
                <div class = "col-sm">
                    <h1>IMAGE GOES HERE</h1>
                </div>
            </div> -->

            <br>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php include("inc/footer.php"); ?>
</body>
</html>