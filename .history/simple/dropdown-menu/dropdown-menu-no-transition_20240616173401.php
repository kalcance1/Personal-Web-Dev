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
            text-align: center;
        }
        .nested-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .nested-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
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
            text-align: left;
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
    <h2>Nested Level 1 Title 1</h2>
    <a href="#">Nested Link 1.1</a>
    <a href="#">Nested Link 1.2</a>
    <a href="#" onclick="showNested(event, 'nested3')">Nested Link 1.3</a>
</div>

<div id="nested2" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>Nested Level 1 Title 2</h2>
    <a href="#">Nested Link 2.1</a>
    <a href="#">Nested Link 2.2</a>
    <a href="#" onclick="showNested(event, 'nested4')">Nested Link 2.3</a>
</div>

<div id="nested3" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>Nested Level 2 Title 1</h2>

    <a href="#">Nested Link 1.3.1</a>
    <a href="#">Nested Link 1.3.2</a>
</div>

<div id="nested4" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>Nested Level 2 Title 2</h2>

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

        // Determine if the selected content is within a dropdown or nested content
        var parent = nestedContent.closest('.dropdown-content.show, .nested-content.show');
        if (parent) {
            console.log("Parent found:", parent.id);
            navigationStack.push(parent);
            console.log("Updated navigation stack:", navigationStack.map(elem => elem.id));
        }
    }

    function goBack(event) {
        console.log("Going back...");
        event.preventDefault(); // Prevent default button behavior

        // Hide the current nested content
        var currentContent = document.querySelector('.nested-content.show');
        if (currentContent) {
            console.log("Hiding current content:", currentContent.id);
            currentContent.classList.remove("show");
        }

        // Pop the stack to remove the current content's parent
        if (navigationStack.length > 0) {
            navigationStack.pop();
        }

        // Show the previous content in the navigation stack
        if (navigationStack.length > 0) {
            var previousContent = navigationStack[navigationStack.length - 1];
            console.log("Showing previous content:", previousContent.id);
            previousContent.classList.add("show");
        } else {
            console.log("Navigation stack is empty. Showing the root dropdown.");
            // If the stack is empty, show the root dropdown
            var rootDropdown = document.querySelector('.dropdown-content');
            if (rootDropdown) {
                rootDropdown.classList.add("show");
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
        navigationStack = []; // Reset navigation stack
    }
</script>

</body>
</html>
