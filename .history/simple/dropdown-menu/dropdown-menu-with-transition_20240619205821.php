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
            visibility: hidden;
        }
        .visible {
            visibility: visible;
            opacity: 1;
            transform: translateX(0);
        }
        .dropdown-content a, .nested-content a, .nested-content button {
            color: black;
            padding: 20px 16px;
            text-decoration: none;
            display: block;
            text-align: center;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .nested-content h2 {
            font-weight: bold;
            text-align: center; 
            font-size: 16px;
        }
        .nested-content button {
            color: white;
            background: linear-gradient(rgb(57 66 167),rgb(40,49,111));
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .nested-content a {
            color: black;
            padding: 20px 16px;
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
            background: linear-gradient(rgb(57 66 167),rgb(40,49,111));
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
        <a href="#">Link 3</a>
    </div>
</div>
<!-- Dropdown End -->

<!-- Nested Content Start -->
<div id="nested1" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>(Link 1) Nested Level 1 Title 1</h2>
    <a href="#">Nested Link 1.1</a>
    <a href="#">Nested Link 1.2</a>
    <a href="#" onclick="showNested(event, 'nested3')">Nested Link 1.3</a>
</div>

<div id="nested2" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>(Link 2) Nested Level 1 Title 2</h2>
    <a href="#">Nested Link 2.1</a>
    <a href="#">Nested Link 2.2</a>
    <a href="#" onclick="showNested(event, 'nested4')">Nested Link 2.3</a>
</div>

<div id="nested3" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>(Link 1) Nested Level 2 Title 1</h2>
    <a href="#">Nested Link 1.3.1</a>
    <a href="#">Nested Link 1.3.2</a>
</div>

<div id="nested4" class="nested-content">
    <button class="back-btn" onclick="goBack(event)">Back</button>
    <h2>(Link 2) Nested Level 2 Title 2</h2>
    <a href="#">Nested Link 2.3.1</a>
    <a href="#">Nested Link 2.3.2</a>
</div>
<!-- Nested Content End -->

<script>
var navigationStack = [];

function toggleDropdown(id) {
    var dropdown = document.getElementById(id);
    if (dropdown.classList.contains("show")) {
        dropdown.classList.remove("visible");
        setTimeout(() => {
            dropdown.classList.remove("show");
            document.body.style.overflow = ''; // Restore body scroll
            navigationStack = []; // Reset navigation stack
        }, 300); // Match the transition duration
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

    var currentVisible = document.querySelector('.nested-content.visible');
    if (currentVisible) {
        currentVisible.classList.remove("visible");
        setTimeout(() => {
            currentVisible.classList.remove("show");

            var nestedContent = document.getElementById(id);
            nestedContent.classList.add("show");
            setTimeout(() => {
                nestedContent.classList.add("visible");
            }, 10); // Short delay to trigger transition

            var parent = nestedContent.closest('.dropdown-content.show, .nested-content.show');
            if (parent) {
                navigationStack.push(parent);
            }
        }, 300); // Match the transition duration
    } else {
        var nestedContent = document.getElementById(id);
        nestedContent.classList.add("show");
        setTimeout(() => {
            nestedContent.classList.add("visible");
        }, 10); // Short delay to trigger transition

        var parent = nestedContent.closest('.dropdown-content.show, .nested-content.show');
        if (parent) {
            navigationStack.push(parent);
        }
    }
}

function goBack(event) {
    event.preventDefault(); // Prevent default button behavior

    var currentContent = document.querySelector('.nested-content.visible');
    if (currentContent) {
        currentContent.classList.remove("visible");
        setTimeout(() => {
            currentContent.classList.remove("show");

            if (navigationStack.length > 0) {
                navigationStack.pop();
            }

            if (navigationStack.length > 0) {
                var previousContent = navigationStack[navigationStack.length - 1];
                previousContent.classList.add("show");
                setTimeout(() => {
                    previousContent.classList.add("visible");
                }, 10); // Short delay to trigger transition
            } else {
                var rootDropdown = document.querySelector('.dropdown-content');
                if (rootDropdown) {
                    rootDropdown.classList.add("show");
                    setTimeout(() => {
                        rootDropdown.classList.add("visible");
                    }, 10); // Short delay to trigger transition
                }
            }
        }, 300); // Match the transition duration
    }
}

function hideAll() {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
        dropdowns[i].classList.remove("visible");
        setTimeout(() => {
            dropdowns[i].classList.remove("show");
        }, 300); // Match the transition duration
    }
    var nestedContents = document.getElementsByClassName("nested-content");
    for (var i = 0; i < nestedContents.length; i++) {
        nestedContents[i].classList.remove("visible");
        setTimeout(() => {
            nestedContents[i].classList.remove("show");
        }, 300); // Match the transition duration
    }
    document.body.style.overflow = ''; // Restore body scroll
    navigationStack = []; // Reset navigation stack
}

</script>

</body>
</html>
