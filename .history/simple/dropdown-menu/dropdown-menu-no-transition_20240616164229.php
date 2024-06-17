<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nested Dropdown Menu with Back Button</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        overflow: hidden; /* Prevent body scroll when menu is open */
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content, .nested-content {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #f9f9f9;
        z-index: 1;
        overflow: auto;
    }
    .dropdown-content.show, .nested-content.show {
        display: block;
    }
    .dropdown-content a, .nested-content a, .nested-content button {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover, .nested-content a:hover, .nested-content button:hover {
        background-color: #f1f1f1;
    }
    .hamburger {
        display: block;
        cursor: pointer;
        padding: 10px;
        background: #333;
        color: #fff;
        font-size: 18px;
        border: none;
        outline: none;
        margin: 0;
    }
    .back-btn, .exit-btn {
        display: block;
        cursor: pointer;
        padding: 10px;
        background: #f1f1f1;
        border: none;
        outline: none;
        width: 100%;
        text-align: left;
    }
    .exit-btn {
        text-align: center;
        background: #333;
        color: white;
    }
    .nested-content {
        z-index: 2; /* Ensure nested menus stack above the previous ones */
    }
</style>

</head>
<body>

<!-- Dropdown Start -->
<div class="dropdown">
    <button class="hamburger" onclick="toggleDropdown('dropdown1')">☰ Menu</button>
    <div id="dropdown1" class="dropdown-content">
        <button class="exit-btn" onclick="hideAll()">Exit</button>
        <a href="#" onclick="showNested(event, 'nested1')">Link 1</a>
        <a href="#" onclick="showNested(event, 'nested2')">Link 2</a>
        <a href="#">Link 3</a>
    </div>
</div>
<!-- Dropdown End -->

<!-- Nested Content Start -->
<div id="nested1" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 1.1</a>
    <a href="#">Nested Link 1.2</a>
    <a href="#" onclick="showNested(event, 'nested3')">Nested Link 1.3</a>
</div>

<div id="nested2" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 2.1</a>
    <a href="#">Nested Link 2.2</a>
    <a href="#" onclick="showNested(event, 'nested4')">Nested Link2.3</a>
</div>

<div id="nested3" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 1.3.1</a>
    <a href="#">Nested Link 1.3.2</a>
</div>

<div id="nested4" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 2.3.1</a>
    <a href="#">Nested Link 2.3.2</a>
</div>
<!-- Nested Content End -->
<script>
    var navigationStack = [];

    function toggleDropdown(id) {
        console.log("Toggling dropdown...");
        var dropdown = document.getElementById(id);
        if (dropdown.classList.contains("show")) {
            console.log("Dropdown is currently shown. Hiding...");
            dropdown.classList.remove("show");
            document.body.style.overflow = ''; // Restore body scroll
            // Clear the navigation stack when collapsing the dropdown
            navigationStack = [];
            console.log("Resetting navigation stack.");
        } else {
            console.log("Dropdown is currently hidden. Showing...");
            hideAll();
            dropdown.classList.add("show");
            document.body.style.overflow = 'hidden'; // Prevent body scroll
        }
    }

    function showNested(event, id) {
        console.log("Showing nested content...");
        event.preventDefault(); // Prevent default link behavior

        // Hide all currently shown nested contents
        var nestedContents = document.querySelectorAll('.nested-content.show');
        for (var i = 0; i < nestedContents.length; i++) {
            console.log("Hiding nested content:", nestedContents[i].id);
            nestedContents[i].classList.remove("show");
        }

        // Show the selected nested content
        var nestedContent = document.getElementById(id);
        console.log("Showing selected nested content:", nestedContent.id);
        nestedContent.classList.add("show");

        // Determine if the selected content is within a dropdown
        var parentDropdown = nestedContent.closest('.dropdown-content, .nested-content');
        if (parentDropdown) {
            console.log("Parent dropdown found:", parentDropdown.id);
            // Clear the stack if the parent dropdown is the root dropdown
            if (parentDropdown.classList.contains("dropdown-content")) {
                navigationStack = [];
                console.log("Resetting navigation stack.");
            }
            // Push the parent dropdown onto the stack
            navigationStack.push(parentDropdown);
            console.log("Updated navigation stack:", navigationStack.map(elem => elem.id));
        }
    }

    function goBack(event) {
        console.log("Going back...");
        event.preventDefault(); // Prevent default button behavior

        // Get the currently shown nested content
        var currentContent = document.querySelector('.nested-content.show');
        console.log("Current content:", currentContent);
        if (currentContent) {
            console.log("Currently shown nested content:", currentContent.id);
            currentContent.classList.remove("show");

            // Find the parent dropdown of the current nested content
            var parentDropdown = currentContent.closest('.dropdown-content');
            console.log("Parent dropdown:", parentDropdown);
            if (parentDropdown) {
                // Remove entries from the stack until the parent dropdown is reached
                while (navigationStack.length > 0 && navigationStack[navigationStack.length - 1] !== parentDropdown) {
                    navigationStack.pop();
                    console.log("Removed entry from the navigation stack.");
                }
            } else {
                console.log("Could not find parent dropdown. Current content hierarchy:", currentContent.closest('.dropdown'));
            }

            // Show the previous dropdown or nested content
            if (navigationStack.length > 0) {
                var previousDropdown = navigationStack[navigationStack.length - 1];
                previousDropdown.classList.add("show");
            } else {
                var rootDropdown = document.querySelector('.dropdown-content');
                if (rootDropdown) {
                    console.log("No previous dropdown found. Showing root dropdown:", rootDropdown.id);
                    rootDropdown.classList.add("show");
                }
            }
        }
    }

    function hideAll() {
        console.log("Hiding all dropdowns and nested contents...");
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("show");
        }
        var nestedContents = document.getElementsByClassName("nested-content");
        for (var i = 0; i < nestedContents.length; i++) {
            nestedContents[i].classList.remove("show");
        }
        document.body.style.overflow = ''; // Restore body scroll
    }
</script>

</body>
</html>

