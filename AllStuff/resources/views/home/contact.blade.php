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
   
      <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container_contact {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container_contact p{
            margin-bottom:20px;
        }

        form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    text-align: center; /* Center align the form contents */
}



button:hover {
    background-color: #06516e;
}

        .container_contact h2 {
            font-size: 28px;
            color: #AD9551;
            margin-bottom: 15px;
        }
        button:hover {
    background-color: #e0e0e0; 
  }
    </style>
    
</head> 
<body>
    <div class="hero_area">
        @include('home.header')
    

    <div class="container_contact" style="margin-top:-5px;">
        <h2>Contact Us</h2>
        <p>Have questions or suggestions? We'd love to hear from you! Fill out the form below to get in touch.</p>
        
        <form id="contactForm" action="{{ route('contact.store') }}" method="POST" >
    @csrf

    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required="">

    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required="" style="text-transform: lowercase;">

    <label for="message">Your Message:</label>
    <textarea id="message" name="message" rows="3" required = "" style="text-transform: lowercase;"></textarea>

    <button type="submit" style="padding:10px; background-color:#fffff;border: none;">Submit</button>
</form>


    </div>
    </div>

    <script>
        function submitForm() {
            // You can add your form submission logic here
            alert('Form submitted successfully!');
        }
    </script>
       
      @include('home.footer')
     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      
      <script src="home/js/popper.min.js"></script>
      
      <script src="home/js/bootstrap.js"></script>
     
      <script src="home/js/custom.js"></script>
   </body>
</html>