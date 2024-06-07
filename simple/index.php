<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">


    <title>Home Page</title>

</head>

<body style = "background-color: rgb(172, 147, 114);">

<?php include("inc/header.php"); ?>
    <div class = "home-section">
        <div class="container-fluid">
            <div class = "row">
                <div class = "col-sm">
                    <h1>Welcome to The Collectible Space</h1>
                </div>
                <div class = "col-sm">
                    <h1>Navigate to Where You Want to Go</h1>
                    <ul>
                        <li><a href="#collectible-journeys">Collectible Journeys</a></li>
                        <li><a href="sneaker-gallery.php">Sneaker Gallery  </a></li>
                        <li><a href="#INSERT_YOUR_OBJECT_NAME_HERE">Tips & Tricks</a></li>
                        <li><a href="#INSERT_YOUR_OBJECT_NAME_HERE">Link 4</a></li>
                    </ul>
                </div>
            </div>
            <div class = "row">
                <div class="col-sm">
                    <h1>See Where Collecting Takes You...</h1>
                </div>
                <br>
                <p>The collectible hobby applies to everyone who, as the name suggests,
                    "collects" things (preferably items that are considered to have value (monetary or otherwise) as an item).</p>
                
                <p>What does it mean to collect? What is considered "collectible"? What does this hobby mean to you? 
                </p>

            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div id="collectible-journeys"></div>
    <p>&nbsp;</p>
    <div class = "home-info-section">
        <div class="container-fluid">
            <div class = "row">
                <div class = "col-sm">
                    <h1>Consider My Collectible Journey</h1>
                </div>
                <div class = "col-sm">
                    <h1> </h1>
                    <ul>
                        <li>Collectible Journeys</li>
                        <li>How to Get Started</li>
                        <li>Tips & Tricks</li>
                    </ul>
                </div>
            </div>
            <div class = "row">
                <div class="col-sm">
                    <h1>The "Collecting Bug"</h1>
                    <br>
                    <p>It only takes one purchase to spiral into the collecting hole. The "collecting bug" is real.
                        The dopamine from collecting is real and like no other. 
                    </p>
                    
                    <p>What does it mean to collect? What is considered "collectible"? What does this hobby mean to you? 
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <h1>My Collectible Spaces</h1>
                </div>
                
            </div>
            <div class = "row">
                <div class="col-sm-4">
                    <div class="box">
                        <h1>Sneakers</h1>
                        <img src="img/sneakers/book1.jpg" class="img-fluid" alt="book 1">
                        <img src="img/sneakers/yutosb.jpg" class="img-fluid" alt="yuto sb">
                        <img src="img/sneakers/bw85highs.jpg" class="img-fluid" alt="bw 1s">
                        <img src="img/sneakers/paulflowers.jpg" class="img-fluid" alt="book 1">


                    </div>
                    <a href="sneaker-gallery.php">View Full Gallery</a>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <h1>Funko Pops</h1>
                        <img src="img/funkos/spiderman-funko/spider-toby.jpg" class="img-fluid" alt="tobey maguire">
                        <img src="img/funkos/spiderman-funko/3-spiders.jpg" class="img-fluid" alt="peter spiders">
                        <img src="img/funkos/spiderman-funko/spidey-classic.jpg" class="img-fluid" alt="spidey classic">
                        <img src="img/funkos/spiderman-funko/spidey-miles.jpg" class="img-fluid" alt="spidey miles">
                    </div>
                    <a href="funko-gallery.php">View Full Gallery</a>

                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <h1>Comic Books</h1>
                    </div>
                    <a href="comic-gallery.php">View Full Gallery</a>

                </div>
            </div>
            <br>
            <br>

        </div>
    </div>
    
    <div class = "home-info-section">
        <div class="container-fluid">
            <div class = "row">
                <div class = "col-sm">
                    <h1>Tips on How to Start</h1>
                </div>
            </div>
            <div class = "row">
                <div class = "col-sm">
                    <p></p>
                </div>
            </div>

            <div class="row">


            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


<?php include("inc/footer.php"); ?>

</body>
</html>