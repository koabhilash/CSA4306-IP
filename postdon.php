<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Donor Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 15px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select,
        textarea {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            transition: border-color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #80bdff;
            outline: none;
        }

        input[type="submit"] {
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success-message {
            margin-top: 20px;
            color: #28a745;
            text-align: center;
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $blood_group = $_POST['blood_group'];
        $location = $_POST['location']; // Added location field
        $units = $_POST['units']; // Added units field
        $availability = $_POST['availability'];
        $donation_history = $_POST['donation_history'];
        $donated_date = $_POST['donated_date'];

        // Insert data into the database
        $sql = "INSERT INTO donortable (name, email, phone, blood_group, location, units, availability, donation_history, donated_date) 
                VALUES ('$name', '$email', '$phone', '$blood_group', '$location', '$units', '$availability', '$donation_history', '$donated_date')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success-message'>Successfully submitted!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    <h2>Enter Donor Information</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") echo 'display:none;'; ?>">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="blood_group">Blood Group:</label>
        <select id="blood_group" name="blood_group" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="location">Location:</label> <!-- Added location field -->
        <input type="text" id="location" name="location" required>

        <label for="units">Units (mmHg):</label> <!-- Added units field -->
        <input type="number" id="units" name="units" required>

        <label for="availability">Availability for Donation:</label>
        <select id="availability" name="availability" required>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>

        <label for="donation_history">Donation History:</label>
        <textarea id="donation_history" name="donation_history" rows="4"></textarea>

        <label for="donated_date">Donation Date:</label>
        <input type="date" id="donated_date" name="donated_date" required>

        <input type="submit" value="Submit">
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="button" value="New Entry" onclick="document.querySelector('form').style.display='block'; this.style.display='none';">
    </form>
</div>

</body>
</html>
