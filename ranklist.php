<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Engineering College | Rank List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-image: linear-gradient(-225deg, #FFFEFF 0%, #D7FFFE 100%);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding-top: 20px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        header {
            text-align: center;
            padding: 20px;
        }

        .header-title {
            font-size: 36px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav ul {
            list-style: none;
        }

        .nav-links li {
            display: inline-block;
            margin-right: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #0acffe;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="header-title">ABC Engineering College</h1>
        <nav>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="form.html">Application Form</a></li>
                <li><a href="allottedcourse.php">Allotted Course</a></li>
                <li><a href="ranklist.php">Rank List</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Rank List</h1>
        <table>
            <thead>
                <tr>
                    <th>Rank </th>
                    <th>Register No</th>
                    <th>Student Name</th>
                    <th>Cut Off</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $file = fopen("ranklist.txt", "r");
                    if ($file) {
                        while (($line = fgets($file)) !== false) {
                            $data = explode("\t", trim($line));
                            echo "<tr>";
                            foreach ($data as $cell) {
                                echo "<td>" . htmlspecialchars($cell) . "</td>";
                            }
                            echo "</tr>";
                        }
                        fclose($file);
                    } else {
                        echo "<tr><td colspan='12'>Error: Unable to open file.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="index.html" class="btn">Go Back to Home Page</a>
    </div>
</body>
</html>