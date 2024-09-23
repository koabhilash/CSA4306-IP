<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="My Donor Info" content="width=device-width, initial-scale=1.0">
    <title>View Donor Information</title>
    <style>
 body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px; /* Set a wider container */
    margin: 50px auto;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #343a40;
    text-align: center;
    margin-bottom: 30px;
}

table {
    width: 100%; /* Table width set to 100% of container */
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #dee2e6;
}

th, td {
    padding: 15px; /* Increased padding for better spacing */
    text-align: left;
}

th {
    background-color: #007bff;
    color: white;
    font-size: 16px; /* Increased font size */
}

td {
    background-color: #fdfdfd;
    font-size: 15px; /* Increased font size */
}

tr:nth-child(even) td {
    background-color: #f2f2f2; /* Zebra striping for rows */
}

a {
    color: #dc3545;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
.back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #c82333;
        }
</style>
</head>
<body>
<button class="back-button" onclick="window.history.back();">Back</button>
<div class="container">
    <h2>Donor Information</h2>
    
    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bloodbank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete record if delete button is clicked
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $delete_sql = "DELETE FROM donortable WHERE id = $delete_id";
        $conn->query($delete_sql);
    }

    // Fetch donor data
    $sql = "SELECT * FROM donortable";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood Group</th>
                    <th>Location</th> <!-- Added this line -->
                    <th>Units</th> <!-- Added this line -->
                    <th>Availability</th>
                    <th>Donation History</th>
                    <th>Donation Date</th>
                    <th>Action</th>
                </tr>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['blood_group'] . "</td>
                    <td>" . $row['location'] . "</td> <!-- Added this line -->
                    <td>" . $row['units'] . "</td> <!-- Added this line -->
                    <td>" . $row['availability'] . "</td>
                    <td>" . $row['donation_history'] . "</td>
                    <td>" . $row['donated_date'] . "</td>
                    <td><a href='mydoninfo.php?delete_id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No donor information available.";
    }

    $conn->close();
    ?>

    <form action="postdon.php" method="get">
        <input type="submit" value="Add New Donor">
    </form>
</div>

</body>
</html>
