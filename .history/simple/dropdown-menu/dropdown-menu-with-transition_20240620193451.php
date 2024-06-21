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
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .show {
            display: block;

        }
        .visible {
            opacity: 1;
            transform: translateX(0);
        }
        .dropdown-content a, .nested-content a, .nested-content button {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .nested-content h2 {
            font-weight: bold;
            text-align: center; 
            font-size: 16px;
        }
        .nested-content button {
            color: white;
            background: black;
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dropdown-content a:hover, .nested-content a:hover {
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
            background: black;
            color: white;
            padding: 12px 16px;
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
        <a href="#" onclick="showNested(event, 'nested3')">Link 3</a>
    </div>
</div>
<!-- Dropdown End -->

<!-- Container for Nested Content -->
<div id="nested-container" class="nested-container">
    <!-- Nested Content for Link 1 -->
    <div id="nested1" class="nested-content">
        <button class="back-btn" onclick="goBack(event)">Back</button>
        <h2>(Link 1) Nested Level 1 Title 1</h2>
        <a href="#">Nested Link 1.1</a>
        <a href="#">Nested Link 1.2</a>
        <a href="#">Nested Link 1.3</a>
    </div>

    <!-- Nested Content for Link 2 -->
    <div id="nested2" class="nested-content">
        <button class="back-btn" onclick="goBack(event)">Back</button>
        <h2>(Link 2) Nested Level 1 Title 2</h2>
        <a href="#">Nested Link 2.1</a>
        <a href="#">Nested Link 2.2</a>
        <a href="#">Nested Link 2.3</a>
    </div>

    <!-- Nested Content for Link 3-->
    <div id="nested3" class="nested-content">
        <button class="back-btn" onclick="goBack(event)">Back</button>
        <h2>(Link 3) Nested Level 1 Title 1</h2>
        <a href="#">Nested Link 3.1</a>
        <a href="#">Nested Link 3.2</a>
        <a href="#" onclick="showNested(event, 'nested3-1')">Nested Link 3.3</a>
    </div>

    <!-- Nested Content for Link 3 (Level 2) -->
    <div id="nested3-1" class="nested-content">
        <button class="back-btn" onclick="goBack(event)">Back</button>
        <h2>(Link 3) Nested Level 2 Title 1</h2>
        <a href="#">Nested Link 3.3.1</a>
        <a href="#">Nested Link 3.3.2</a>
        <a href="#">Nested Link 3.3.3</a>
    </div>


    <!-- Additional Nested Content Can Be Added Dynamically -->
</div>

<script>
    var navigationStack = [];

    function toggleDropdown(id) {
        var dropdown = document.getElementById(id);
        if (dropdown.classList.contains("show")) {
            dropdown.classList.remove("show");
            setTimeout(() => {
                dropdown.classList.remove("visible");
            }, 300); // Match the transition duration
            document.body.style.overflow = ''; // Restore body scroll
            navigationStack = []; // Reset navigation stack
        } else {
            hideAll();
            dropdown.classList.add("show");
            setTimeout(() => {
                dropdown.classList.add("visible");
            }, 10); // Short delay to trigger transition
            document.body.style.overflow = 'hidden'; // Prevent body scroll
        }
    }

    function showNested(event, id) {
        event.preventDefault(); // Prevent default link behavior

        // Hide all currently shown nested contents
        var nestedContents = document.querySelectorAll('.nested-content.show');
        for (var i = 0; i < nestedContents.length; i++) {
            nestedContents[i].classList.remove("show");
            setTimeout(() => {
                nestedContents[i].classList.remove("visible");
            }, 300); // Match the transition duration
        }

        // Show the selected nested content
        var nestedContent = document.getElementById(id);
        nestedContent.classList.add("show");
        setTimeout(() => {
            nestedContent.classList.add("visible");
        }, 10); // Short delay to trigger transition

        // Determine if the selected content is within a dropdown or nested content
        var parent = nestedContent.closest('.dropdown-content.show, .nested-content.show');
        if (parent) {
            navigationStack.push(parent);
        }
    }

    function goBack(event) {
        event.preventDefault(); // Prevent default button behavior

        // Hide the current nested content
        var currentContent = document.querySelector('.nested-content.show');
        if (currentContent) {
            currentContent.classList.remove("show");
            setTimeout(() => {
                currentContent.classList.remove("visible");
            }, 300); // Match the transition duration
        }

        // Pop the stack to remove the current content's parent
        if (navigationStack.length > 0) {
            console.log(navigationStack[navigationStack.length-1]);

            navigationStack.pop();
        }

        // Show the previous content in the navigation stack
        if (navigationStack.length > 0) {
            var previousContent = navigationStack[navigationStack.length - 1];
            console.log(navigationStack.length);

            console.log(navigationStack[navigationStack.length - 1]);
            previousContent.classList.add("show");
            setTimeout(() => {
                previousContent.classList.add("visible");
            }, 10); // Short delay to trigger transition
        } else {
            // If the stack is empty, show the root dropdown
            var rootDropdown = document.querySelector('.dropdown-content');
            if (rootDropdown) {
                rootDropdown.classList.add("show");
                setTimeout(() => {
                    rootDropdown.classList.add("visible");
                }, 10); // Short delay to trigger transition
            }
        }
    }

    function hideAll() {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("show");
            setTimeout(() => {
                dropdowns[i].classList.remove("visible");
            }, 300); // Match the transition duration
        }
        var nestedContents = document.getElementsByClassName("nested-content");
        for (var i = 0; i < nestedContents.length; i++) {
            nestedContents[i].classList.remove("show");
            setTimeout(() => {
                nestedContents[i].classList.remove("visible");
            }, 300); // Match the transition duration
        }
        document.body.style.overflow = ''; // Restore body scroll
        navigationStack = []; // Reset navigation stack
    }
</script>

</body>
</html>
