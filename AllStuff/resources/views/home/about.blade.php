<!DOCTYPE html>
<html>
   <head>
    
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
   </head>
   <body>
      <div class="hero_area">
        
        @include('home.header')
       
      </div>

      <section class="about-section" style="margin-top:-40px;">
        <div class="container_about">
            <span class="ab-all">About AllStuff</span>
            <p>Welcome to AllStuff, your go-to destination for the latest in fashion. Discover the finest styles curated to elevate your wardrobe. We're committed to ensuring a delightful shopping experience for you.</p>

            <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f8f8f8; */
            color: #333;
        }

        .about-section {
            padding: 50px 0;
            text-align: center;
        }

        .container_about {
            max-width: 800px;
            margin: 0 auto;
        }

        .ab-all {
            display: block;
            font-size: 36px;
            color: #AD9551;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .about-section p {
            font-size: 18px;
            line-height: 1.6;
        }

        #mission-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 0;
            text-align: left;
        }

        #mission-text {
            flex: 1;
            padding-right: 50px;
        }

        #mission-text h2 {
            font-size: 28px;
            color: #AD9551;
            margin-bottom: 15px;
        }

        #mission-image {
            flex-shrink: 0;
            max-width: 100%;
            max-height: 300px;
        }

        h3 {
            font-size: 24px;
            color: #AD9551;
            margin-top: 30px;
        }

        .about-section h3 {
            margin-bottom: 15px;
        }

        .about-section img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-info {
            margin-top: 20px;
        }

        .contact-info p {
            font-size: 18px;
        }
        </style>
</head>
<body>
    <div id="mission-container">
        <div id="mission-text">
            <h2>Our Mission</h2>
            <p>
            Empower style enthusiasts with curated fashion choices at AllStuff. Our mission is to redefine your shopping experience, offering a seamless blend of sophistication and accessibility. Elevate your wardrobe effortlessly with us.</p>
        
        </div>
        <img id="mission-image" src="images/aboutall.png" alt="Mission Image">
    </div>
            <h3>Our Team</h3>
            <p>Behind AllStuff is a passionate team dedicated to curating the best products and delivering an exceptional online shopping experience. Our team works tirelessly to stay updated with the latest trends and offer you the most sought-after items.</p>
  </div>
    </section>
       
      @include('home.footer')
     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      
      <script src="home/js/popper.min.js"></script>
      
      <script src="home/js/bootstrap.js"></script>
     
      <script src="home/js/custom.js"></script>
   </body>
</html>