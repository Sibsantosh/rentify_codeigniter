<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentify</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        <?php include('common/top-bar.css'); ?><?php include('common/side-bar.css'); ?>.container {
            display: flex;
            height: 100vh;
        }


        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }



        .property-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .property-card img {
            width: 120px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
        }

        .property-info {
            flex-grow: 1;
            padding-left: 15px;
        }

        .property-info h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .property-info p {
            margin: 5px 0;
            color: #888;
            font-size: 14px;
        }

        .property-action {
            width: 50%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .status-available {
            color: green;
            font-weight: bold;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #000;
        }

        .check-btn {
            background-color: #143558;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .check-btn:hover {
            background-color: #143518;
        }

        .search-section {
            display: flex;

            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .search-section div {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Evenly space the input fields */
        }

        .search-section input[type="date"],
        .search-section input[type="number"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 15rem;
        }

        .guests-control {
            display: flex;
            align-items: center;
        }

        .guests-control span {
            padding: 0 10px;
        }

        .guests-control button {
            background-color: #ddd;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .guests-control button:hover {
            background-color: #ccc;
        }

        #totalGuests {
            width: 25px;
            align-items: center;
            padding-left: 20px;
        }

        .property-card div:last-child {
            display: flex;
            align-items: center;
            gap: 15px;
            /* Evenly space the elements */
        }

        .property-card div:last-child p {
            margin: 0;
        }
    </style>
</head>

<body>

    <?php include('common/top-bar.php'); ?>

    <div class="container">


        <?php include('common/side-bar.php'); ?>

        <div class="content">


            <div class="search-section">
                <div style="display: flex;flex-direction: column;">Check in<input type="date" placeholder="Check In"></div>
                <div style="display: flex;flex-direction: column;">Check out<br><input type="date" placeholder="Check Out"></div>

                <div style="display: flex;flex-direction: column;">Guests
                    <div class="guests-control">
                        <button id="decrease">-</button>
                        <input type="number" style="width: 25px; text-align:center; pointer-events:none;" value="0" id="totalGuests">
                        <button id="increase">+</button>
                    </div>
                </div>



            </div>
            <!-- https://via.placeholder.com/120x80 -->
            <?php //echo str_replace("https://","http://",$property->getImage() ); 
            ?>
            <?php
            foreach ($propertyList as $property) {
            ?>
                <div class="property-card">
                    <img src="https://picsum.photos/120/80/" alt="<?php echo $property->getTitle(); ?>">
                    <div class="property-info">
                        <h3><?php echo $property->getTitle(); ?></h3>
                        <p><?php echo $property->getCity(); ?></p>
                        <p><?php echo $property->getState(); ?></p>
                    </div>
                    <div class="property-action">
                        <p><?php echo $property->getPropertyType(); ?></p>
                        <div class="property-action">
                            <p class="status-available"><?php echo $property->getStatus(); ?></p>
                            <p class="price">₹<?php echo $property->getPricePerNight(); ?></p>
                            <button class="check-btn" onclick="location.href='<?php echo base_url() . 'property/' . $property->getRecordId(); ?>'">Check</button>
                        </div>
                    </div>
                </div>
            <?php
            }


            ?>




        </div>
    </div>
    <script>
        document.getElementById('increase').onclick = function() {
            increase();
        };
        document.getElementById('decrease').onclick = function() {
            decrease();
        };

        function increase() {
            // Get the input element
            var inputElement = document.getElementById('totalGuests');

            // Check if the element exists
            if (inputElement === null) {
                console.error('Element not found');
                return;
            }

            // Get the current value and increase it

            var currentValue = parseInt(inputElement.value, 10);
            if (currentValue <= 9)
                inputElement.value = currentValue + 1;
            else
                inputElement.value = currentValue + 1;
        }

        function decrease() {
            // Get the input element
            var inputElement = document.getElementById('totalGuests');

            // Check if the element exists
            if (inputElement === null) {
                console.error('Element not found');
                return;
            }

            // Get the current value and increase it

            var currentValue = parseInt(inputElement.value, 10);
            if (currentValue <= 1)
                inputElement.value = 0;
            else
                inputElement.value = currentValue - 1;
        }
    </script>
</body>

</html>