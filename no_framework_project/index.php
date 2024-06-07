<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Name</title>
    <link rel="stylesheet" href="/no_framework_project/css/styles.css"> <!-- Check if this path is correct -->
    <script src="/no_framework_project/js/resizeNote.js"></script>
    <style>

    </style>
</head>
<body>
<?php include ("inc/header.php");?>
    <div class="container">
        <section class="main-content">
            <h2>Main Content</h2>
            <p>This is where the main content of your homepage goes.</p>
            <p>
        
                <?php
                    // PHP Script to display current date
                    echo "Today is " . date("Y-m-d") . "<br>";
                ?>
            </p>
        </section>
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <p>This is the sidebar content.</p>
        </aside>
    </div>
    <p>&nbsp;</p>
    <div class="about-container">

        <aside class="sidebar">
            <h2>Sidebar</h2>
            <p>I DONT KNOW WHAT TO WRITE HERE.</p>
            <div class="note-container">
                <h1>Enter your note here</h1>
                <textarea id="entry" oninput="resizeNote()" ></textarea>
            </div>
        </aside>
    
        <section>
            <h2>Section 2</h2>
            <p>I DONT KNOW WHAT TO WRITE HERE EITHER.</p>
        </section>

    </div>
    <div class="container">
        <section class="main-content">
            <h2>Main Content</h2>
            <p>This is where the main content of your homepage goes.</p>
            <p>
        
                <?php
                    // PHP Script to display current date
                    echo "Today is " . date("Y-m-d") . "<br>";
                ?>
            </p>
        </section>
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <p>This is the sidebar content.</p>
        </aside>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php include ("inc/footer.php");?>

</body>
</html>

<script>



</script>