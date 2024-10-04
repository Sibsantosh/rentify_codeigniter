<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Property - Rentify</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            height: 25rem;
        }

        .sidebar ul li {
            display: flex;
            align-items: center;
            height: 40rem;
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

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
        }

        .form-section {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            width: 32%;
        }
        #guest-comment{
            width: 100%;
            padding: 10px;
            font-size: 14px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 10px;
            font-size: 14px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group label {
            margin-bottom: 5px;
            font-weight: 500;
            color: #333;
        }

        .button-section {
            margin-top: 20px;
        }

        .button-section button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-section button:hover {
            background-color: #0056b3;
        }

        .coupon-section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 35%;
            margin-left: 20px;
        }

        .coupon-box {
           
            display: flex;
            padding: 10px;
            
            justify-content: flex-start;
            align-items: center;
            flex-direction: row;
            gap: 20px;
            flex-wrap: wrap;
            border-radius: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        

        .coupon-box p {
            color: red;
            font-weight: bold;
        }

        .coupons-list{
            background-color: #f1f1f1;
            height: 240px;
            
            padding:10px;
            flex-grow: 1;
            overflow-y: auto;            
        }
        .coupons-list::-webkit-scrollbar{
            display: none;
        }
        .coupon{
            background:white;
            width: 90%;
            height: 50px;
            padding: 10px;
            display: flex;
            margin-bottom: 10px;
            border: 0.5px solid #00000052;
            border-radius: 10px;
          
           
        }
        .coupon-details{
            color: #222222;
            margin-left: 20px;
            display: flex;
            align-items: start;
            flex-direction: column;
            justify-content: center;
        }
        .apply-coupon{
            margin-left: 80px;
            justify-content: center;
            display: flex;
            align-items: center;
        }
        

        .payment-summary {
            margin-top: 20px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }

        .payment-summary p {
            margin: 5px 0;
        }
        .coupon-show-button{
            width: 40px;
            display: flex;
            justify-content: space-around;
            cursor:pointer;
        }

        .confirm-btn {
            margin-top: 20px;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .confirm-btn:hover {
            background-color: #0056b3;
        }

        /* Popup Styling */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 350px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .popup-header h3 {
            margin: 0;
            font-size: 18px;
        }

        .popup-close {
            cursor: pointer;
            font-size: 20px;
        }

        .popup-body {
            text-align: center;
        }

        .popup-body p {
            margin: 10px 0;
        }

        .popup-body button {
            background-color: #007BFF;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-body button:hover {
            background-color: #0056b3;
        }

        /* Popup Overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 50;
        }

        /* Guests Popup Styling */
        .guests-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 100;
            
        }

        .guests-popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .guests-popup-header h3 {
            margin: 0;
            font-size: 18px;
        }

        .guests-popup-close {
            cursor: pointer;
            font-size: 20px;
        }

        .guests-popup-body {
            text-align: center;
        }

        .guests-popup-body .guest-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .guests-popup-body .guest-group label {
            flex: 1;
            text-align: left;
        }

        .guests-popup-body .guest-group input {
            width: 50px;
            text-align: center;
        }

        .guests-popup-body .guest-group button {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .guests-popup-body .guest-group button:hover {
            background-color: #0056b3;
            
        }

    </style>
</head>
<body>
    <div class="top-bar">
        <h2>RENTIFY</h2>
        
        <div class="admin-section">
            <span>admin</span>
            <img src="https://via.placeholder.com/35" alt="Admin">
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><i>🏠</i><a href="#">Dashboard</a></li>
                <li><i>🏢</i><a href="#">Properties</a></li>
                <li><i>📅</i><a href="#">Bookings</a></li>
                <li><i>📂</i><a href="#">Category</a></li>
            </ul>
        </div>
        <div class="content">
            <input type="hidden" value="<?php if(isset($selectedProperty)){echo $selectedProperty->getPropertyId();}?>" id="propertyId">
            <input type="hidden" value="<?php if(isset($selectedProperty)){echo $selectedProperty->getNoOfBedRoom();}?>" id="propertyTotalRooms">
            <input type="hidden" value="0" id="BookedRooms">
            <input type="hidden" value="<?php if(isset($selectedProperty)){echo $selectedProperty->getPricePerNight();}?>" id="pricePerNight">
            <div style="display: flex; justify-content: space-between;">
                <div class="form-container">
                    <div class="form-section">
                        <div class="form-group">
                            <label for="checkin">Check In Date *</label>
                            <input type="date" id="checkin">
                        </div>
                        <div class="form-group">
                            <label for="checkout">Check Out Date *</label>
                            <input type="date" id="checkout">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration</label>
                            <input type="text" id="duration">
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-group">
                            <label for="guests">Guests *</label>
                            <input type="text" id="guests" value="0 Adults 0 Children 0 Infants" readonly onclick="showGuestsPopup()">
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-group">
                            <label for="room-type">Room Type</label>
                            <select id="room-type">
                                <option>Single</option>
                                <option>Double</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="room-plan">Room Plan</label>
                            <select id="room-plan">
                                <option>Standard</option>
                                <option>Deluxe</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-section">
                        
                            <label for="guest-comment">Guest Comment</label>
                            <textarea id="guest-comment" style="height: 100px;"></textarea>
                        
                    </div>

                </div>

                <div class="coupon-section">
                    <div class="coupon-box">
                        <img src="assets/images/discount.png" width="40px" height="40px" >
                        <div id="coupon-texts" >
                        <p>Coupon Discounts<br><font color="black">Avail Discount</font></p>
                        
                        </div>
                        <div class="coupon-show-button">
                        <p onclick="showPopup()" ><i class="fa fa-angle-right" style="font-style:bold;font-size:20px;color:red;" aria-hidden="true"></i></p>
                        </div>
                    </div>

                    <div class="payment-summary">
                        <p>Payment Summary</p>
                        <p>Payable Amount: ₹0.00</p>
                        <p>Discount: ₹0.00</p>
                        <p>Total: ₹0.00</p>
                    </div>
                    <button class="confirm-btn">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Coupon Popup -->
    <div class="popup-overlay" id="popup-overlay"></div>
    <div class="popup" id="popup">
        <div class="popup-header">
            <h3>Available Coupons</h3>
            <span class="popup-close" onclick="closePopup()">×</span>
        </div>
        <?php if(isset($couponList)){ ?>

                <div class="popup-body">
                <div class="coupons-list">
                    <?php foreach($couponList as $coupon){ ?>
                    <div class="coupon">
                        <div class="coupon-image"><img src="assets/images/discount.png" width="50px" height="50px" ></div>
                        <div class="coupon-details">
                            <div style="font-size: 14px;"><?php echo $coupon->getDiscountCode(); ?></div>
                            <div style="font-size: 9px;"><?php echo $coupon->getDescription(); ?></div>
                        </div>
                        <div class="apply-coupon">
                           <button>Apply</button> 
                        </div>
                        
                    </div>
                    <?php }?>
                </div>
                <button onclick="closePopup()">Close</button>
                </div>

            <?php
        }else{ ?>

            <div class="popup-body">
            <p>No available coupons.</p>
            <button onclick="closePopup()">Close</button>
            </div>
        <?php }

        
        ?>
       
    </div>

    <!-- Guests Popup -->
    <div class="popup-overlay" id="guests-popup-overlay"></div>
    <div class="guests-popup" id="guests-popup">
        <div class="guests-popup-header">
            <h3>Guests</h3>
            <span class="guests-popup-close" onclick="closeGuestsPopup()">×</span>
        </div>
        <div class="guests-popup-body">
            <div class="guest-group">
                <label for="adults">Adults</label>
                <button onclick="changeGuestCount('adults', -1)">-</button>
                <input type="text" id="adults" value="0" readonly>
                <button onclick="changeGuestCount('adults', 1)">+</button>
            </div>
            <div class="guest-group">
                <label for="children">Children</label>
                <button onclick="changeGuestCount('children', -1)">-</button>
                <input type="text" id="children" value="0" readonly>
                <button onclick="changeGuestCount('children', 1)">+</button>
            </div>
            <div class="guest-group">
                <label for="infants">Infants</label>
                <button onclick="changeGuestCount('infants', -1)">-</button>
                <input type="text" id="infants" value="0" readonly>
                <button onclick="changeGuestCount('infants', 1)">+</button>
            </div>
            <button onclick="closeGuestsPopup()">Close</button>
        </div>
    </div>

    <script>
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('popup-overlay').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('popup-overlay').style.display = 'none';
        }

        function showGuestsPopup() {
            if(document.getElementById('checkout').value=="" || document.getElementById('checkin').value==""){
                alert("Please Enter checkin and checkout dates")
                return
            }
            document.getElementById('guests-popup').style.display = 'block';
            document.getElementById('guests-popup-overlay').style.display = 'block';
        }

        function closeGuestsPopup() {
            document.getElementById('guests-popup').style.display = 'none';
            document.getElementById('guests-popup-overlay').style.display = 'none';
            updateGuestsField();
        }

        function setPrice(){
            var adults = parseInt( document.getElementById('adults').value);
            var children = parseInt( document.getElementById('children').value);
            var infants = parseInt( document.getElementById('infants').value);
            var totalPeople = adults+children+infants;
            totalPeople = (totalPeople%2!=0)? totalPeople+1:totalPeople
            
            var totalRooms = (totalPeople)/2;
            var pricePerNight = document.getElementById('pricePerNight').value;
            var totalPrice = pricePerNight * totalRooms
            console.log(totalPrice)


        }
        function changeGuestCount(type, delta) {
            var adults = parseInt( document.getElementById('adults').value);
            var children = parseInt( document.getElementById('children').value);
            var infants = parseInt( document.getElementById('infants').value);
            if((adults+children+infants)==10 && delta ==1){
                alert("max guests");
                return
            }
            if(delta>0){
            if(parseInt(((adults+children+infants)/2),10)>parseInt(document.getElementById('propertyTotalRooms').value-document.getElementById('BookedRooms').value,10)){
                alert("room not available for the selected guests")
                return
            }
        }

            var input = document.getElementById(type);
            var value = parseInt(input.value, 10);
            value = Math.max(0, value + delta);

            input.value = value;
            setPrice();

        }

        function updateGuestsField() {
            var adults = document.getElementById('adults').value;
            var children = document.getElementById('children').value;
            var infants = document.getElementById('infants').value;
            document.getElementById('guests').value = adults + ' Adults ' + children + ' Children ' + infants + ' Infants';
        }


        function checkPropertyAvailability(){

            console.log("inside")
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if(this.readyState ==4 && this.status == 200){
                    try{
                    var resp = JSON.parse(this.responseText)
                    console.log(resp.response.data)
                    var summ = 0
                    if(resp.response.data != null){
                        Object.entries(resp.response.data).forEach(([key, value]) => {
                            //console.log(`${value.fieldData.TotalRoomsBooked}`);
                            summ +=value.fieldData.TotalRoomsBooked
                        });
                    }
                    //console.log(summ)
                    document.getElementById('BookedRooms').value = summ
                    }catch(e){
                        console.log(e)
                    }
                    //alert(this.response);
                }
            };


            var checkInDateField = document.getElementById('checkin');
            var checkOutDateField = document.getElementById('checkout');
            var checkOutDate = new Date(checkOutDateField.value)
            var checkInDate = new Date(checkInDateField.value)
            //checkInDate = new Date();
            var date = checkInDate.getDate()
            if(date<10)
                date = "0"+date;
            var month = checkInDate.getMonth()+1
            if(month<10)
                month = "0"+month;
            var year = checkInDate.getFullYear()
            var checkIn =`${month}~${date}~${year}`
            //checkIn = "08~15~2024"

            date = checkOutDate.getDate()
            if(date<10)
                date = "0"+date;
            month = checkOutDate.getMonth()+1
            if(month<10)
                month = "0"+month;
            year = checkOutDate.getFullYear()
            var checkOut =`${month}~${date}~${year}`
            //checkOut = "08~19~2024"
            var propertyId = document.getElementById('propertyId').value
            var requestObject = {"checkin":checkIn,
                "checkout":checkout,
                "propertyId":propertyId

            }


            xhttp.open("GET", "<?php echo base_url().'checkAvailability/'; ?>" + checkIn+"~~"+checkOut+"~~"+propertyId, true);
            // xhttp.open("GET", "<?php echo base_url().'checkAvailability/'; ?>" + checkIn+"~~"+checkOut+"~~"+"2", true);
            xhttp.send();
        }
        function setCheckOutDate(){
            var checkInDateField = document.getElementById('checkin');
            var checkOutDateField = document.getElementById('checkout');
            var checkInDate = new Date(checkInDateField.value)
            var checkOutDate = new Date(checkInDateField.value)
            checkOutDate.setDate(checkOutDate.getDate()+1)
            var date = checkOutDate.getDate()
            if(date<10)
                date = "0"+date;
            var month = checkOutDate.getMonth()+1
            if(month<10)
                month = "0"+month;
            var year = checkOutDate.getFullYear()
            checkOutDateField.value =`${year}-${month}-${date}`
            document.getElementById('duration').value = "1 day"
        }

        function setCheckInDates(){
            var checkInDateField = document.getElementById('checkin');
            var checkOutDateField = document.getElementById('checkout');
            var checkOutDate = new Date(checkOutDateField.value)
            var checkInDate = new Date(checkOutDateField.value)
            checkInDate = new Date();
            checkInDate.setDate(checkInDate.getDate())
            var date = checkInDate.getDate()
            if(date<10)
                date = "0"+date;
            var month = checkInDate.getMonth()+1
            if(month<10)
                month = "0"+month;
            var year = checkInDate.getFullYear()
            checkInDateField.value =`${year}-${month}-${date}`
            var checkOutDate = new Date(checkInDateField.value)
            checkOutDate.setDate(checkOutDate.getDate()+1)
            
            date = checkOutDate.getDate()
            if(date<10)
               date = "0"+date;
            month = checkOutDate.getMonth()+1
            if(month<10)
                month = "0"+month;
            var year = checkOutDate.getFullYear()
            checkOutDateField.value =`${year}-${month}-${date}`
            document.getElementById('duration').value = "1 day"

        }
        function checkDates(event){
            //alert("inside function")
            var checkInDateField = document.getElementById('checkin');
            var checkOutDateField = document.getElementById('checkout');
           // var statusElement = document.getElementById('status');
            
            
            
            if(checkOutDateField.value ==""){
                setCheckOutDate();
                return
            }
            else if(checkInDateField.value ==""){
                setCheckInDates();
                return
            }

            var checkInDate = new Date(checkInDateField.value)
            
            var dateToday = new Date()
            let diffTime = checkInDate - dateToday;
            let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            if(diffDays<0){
                setCheckInDates()
            }
            else{
                var checkOutDate = new Date(checkOutDateField.value)
                diffTime = checkOutDate - checkInDate;
                diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                if(diffDays<0){
                    setCheckOutDate()
                }
                else{
                    if(diffDays==0){
                        diffDays = 1
                    }
                    document.getElementById('duration').value =`${diffDays} day`
                    checkPropertyAvailability();
                }
            }
            //let diffTime = checkOutDate - checkInDate;
            //let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            //console.log(diffDays)

        }
        document.getElementById('checkin').oninput = function(){
            checkDates()
        }
        document.getElementById('checkout').oninput = function(){
            checkDates()
        }
    </script>
    
</body>
</html>
