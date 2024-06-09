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
        <button class="back-btn" onclick="goBack(event)">Back</button>
        <a href="#" onclick="showSubMenu(event, 0)">Link 1</a>
        <a href="#" onclick="showSubMenu(event, 1)">Link 2</a>
        <a href="#">Link 3</a>
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

    function toggleDropdown() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('show');
    }

    function showSubMenu(event, index) {
        event.preventDefault();
        var submenu = menuItems[index].submenu;
        var dropdown = document.getElementById('dropdown');
        dropdown.innerHTML = ''; // Clear existing menu items
        submenu.forEach(function(item) {
            var link = document.createElement('a');
            link.href = '#';
            link.textContent = item.label;
            link.onclick = function(event) {
                event.preventDefault();
                // If the submenu item has a submenu, recursively show it
                if (item.submenu) {
                    showSubMenu(event, submenu.indexOf(item));
                }
            };
            dropdown.appendChild(link);
        });
    }

    function goBack(event) {
        event.preventDefault();
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.remove('show');
    }
</script>

</body>
</html>
