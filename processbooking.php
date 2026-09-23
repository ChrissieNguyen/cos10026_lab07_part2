<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim tour booking confirmation">
    <meta name="keywords" content="MiddleEarth, Tours, Rohan">
    <meta name="author" content="Chrissie Nguyen">
    <title>Booking Confirmation</title>
</head>

<body>

    <h1>Rohirrim Tour Booking Confirmation</h1>

    <?php
    function sanitiseInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstname = isset($_POST["firstname"])
            ? sanitiseInput($_POST["firstname"])
            : "";

        $lastname = isset($_POST["lastname"])
            ? sanitiseInput($_POST["lastname"])
            : "";

        $age = isset($_POST["age"])
            ? sanitiseInput($_POST["age"])
            : "";

        $speciesCode = isset($_POST["species"])
            ? sanitiseInput($_POST["species"])
            : "";

        $food = isset($_POST["food"])
            ? sanitiseInput($_POST["food"])
            : "";

        $partysize = isset($_POST["partysize"])
            ? sanitiseInput($_POST["partysize"])
            : "";

        $speciesNames = [
            "M" => "Human",
            "D" => "Dwarf",
            "E" => "Elf",
            "H" => "Hobbit"
        ];

        $species = isset($speciesNames[$speciesCode])
            ? $speciesNames[$speciesCode]
            : "Not specified";

        $bookings = [];

        if (isset($_POST["accom"])) {
            $bookings[] = "Accommodation";
        }

        if (isset($_POST["4day"])) {
            $bookings[] = "Four-day tour";
        }

        if (isset($_POST["10day"])) {
            $bookings[] = "Ten-day tour";
        }

        if (count($bookings) > 0) {
            $bookingList = implode(" and ", $bookings);
        } else {
            $bookingList = "No tour selected";
        }

        echo "<p>";
        echo "Welcome {$firstname} {$lastname} !<br>";
        echo "You are now booked on the {$bookingList}<br>";
        echo "Species: {$species}<br>";
        echo "Age: {$age}<br>";
        echo "Meal Preference: {$food}<br>";
        echo "Number of travellers: {$partysize}";
        echo "</p>";
    } else {
        echo "<p>No booking information was submitted.</p>";
    }
    ?>

</body>

</html>