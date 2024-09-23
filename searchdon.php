<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Donor</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }

        .search-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #495057;
        }

        input[type="text"],
        input[type="number"],
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #80bdff;
            outline: none;
        }

        .btn-search {
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-search:hover {
            background-color: #0056b3;
        }

        .donor-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .donor-table,
        .donor-table th,
        .donor-table td {
            border: 1px solid #dee2e6;
        }

        .donor-table th,
        .donor-table td {
            padding: 15px;
            text-align: left;
        }

        .donor-table th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }

        .donor-table td {
            background-color: #fdfdfd;
            font-size: 15px;
        }

        .donor-table tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        .no-results {
            color: #dc3545;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
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
        <h1>Search for a Donor</h1>
        <form action="searchdon.php" method="post" class="search-form">
            <div class="form-group">
                <label for="blood_group">Blood Group:</label>
                <select name="blood_group" id="blood_group" required>
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter Location" required>
            </div>
            <div class="form-group">
                <label for="units">Units (mmHg):</label>
                <input type="number" id="units" name="units" placeholder="Enter Units in mmHg" required>
            </div>
            <div class="form-group">
                <button type="submit" name="search" class="btn-search" value="search">Search</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $blood_group = $_POST['blood_group'];
            $location = $_POST['location'];
            $units = $_POST['units'];

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

            // Modify the query to include location and units
            $sql = "SELECT * FROM donortable WHERE blood_group='$blood_group' AND location='$location' AND units >= $units";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='donor-table'>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Blood Group</th>
                            <th>Location</th>
                            <th>Units</th>
                            <th>Availability</th>
                            <th>Donation History</th>
                            <th>Donation Date</th>
                        </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['blood_group'] . "</td>
                            <td>" . $row['location'] . "</td>
                            <td>" . $row['units'] . "</td>
                            <td>" . $row['availability'] . "</td>
                            <td>" . $row['donation_history'] . "</td>
                            <td>" . $row['donated_date'] . "</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-results'>No results found.</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
