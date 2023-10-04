<!DOCTYPE html>
<html>
<head>
    <title>Leave Application Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .active {
            text-decoration: underline; /* Highlight color */
            color: #fff; /* Text color on highlight */
            }
            
            /* Style for other navigation items (optional) */
            nav ul li {
            display: inline;
            margin-right: 20px;
            }

        .form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            padding: 50px;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .form h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            margin-bottom: 10px;
        }

        .form input[type="text"],
        .form input[type="number"],
        .form input[type="date"],
        .form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form input[type="submit"] {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: #555;
        }

        @media (max-width: 768px) {
            .form {
                max-width: 90%;
            }
        }

        @media (max-width: 480px) {
            .form {
                max-width: 100%;
            }
        }

        .form:hover {
            transform: scale(1.02);
        }
    </style>
    <script>
    // Get the current page's filename (e.g., "order.html")
    const currentPage = location.pathname.split('/').pop();

    // Map the filename to the corresponding link ID
    const pageToLinkId = {
        
        'front.php':'home-link',
        'casual.php':'leave-link',
        'medical.php':'leave-link',
        'display_casual.php':'order-link',
        'display_medical.php':'order-link',
    
    };

    // Get the corresponding link ID for the current page
    const currentLinkId = pageToLinkId[currentPage];

    // Add the "active" class to the current link
    if (currentLinkId) {
        document.getElementById(currentLinkId).classList.add('active');
    }
</script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="front.php" id="home-link">Home</a></li>
            <li class="dropdown" id="leave-link">Apply Leave
                <div class="dropdown-content">
                    <div class="sub-dropdown">
                        <a href="casual.php">Casual</a>
                    </div>
                    <div class="sub-dropdown">
                        <a href="medical.php">Medical</a>
                    </div>
                </div>
            </li>
            <li class="dropdown" id="order-link">My Leave
                <div class="dropdown-content">
                    <div class="sub-dropdown">
                        <a href="display_casual.php">Casual</a>
                    </div>
                    <div class="sub-dropdown">
                        <a href="display_medical.php">Medical</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    
    <ul>
        <a style="color:white; font-weight: bold; font-size: 16px;" href="index.php">Logout</a>
    </ul>
</header>
<h1>Leave Application Form</h1>
<div class="form">
<form  method="POST" action="casual_leave.php">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>

    <label for="department">Department:</label>
    <input type="text" name="department" required><br><br>

    <label for="year">Year:</label>
    <input type="number" name="year" required><br><br>

    <label for="from_date">From Date:</label>
    <input type="date" name="from_date" required><br><br>

    <label for="to_date">To Date:</label>
    <input type="date" name="to_date" required><br><br>

    <label for="reason">Reason for Leave:</label>
    <textarea name="reason" rows="4" required></textarea><br><br>

    <input type="hidden" value="Not yet approved">

    <input type="submit" name="submit" value="Submit">
</form>
</div>
</body>
</html>
