<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        td {
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="hospital_logo.png" alt="Hospital Logo">
        </div>
        <div class="hospital-name">
            <h1>Medical Care Healthcare</h1>
        </div>
    </header>
    <div class="container">
        <nav class="sidebar">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="registration.html">Registration</a></li>
                <li><a href="records.php" class="active">Records</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </nav>
        <main>
            <h2>Patient Records</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>County</th>
                    <th>Age</th>
                </tr>
                <?php
                // Connect to MySQL database
                $conn = mysqli_connect("localhost", "root", "", "hospital_db");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch records from database
                $sql = "SELECT * FROM patients";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["firstName"] . "</td>";
                        echo "<td>" . $row["lastName"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["county"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 results</td></tr>";
                }

                // Close MySQL connection
                $conn->close();
                ?>
            </table>
        </main>
    </div>
    <footer>
        <h3>Dushime Jean Fidele | p15/145567/2022</h3>
    </footer>
</body>
</html>
