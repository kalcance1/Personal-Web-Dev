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
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            overflow: auto;
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
        .show {
            display: block;
        }
        .nested-dropdown {
            position: relative;
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
        .back-btn {
            display: block;
            cursor: pointer;
            padding: 10px;
            background: #f1f1f1;
            border: none;
            outline: none;
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>

<!-- Dropdown Start -->
<div class="dropdown">
    <button class="hamburger" onclick="toggleDropdown('dropdown1')">☰ Menu</button>
    <div id="dropdown1" class="dropdown-content">
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
    <a href="#" onclick="showNested(event, 'nested4')">Nested Link 2.3</a>
</div>

<div id="nested3" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 1.3.1</a>
    <a href="#">Nested Link 1.3.2</a>
</div>

<div id="nested4" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <a href="#">Nested Link 2.3.1</a>
    <a href="#">Nested Link 2.3.2</div>
<!-- Nested Content End -->

<script>
    var navigationStack = [];

    function toggleDropdown(id) {
        var dropdown = document.getElementById(id);
        if (dropdown.classList.contains("show")) {
            dropdown.classList.remove("show");
        } else {
            navigationStack = []; // Reset the stack when opening the root dropdown
            hideAll();
            dropdown.classList.add("show");
        }
    }

    function showNested(event, id) {
        event.preventDefault(); // Prevent default link behavior

        // Hide all currently shown dropdowns
        hideAll();

        // Show the selected nested content
        var nestedContent = document.getElementById(id);
        nestedContent.classList.add("show");

        // Determine if the selected content is within a dropdown
        var parentDropdown = nestedContent.closest('.dropdown-content, .nested-content');
        if (parentDropdown) {
            // Push the parent dropdown onto the stack
            navigationStack.push(parentDropdown);
        }
    }

    function goBack(event) {
        event.preventDefault(); // Prevent default button behavior

        // Hide all currently shown dropdowns
        hideAll();

        // Pop the last item from the stack
        var previousDropdown = navigationStack.pop();

        // If there's a previous dropdown, show it
        if (previousDropdown) {
            previousDropdown.classList.add("show");
        } else {
            // If there's no previous dropdown, show the root dropdown
            var rootDropdown = document.querySelector('.dropdown-content');
            if (rootDropdown) {
                rootDropdown.classList.add("show");
            }
        }
    }

    function hideAll() {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("show");
        }
        var nestedContents = document.getElementsByClassName("nested-content");
        for (var i = 0; i < nestedContents.length; i++) {
            nestedContents[i].classList.remove("show");
        }
    }
</script>

</body>
</html>
