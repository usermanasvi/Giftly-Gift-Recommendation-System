<?php

include "db.php";

/* =========================
   GET USER SELECTIONS
   ========================= */

$person   = $_GET['person'] ?? '';
$age      = $_GET['age'] ?? '';
$occasion = $_GET['occasion'] ?? '';
$budget   = $_GET['budget'] ?? '';
$interest = $_GET['interest'] ?? '';


/* =========================
   GET ALL GIFTS
   ========================= */

$sql = "SELECT * FROM gifts";
$result = mysqli_query($conn, $sql);

$gifts = [];


/* =========================
   CHECK EVERY GIFT
   ========================= */

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        $score = 0;

        $name = strtolower($row['name'] ?? '');
        $description = strtolower($row['description'] ?? '');

        $text = $name . " " . $description;

        $price = floatval($row['price']);


        /* =========================
           BUDGET MATCHING
           ========================= */

        $budgetMatch = false;

        if ($budget == "low" && $price >= 500 && $price <= 1000) {
            $score += 5;
            $budgetMatch = true;
        }

        elseif ($budget == "medium" && $price >= 1000 && $price <= 2500) {
            $score += 5;
            $budgetMatch = true;
        }

        elseif ($budget == "high" && $price >= 2500 && $price <= 5000) {
            $score += 5;
            $budgetMatch = true;
        }

        elseif ($budget == "premium" && $price >= 5000) {
            $score += 5;
            $budgetMatch = true;
        }


        /* =========================
           INTEREST MATCHING
           ========================= */

        if ($interest == "technology") {

            if (
                strpos($text, "watch") !== false ||
                strpos($text, "smart") !== false ||
                strpos($text, "electronic") !== false ||
                strpos($text, "headphone") !== false ||
                strpos($text, "gadget") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "fashion") {

            if (
                strpos($text, "fashion") !== false ||
                strpos($text, "perfume") !== false ||
                strpos($text, "watch") !== false ||
                strpos($text, "jewelry") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "books") {

            if (
                strpos($text, "book") !== false ||
                strpos($text, "novel") !== false ||
                strpos($text, "reading") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "fitness") {

            if (
                strpos($text, "fitness") !== false ||
                strpos($text, "gym") !== false ||
                strpos($text, "sport") !== false ||
                strpos($text, "watch") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "music") {

            if (
                strpos($text, "music") !== false ||
                strpos($text, "headphone") !== false ||
                strpos($text, "speaker") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "gaming") {

            if (
                strpos($text, "gaming") !== false ||
                strpos($text, "game") !== false ||
                strpos($text, "headphone") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "travel") {

            if (
                strpos($text, "travel") !== false ||
                strpos($text, "bag") !== false ||
                strpos($text, "camera") !== false
            ) {
                $score += 5;
            }

        }

        elseif ($interest == "art") {

            if (
                strpos($text, "art") !== false ||
                strpos($text, "paint") !== false ||
                strpos($text, "creative") !== false
            ) {
                $score += 5;
            }

        }


        /* =========================
           PERSON MATCHING
           ========================= */

        if ($person == "mother") {

            if (
                strpos($text, "mother") !== false ||
                strpos($text, "mom") !== false ||
                strpos($text, "perfume") !== false ||
                strpos($text, "mug") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($person == "father") {

            if (
                strpos($text, "father") !== false ||
                strpos($text, "dad") !== false ||
                strpos($text, "watch") !== false ||
                strpos($text, "gadget") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($person == "partner") {

            if (
                strpos($text, "perfume") !== false ||
                strpos($text, "chocolate") !== false ||
                strpos($text, "personalized") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($person == "friend") {

            if (
                strpos($text, "headphone") !== false ||
                strpos($text, "mug") !== false ||
                strpos($text, "book") !== false
            ) {
                $score += 2;
            }

        }


        /* =========================
           OCCASION MATCHING
           ========================= */

        if ($occasion == "birthday") {

            if (
                strpos($text, "birthday") !== false ||
                strpos($text, "chocolate") !== false ||
                strpos($text, "gift") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($occasion == "anniversary") {

            if (
                strpos($text, "anniversary") !== false ||
                strpos($text, "perfume") !== false ||
                strpos($text, "personalized") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($occasion == "wedding") {

            if (
                strpos($text, "wedding") !== false ||
                strpos($text, "hamper") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($occasion == "festival") {

            if (
                strpos($text, "festival") !== false ||
                strpos($text, "hamper") !== false ||
                strpos($text, "chocolate") !== false
            ) {
                $score += 2;
            }

        }


        /* =========================
           AGE MATCHING
           ========================= */

        if ($age == "teen") {

            if (
                strpos($text, "headphone") !== false ||
                strpos($text, "book") !== false ||
                strpos($text, "gaming") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($age == "young") {

            if (
                strpos($text, "watch") !== false ||
                strpos($text, "headphone") !== false ||
                strpos($text, "perfume") !== false
            ) {
                $score += 2;
            }

        }

        elseif ($age == "adult") {

            if (
                strpos($text, "watch") !== false ||
                strpos($text, "perfume") !== false ||
                strpos($text, "mug") !== false
            ) {
                $score += 2;
            }

        }


        /* =========================
           SAVE SCORE
           ========================= */

        $row['score'] = $score;
        $row['budgetMatch'] = $budgetMatch;

        $gifts[] = $row;
    }
}


/* =========================
   SORT BY SCORE
   ========================= */

usort($gifts, function ($a, $b) {
    return $b['score'] <=> $a['score'];
});


/* =========================
   SHOW ONLY TOP 3
   ========================= */

$gifts = array_slice($gifts, 0, 3);

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gift Recommendations - Giftly</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }


        body {
            background-color: #fff8f5;
            color: #292929;
        }


        .header {
            background-color: white;
            padding: 25px 8%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }


        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #ff5f63;
        }


        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
        }


        h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }


        .subtitle {
            color: #657078;
            font-size: 18px;
            margin-bottom: 40px;
        }


        .details {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
        }


        .details span {
            display: inline-block;
            background-color: #fff0ec;
            padding: 10px 18px;
            margin: 5px;
            border-radius: 20px;
            font-weight: bold;
        }


        .gift-container {
            display: flex;
            justify-content: center;
            gap: 25px;
            flex-wrap: wrap;
        }


        .gift-card {
            width: 270px;
            background-color: white;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            transition: 0.3s;
        }


        .gift-card:hover {
            transform: translateY(-8px);
        }


        /* =========================
           PRODUCT IMAGE
           ========================= */

        .gift-image {
            width: 100%;
            height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            overflow: hidden;
            border-radius: 15px;
        }


        .gift-image img {
            width: 100%;
            height: 180px;
            object-fit: contain;
        }


        .gift-card h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }


        .gift-card p {
            color: #657078;
            line-height: 1.5;
            margin-bottom: 10px;
        }


        .price {
            color: #ff5f63;
            font-size: 20px;
            font-weight: bold;
        }


        .score {
            margin-top: 10px;
            font-size: 14px;
            color: #777;
        }


        /* =========================
           BUY BUTTONS
           ========================= */

        .buy-buttons {
            margin-top: 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }


        .buy-buttons a {
            display: block;
            padding: 11px 10px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }


        .amazon-btn {
            background-color: #ff9900;
            color: white;
        }


        .flipkart-btn {
            background-color: #2874f0;
            color: white;
        }


        .buy-buttons a:hover {
            opacity: 0.85;
        }


        .back-button {
            display: inline-block;
            margin-top: 40px;
            padding: 15px 30px;
            background-color: #ff6267;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
        }


        .no-gifts {
            background-color: white;
            padding: 40px;
            border-radius: 20px;
            font-size: 20px;
        }

    </style>

</head>


<body>


    <div class="header">

        <div class="logo">
            Giftly
        </div>

    </div>


    <div class="container">


        <h1>
            Recommended Gifts 🎁
        </h1>


        <p class="subtitle">
            Recommendations based on your preferences
        </p>


        <!-- USER SELECTIONS -->

        <div class="details">

            <span>
                Person:
                <?php echo htmlspecialchars($person); ?>
            </span>


            <span>
                Age:
                <?php echo htmlspecialchars($age); ?>
            </span>


            <span>
                Occasion:
                <?php echo htmlspecialchars($occasion); ?>
            </span>


            <span>
                Budget:
                <?php echo htmlspecialchars($budget); ?>
            </span>


            <span>
                Interest:
                <?php echo htmlspecialchars($interest); ?>
            </span>

        </div>


        <!-- RECOMMENDED GIFTS -->

        <div class="gift-container">

            <?php

            if (count($gifts) > 0) {

                foreach ($gifts as $row) {

            ?>

                <div class="gift-card">

                    <!-- REAL PRODUCT IMAGE -->

                    <div class="gift-image">

                        <img
                            src="img/<?php echo htmlspecialchars($row['image']); ?>"
                            alt="<?php echo htmlspecialchars($row['name']); ?>"
                        >

                    </div>


                    <h2>

                        <?php
                        echo htmlspecialchars($row['name']);
                        ?>

                    </h2>


                    <p>

                        <?php
                        echo htmlspecialchars($row['description']);
                        ?>

                    </p>


                    <div class="price">

                        ₹<?php echo htmlspecialchars($row['price']); ?>

                    </div>


                    <div class="score">

                        Match Score:
                        <?php echo $row['score']; ?>

                    </div>


                    <!-- BUY BUTTONS -->

                    <div class="buy-buttons">

                        <a
                            href="https://www.amazon.in/s?k=<?php echo urlencode($row['name']); ?>"
                            target="_blank"
                            class="amazon-btn"
                        >
                            🛒 Buy on Amazon
                        </a>


                        <a
                            href="https://www.flipkart.com/search?q=<?php echo urlencode($row['name']); ?>"
                            target="_blank"
                            class="flipkart-btn"
                        >
                            🛍️ Buy on Flipkart
                        </a>

                    </div>

                </div>


            <?php

                }

            } else {

            ?>

                <div class="no-gifts">

                    No suitable gifts found.

                    <br><br>

                    Try changing your preferences.

                </div>

            <?php

            }

            ?>

        </div>


        <a href="index.php#find"
           class="back-button">

            ← Find Another Gift

        </a>


    </div>


</body>

</html>