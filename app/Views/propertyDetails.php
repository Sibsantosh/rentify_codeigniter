<!--

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentify Property Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>

            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .container {
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                background-color: #fff;
                width: 220px;
                padding: 20px;
            }

            .sidebar h2 {
                font-size: 24px;
                text-align: center;
                margin-bottom: 30px;
            }

            .sidebar ul {
                list-style-type: none;
                padding: 0;
            }

            .sidebar ul li {
                margin: 20px 0;
            }

            .sidebar ul li a {
                text-decoration: none;
                font-size: 18px;
                color: #333;
            }

            .main-content {
                flex: 1;
                padding: 20px;
                background-color: #fff;
            }

            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 2px solid #f0f0f0;
                padding-bottom: 10px;
            }

            .header-left h1 {
                margin: 0;
            }

            .header-right {
                display: flex;
                align-items: center;
            }

            .book-now {
                background-color: #007BFF;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
                margin-right: 20px;
            }

            .book-now:hover {
                background-color: #0056b3;
            }

            .user {
                font-size: 16px;
            }

            .property {
                text-align: center;
                margin-top: 20px;
            }

            .property img {
                width: 100%;
                max-width: 600px;
                height: auto;
                border-radius: 10px;
            }

            .property p {
                font-size: 16px;
                color: #666;
                margin-top: 10px;
            }

            .tabs {
                display: flex;
                justify-content: space-around;
                margin-top: 20px;
            }

            .tab-button {
                background-color: #f1f1f1;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
            }

            .tab-button.active {
                background-color: #007BFF;
                color: white;
            }

            .tab-content {
                display: none;
                margin-top: 20px;
            }

            .tab-content h3 {
                margin-top: 0;
            }

            .map iframe {
                width: 100%;
                height: 300px;
                border: none;
                margin-top: 20px;
            }

    </style>
</head>
<body>
    <div class="container">
       
        <div class="sidebar">
            <h2>RENTIFY</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Properties</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="#">Profile</a></li>
            </ul>
        </div>

       
        <div class="main-content">
            <header>
                <div class="header-left">
                    <h1>Silver Shaow</h1>
                </div>
                <div class="header-right">
                    <button class="book-now">Book Now</button>
                    <span class="user">admin</span>
                </div>
            </header>

           
            <div class="property">
                <img src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Hotel Image">
                <p>A house in the middle of the city and also in the hilly areas</p>
            </div>

            
            <div class="tabs">
                <button class="tab-button active" onclick="openTab(event, 'details')">Details</button>
                <button class="tab-button" onclick="openTab(event, 'address')">Address</button>
                <button class="tab-button" onclick="openTab(event, 'reviews')">Reviews</button>
            </div>

            
            <div id="details" class="tab-content" style="display: block;">
                <h3>Details</h3>
                <p><strong>Price:</strong> ₹2250</p>
                <p><strong>Property Type:</strong> Apartment</p>
                <p><strong>Total Bedroom:</strong> 2</p>
                <p><strong>Status:</strong> Available</p>
                <h4>Rules</h4>
                <ul>
                    <li>Check-in time is at 3:00 PM.</li>
                    <li>Check-out time is at 11:00 AM.</li>
                    <li>Early check-in or late check-out may incur additional fees and is subject to availability.</li>
                    <li>Payment is accepted via credit card, debit card, or cash.</li>
                    <li>Guests must settle their bills upon check-out.</li>
                    <li>A security deposit may be required at check-in and will be refunded if no damages are incurred.</li>
                    <li>Quiet hours are from 10:00 PM to 8:00 AM.</li>
                    <li>No excessive noise or disturbances allowed.</li>
                    <li>This is a non-smoking property.</li>
                </ul>
            </div>

            <div id="address" class="tab-content">
                <h3>Address</h3>
                <p><strong>City:</strong> Bhubaneswar</p>
                <p><strong>State:</strong> Odisha</p>
                <p><strong>Country:</strong> India</p>
                <p><strong>ZipCode:</strong> 752050</p>
                <div class="map">
                    
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31565.5176475546!2d85.79135142805007!3d20.296059203029843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1909a4657ffbb5%3A0x9ec6bb0ff4a30609!2sBhubaneswar%2C%20Odisha%20752050%2C%20India!5e0!3m2!1sen!2sus!4v1667819214823!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <div id="reviews" class="tab-content">
                <h3>Reviews</h3>
                <p>No reviews available yet.</p>
            </div>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tabbuttons;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tabbuttons = document.getElementsByClassName("tab-button");
            for (i = 0; i < tabbuttons.length; i++) {
                tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>
</html>

    -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentify - Property Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            background: #ffffff;
            padding-left: 40px;
            padding-right: 40px;
        }

        .top-bar input[type="text"] {
            padding: 10px;
            font-size: 14px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .admin-section {
            display: flex;
            align-items: center;
        }

        .admin-section span {
            margin-right: 10px;
        }

        .admin-section img {
            border-radius: 50%;
            width: 35px;
            height: 35px;
        }

        .top-bar h2 {
            margin: 0;
            padding: 10px 0;
            font-size: 24px;
            color: #007BFF;
            font-weight: 500;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 120px;
            background-color: #f9f9f9;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .sidebar ul li {
            display: flex;
            align-items: center;
            height: 120px;
            flex-direction: column;
        }

        .sidebar ul li i {
            margin-right: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: 500;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .property-details {
            display: flex;
        }

        .property-info-section {
            flex: 2;
            padding-right: 20px;
        }

        .tabs-section {
            flex: 1;
            padding-left: 20px;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tabs-section .tabs {
            display: flex;
            justify-content: space-around;
        }

        .tabs-section .tab-button {
            background-color: #f1f1f1;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .tabs-section .tab-button.active {
            background-color:#143558 /*#007BFF*/;
            color: white;
        }

        .tab-content {
            display: none;
            padding-top: 20px;
        }

        .tab-content.active {
            display: block;
        }
        #reviews{
            display: flex;
            flex-direction: column;
        }

        .property-info img {
            width: 100%;
            border-radius: 10px;
        }

        .property-info h3 {
            font-size: 22px;
            margin-top: 10px;
        }

        .property-info p {
            color: #666;
        }
        iframe {
            width: 100%;
            height: 300px;
            border: none;
            margin-top: 20px;
        }
        #bookNowButton{
            
        padding: 10px;
        width: 28%;
        margin-right: 20px;
        margin-bottom: 10px;
        align-items: center;
        justify-content: center;
        float: right;
        margin-top: 20px;
        color: #fff;
        background: #143558;
        border: 1px solid #222222;
        border-radius: 4px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out;

        }
    </style>
</head>
<body>

<?php if(isset($property)){?>
   

<?php include('common/top-bar.php'); ?>


<div class="container">

            <?php include('common/side-bar.php'); ?>
    

    <div class="content">
        <div class="property-details">
            <?php //Property Info Section ?>
            <div class="property-info-section">
                <div class="property-info">
                    <img src="https://picsum.photos/1260/750" alt="Hotel Image">
                    <h3><?php echo $property->getTitle(); ?></h3>
                    <p><?php echo $property->getDescription(); ?></p>
                    
                </div>
            </div>

            <?php //Tabs Section ?>
            <div class="tabs-section">
                <div class="tabs">
                    <button class="tab-button active" onclick="openTab(event, 'details')">Details</button>
                    <button class="tab-button" onclick="openTab(event, 'address')">Address</button>
                    <button class="tab-button" onclick="openTab(event, 'reviews')">Reviews</button>
                </div>

                <?php //Tab Content ?>
                <div id="details" class="tab-content active">
                    <h4>Details</h4>
                    <p><strong>Price:</strong> ₹<?php echo $property->getPricePerNight(); ?></p>
                    <p><strong>Property Type:</strong> <?php echo $property->getPropertyType(); ?></p>
                    <p><strong>Total Bedroom:</strong> 2</p>
                    <p><strong>Status:</strong> <?php echo $property->getStatus(); ?></p>
                </div>

                <div id="address" class="tab-content">
                    <h4>Address</h4>
                    <p><strong>City:</strong> <?php echo $property->getCity(); ?></p>
                    <p><strong>State:</strong> <?php echo $property->getState(); ?></p>
                    <p><strong>Country:</strong> <?php echo $property->getCountry(); ?></p>
                    <div class="map">
                    <!-- You can embed a Google Maps iframe here -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31565.5176475546!2d85.79135142805007!3d20.296059203029843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1909a4657ffbb5%3A0x9ec6bb0ff4a30609!2sBhubaneswar%2C%20Odisha%20752050%2C%20India!5e0!3m2!1sen!2sus!4v1667819214823!5m2!1sen!2sus"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                </div>

                <div id="reviews" class="tab-content">
                    <h4>Reviews</h4>
                    <p>No reviews available yet.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<button id="bookNowButton" onclick="location.href='<?php echo base_url().'bookProperty';?>'"> Book Now </button>
<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tabbuttons;
        tabcontent = document.getElementsByClassName("tab-content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.remove("active");
        }
        tabbuttons = document.getElementsByClassName("tab-button");
        for (i = 0; i < tabbuttons.length; i++) {
            tabbuttons[i].classList.remove("active");
        }
        document.getElementById(tabName).classList.add("active");
        evt.currentTarget.classList.add("active");
    }
</script>
</body>
</html>
<?php } ?>
          