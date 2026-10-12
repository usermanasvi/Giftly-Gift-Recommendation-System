<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Giftly - Perfect Gift Recommendation</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background-color: #fff8f5;
            color: #292929;
        }

        /* ================= NAVBAR ================= */

        nav {
            width: 100%;
            height: 75px;
            background-color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 8%;

            box-shadow: 0 2px 10px rgba(0,0,0,0.05);

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            color: #ff5f63;
        }

        .logo span {
            color: #333;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 35px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: 500;
        }

        nav ul li a:hover {
            color: #ff5f63;
        }

        /* ================= HERO ================= */

        .hero {
            min-height: 550px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 70px 8%;

            background-color: #fff5f1;
        }

        .hero-content {
            width: 55%;
        }

        .hero-content h1 {
            font-size: 65px;
            line-height: 1.1;
            margin-bottom: 25px;
        }

        .hero-content h1 span {
            color: #ff6267;
        }

        .hero-content p {
            font-size: 20px;
            line-height: 1.7;
            color: #657078;
            max-width: 650px;
            margin-bottom: 35px;
        }

        .hero-image {
            width: 40%;
            text-align: center;
        }

        .gift-box {
            font-size: 180px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0);
            }

        }

        .main-button {
            background-color: #ff6267;
            color: white;

            border: none;
            border-radius: 30px;

            padding: 16px 32px;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;

            text-decoration: none;

            display: inline-block;
        }

        .main-button:hover {
            background-color: #e84f55;
            transform: scale(1.03);
        }

        /* ================= WHY GIFTLY ================= */

        .why {
            padding: 80px 8%;
            background-color: white;
            text-align: center;
        }

        .section-title {
            font-size: 40px;
            margin-bottom: 50px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .card {
            width: 280px;
            min-height: 260px;

            padding: 35px 25px;

            background-color: #fff7f3;

            border-radius: 20px;

            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .card-icon {
            font-size: 55px;
            margin-bottom: 20px;
        }

        .card h3 {
            font-size: 23px;
            margin-bottom: 15px;
        }

        .card p {
            color: #657078;
            font-size: 16px;
            line-height: 1.6;
        }

        /* ================= FIND GIFT ================= */

        .find-section {
            padding: 80px 8%;
            background-color: #fff5f1;
            text-align: center;
        }

        .find-section h2 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .find-section > p {
            color: #657078;
            font-size: 18px;
            margin-bottom: 40px;
        }

        .form-box {
            max-width: 850px;
            margin: auto;

            background-color: white;

            padding: 40px;

            border-radius: 20px;

            box-shadow: 0 10px 30px rgba(0,0,0,0.07);

            text-align: left;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .form-group {
            width: 50%;
        }

        .form-group.full {
            width: 100%;
        }

        label {
            display: block;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        select,
        input {
            width: 100%;

            padding: 14px;

            border: 1px solid #ddd;

            border-radius: 10px;

            font-size: 16px;

            outline: none;
        }

        select:focus,
        input:focus {
            border-color: #ff6267;
        }

        .recommend-button {
            width: 100%;

            padding: 15px;

            border: none;
            border-radius: 10px;

            background-color: #ff6267;
            color: white;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;
        }

        .recommend-button:hover {
            background-color: #e84f55;
        }

        /* ================= ABOUT ================= */

        .about {
            padding: 80px 8%;
            background-color: white;
            text-align: center;
        }

        .about p {
            max-width: 850px;
            margin: auto;

            font-size: 18px;
            line-height: 1.8;

            color: #657078;
        }

        /* ================= FOOTER ================= */

        footer {
            background-color: #292929;
            color: white;

            text-align: center;

            padding: 30px;
        }

        footer span {
            color: #ff6267;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 800px) {

            nav {
                padding: 0 5%;
            }

            nav ul {
                gap: 12px;
            }

            nav ul li a {
                font-size: 13px;
            }

            .hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-content {
                width: 100%;
            }

            .hero-content h1 {
                font-size: 45px;
            }

            .hero-image {
                width: 100%;
                margin-top: 40px;
            }

            .gift-box {
                font-size: 120px;
            }

            .form-row {
                flex-direction: column;
            }

            .form-group {
                width: 100%;
            }

        }

    </style>

</head>


<body>


    <!-- ================= NAVBAR ================= -->

    <nav>

        <div class="logo">
            Gift<span>ly</span>
        </div>

        <ul>

            <li>
                <a href="#home">Home</a>
            </li>

            <li>
                <a href="#find">Find a Gift</a>
            </li>

            <li>
                <a href="#about">About</a>
            </li>

        </ul>

    </nav>


    <!-- ================= HERO SECTION ================= -->

    <section class="hero" id="home">

        <div class="hero-content">

            <h1>
                Find the
                <span>Perfect Gift</span>
                for Everyone
            </h1>

            <p>
                Giftly helps you discover thoughtful gift ideas
                based on the person's interests, occasion,
                age and your budget.
            </p>

            <a href="#find" class="main-button">
                Find a Gift 🎁
            </a>

        </div>


        <div class="hero-image">

            <div class="gift-box">
                🎁
            </div>

        </div>

    </section>


    <!-- ================= WHY USE GIFTLY ================= -->

    <section class="why">

        <h2 class="section-title">
            Why Use Giftly?
        </h2>


        <div class="cards">

            <div class="card">

                <div class="card-icon">
                    🎯
                </div>

                <h3>
                    Personalized
                </h3>

                <p>
                    Get gift suggestions based on
                    the person's interests and preferences.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    💰
                </div>

                <h3>
                    Budget Friendly
                </h3>

                <p>
                    Find suitable gifts according
                    to your available budget.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    🎉
                </div>

                <h3>
                    Every Occasion
                </h3>

                <p>
                    Birthday, anniversary, wedding,
                    festivals and many more occasions.
                </p>

            </div>

        </div>

    </section>


    <!-- ================= FIND A GIFT ================= -->

    <section class="find-section" id="find">

        <h2>
            Find Your Perfect Gift 🎁
        </h2>

        <p>
            Tell us a little about the person and we will
            suggest suitable gifts.
        </p>


        <div class="form-box">

            <!-- IMPORTANT:
                 The form now sends data to recommend.php
            -->

            <form id="giftForm">


                <!-- PERSON -->

                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Person
                        </label>

                        <select id="person" name="person">

                            <option value="">
                                Select Person
                            </option>

                            <option value="friend">
                                Friend
                            </option>

                            <option value="mother">
                                Mother
                            </option>

                            <option value="father">
                                Father
                            </option>

                            <option value="sibling">
                                Brother / Sister
                            </option>

                            <option value="partner">
                                Partner
                            </option>

                            <option value="other">
                                Other
                            </option>

                        </select>

                    </div>


                    <!-- AGE -->

                    <div class="form-group">

                        <label>
                            Age Group
                        </label>

                        <select id="age" name="age">

                            <option value="">
                                Select Age
                            </option>

                            <option value="child">
                                Under 13
                            </option>

                            <option value="teen">
                                13 - 18
                            </option>

                            <option value="young">
                                19 - 30
                            </option>

                            <option value="adult">
                                31 - 50
                            </option>

                            <option value="senior">
                                51+
                            </option>

                        </select>

                    </div>

                </div>


                <!-- OCCASION -->

                <div class="form-row">

                    <div class="form-group">

                        <label>
                            Occasion
                        </label>

                        <select id="occasion" name="occasion">

                            <option value="">
                                Select Occasion
                            </option>

                            <option value="birthday">
                                Birthday
                            </option>

                            <option value="anniversary">
                                Anniversary
                            </option>

                            <option value="wedding">
                                Wedding
                            </option>

                            <option value="festival">
                                Festival
                            </option>

                            <option value="friendship">
                                Friendship
                            </option>

                            <option value="other">
                                Other
                            </option>

                        </select>

                    </div>


                    <!-- BUDGET -->

                    <div class="form-group">

                        <label>
                            Budget
                        </label>

                        <select id="budget" name="budget">

                            <option value="">
                                Select Budget
                            </option>

                            <option value="low">
                                ₹500 - ₹1000
                            </option>

                            <option value="medium">
                                ₹1000 - ₹2500
                            </option>

                            <option value="high">
                                ₹2500 - ₹5000
                            </option>

                            <option value="premium">
                                ₹5000+
                            </option>

                        </select>

                    </div>

                </div>


                <!-- INTEREST -->

                <div class="form-row">

                    <div class="form-group full">

                        <label>
                            Interest
                        </label>

                        <select id="interest" name="interest">

                            <option value="">
                                Select Interest
                            </option>

                            <option value="technology">
                                Technology
                            </option>

                            <option value="fashion">
                                Fashion
                            </option>

                            <option value="books">
                                Books
                            </option>

                            <option value="fitness">
                                Fitness
                            </option>

                            <option value="music">
                                Music
                            </option>

                            <option value="gaming">
                                Gaming
                            </option>

                            <option value="travel">
                                Travel
                            </option>

                            <option value="art">
                                Art & Creativity
                            </option>

                        </select>

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="recommend-button">

                    Get Gift Recommendations 🎁

                </button>

            </form>

        </div>

    </section>


    <!-- ================= ABOUT ================= -->

    <section class="about" id="about">

        <h2 class="section-title">
            About Giftly
        </h2>

        <p>

            Giftly is a gift recommendation system designed
            to help users find meaningful gifts easily.

            Users can select the recipient, age group,
            occasion, interests and budget to receive
            suitable gift recommendations.

        </p>

    </section>


    <!-- ================= FOOTER ================= -->

    <footer>

        <p>
            © 2026 <span>Giftly</span>.
            All Rights Reserved.
        </p>

    </footer>


    <!-- ================= JAVASCRIPT ================= -->

    <script>

        document
            .getElementById("giftForm")
            .addEventListener("submit", function(event) {

                // Stop normal form submission
                event.preventDefault();


                // Get selected values

                let person =
                    document.getElementById("person").value;

                let age =
                    document.getElementById("age").value;

                let occasion =
                    document.getElementById("occasion").value;

                let budget =
                    document.getElementById("budget").value;

                let interest =
                    document.getElementById("interest").value;


                // Check whether all options are selected

                if (
                    person === "" ||
                    age === "" ||
                    occasion === "" ||
                    budget === "" ||
                    interest === ""
                ) {

                    alert(
                        "Please select all the options."
                    );

                    return;

                }


                // Create URL for recommendation page

                let url =
                    "recommend.php" +
                    "?person=" + encodeURIComponent(person) +
                    "&age=" + encodeURIComponent(age) +
                    "&occasion=" + encodeURIComponent(occasion) +
                    "&budget=" + encodeURIComponent(budget) +
                    "&interest=" + encodeURIComponent(interest);


                // Open recommendation page

                window.location.href = url;

            });

    </script>


</body>

</html>