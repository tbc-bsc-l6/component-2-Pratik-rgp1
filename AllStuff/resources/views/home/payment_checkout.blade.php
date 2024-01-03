<!DOCTYPE html>
<html>
<head>

<base href ="/public">

    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/AllStuff.png" type="">
    <title>AllStuff</title>
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <link href="home/css/style.css" rel="stylesheet" />
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style type="text/css">
     .billing-center {
    display: flex;
    justify-content: center;
    align-items: center;
    padding:40px;
}

.billing-form-container {
    width: 500px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    text-align: center;
}

.billing-form-container h1 {
    margin-bottom: 20px;
    
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    text-align: left;
    margin-bottom: 5px;
}

.form-group input {
    width: calc(100% - 10px);
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.pay_esewa {
    margin-top: 20px;
}

.btn {
    padding: 8px 15px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.btn.btn-primary {
    background-color: #AD9551;
    color: #fff;
}

.btn.btn-primary:hover {
    background-color: #0056b3;
}
.bill_heading{
   text-align:center;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   margin: 10px auto;
   border-radius: 8px;
}
.bill_heading h2 {
    font-size: 28px; 
    color: #333;
    margin-bottom: 15px; 
}
.total-price {
    font-size: 18px;
    color: #333;
    margin-bottom: 15px;
    text-align: center;
}
.pay_esewa {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.esewa-logo {
    width: 40px; 
    margin-right: 10px; 
   
}
    </style>

    </head>
<body>
    <div class="hero_area">
        @include('home.header')
        <div class="bill_heading">

            <h2>Billing Information</h2 >
        </div>
        
        <div class="billing-center">
        <div class="billing-form-container">
            <form action="process_billing" method="POST" class="billing-form">
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="location">Delivery Location:</label>
                    <input type="tel" id="location" name="location" class="form-control" required>
                </div>

                <div class="total-price">
    Total Price: {{$totals}}
</div>

        <div class="pay_esewa">
            <img src="images/esewa-logo.png" alt="eSewa Logo" class="esewa-logo">
            <button id="payEsewaBtn" class="btn btn-primary">Pay E-sewa</button>
        </div>

            </form>
        </div>
    </div>
</div>

    @include('home.footer')
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>
        <script src="home/js/custom.js"></script>
</body>