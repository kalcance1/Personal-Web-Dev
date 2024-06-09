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
        .dropdown-content {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #f9f9f9;
            z-index: 1;
            overflow: auto;
            transition: transform 0.3s ease-in-out;
        }
        .dropdown-content.show {
            display: block;
            transform: translateX(0);
        }
        .dropdown-content.hide {
            transform: translateX(-100%);
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<!-- Dropdown Start -->
<div class="dropdown">
    <button class="hamburger" onclick="toggleDropdown()">☰ Menu</button>
    <div class="dropdown-content" id="dropdown">
    </div>
</div>
<!-- Dropdown End -->

<script>
    var menuItems = [
        { label: "Link 1", submenu: [
            { label: "Nested Link 1.1" },
            { label: "Nested Link 1.2", submenu: [
                { label: "Nested Link 1.2.1" },
                { label: "Nested Link 1.2.2" }
            ]},
            { label: "Nested Link 1.3" }
        ]},
        { label: "Link 2", submenu: [
            { label: "Nested Link 2.1" },
            { label: "Nested Link 2.2" },
            { label: "Nested Link 2.3" }
        ]},
        { label: "Link 3" }
    ];

    var backStack = []; // Stack to store the parent items

    function toggleDropdown() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('show');
        if (dropdown.classList.contains('show')) {
            renderMenuItems(menuItems);
        } else {
            dropdown.innerHTML = ''; // Clear the dropdown content
            backStack = []; // Clear the back stack when closing the dropdown
        }
    }

    function renderMenuItems(items) {
        var dropdown = document.getElementById('dropdown');
        dropdown.innerHTML = ''; // Clear existing menu items
        // Add a back button if the back stack is not empty
        if (backStack.length > 0) {
            var backButton = document.createElement('button');
            backButton.textContent = 'Back';
            backButton.onclick = function() {
                renderMenuItems(backStack.pop()); // Render the parent items
            };
            dropdown.appendChild(backButton);
        }
        // Render menu items
        items.forEach(function(item) {
            var link = document.createElement('a');
            link.href = '#';
            link.textContent = item.label;
            link.onclick = function(event) {
                event.preventDefault();
                if (item.submenu) {
                    backStack.push(items); // Push current items to the back stack
                    renderMenuItems(item.submenu); // Render submenu items
                }
            };
            dropdown.appendChild(link);
        });
    }
</script>

</body>
</html>
