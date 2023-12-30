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
        .div_center {
            margin:auto;
            width:80%;
            text-align:center;
            padding:20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid grey;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #AD9551;
            color: white;
        }
        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-remove:hover {
            background-color: #c82333;
        }
        .checkout-section{
         text-align:end;
         margin-right:100px;
         padding:20px;

        }
        .btn-checkout {
    background-color: #AD9551;
    color: white;
    border: none;
    padding: 8px 16px;
    display: inline-block;
    cursor: pointer;
    border-radius: 4px;
}

.btn-checkout:hover {
    background-color: #0056b3; 
}
.your_cart{
   text-align:center;
   box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
   margin: 10px auto;
   border-radius: 8px;
}
.your_cart h2 {
    font-size: 28px; 
    color: #333;
    margin-bottom: 15px; 
}
        
    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        <div class="your_cart">
           <h2>Cart Summary</h2>

        </div>
        <div class="div_center">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action</th>
                    <th>Total Price</th>
                </tr>
           
                <?php $total = 0; ?>
                @foreach($cart as $cartItem)
<tr>
    <td>{{$cartItem->product_title}}</td>
    <td>
    <div class="quantity-controls" 
                data-price="{{ $cartItem->price }}" 
                data-initial-quantity="{{ $cartItem->initial_quantity }}"> <!-- Add initial quantity data attribute -->
               
                <button class="quantity-btn decrease" data-action="decrease" data-id="{{$cartItem->id}}">-</button>
                <span class="quantity">{{$cartItem->quantity}}</span>
                <button class="quantity-btn increase" data-action="increase" data-id="{{$cartItem->id}}">+</button>
            </div>
                </td>
    </td>
    <td><img src="/product/{{$cartItem->image}}" style="max-width: 100px; height: auto;"></td>
    <td>Rs.{{$cartItem->price}}</td>
    <td><a class="btn-remove" href="{{url('remove_cart',$cartItem->id)}}">Remove</a></td>
    <td class="total-price">Rs.{{$cartItem->price * $cartItem->quantity}}</td>

   
</tr>
@endforeach
<tr>
    <td colspan="5" style="text-align: right;"><strong>Total Price:</strong></td>
    <td id="cart-total-price">Rs.{{$total}}</td>
</tr>
            </table>
        </div>

        <!-- Checkout Section -->
        <section class="checkout-section">
            <div class="checkout-cart">
                <a href="" class="btn btn-primary btn-checkout">Checkout</a>
            </div>
        </section>
        <!-- End Checkout Section -->
        @include('home.footer')
        <script src="home/js/jquery-3.4.1.min.js"></script>
        <script src="home/js/popper.min.js"></script>
        <script src="home/js/bootstrap.js"></script>
        <script src="home/js/custom.js"></script>

        
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityBtns = document.querySelectorAll('.quantity-btn');
        const totalPriceElem = document.getElementById('cart-total-price');

        function updateTotalPrice() {
            // Calculate and update the total cart price
            let cartTotalPrice = 0;
            document.querySelectorAll('.total-price').forEach(priceElem => {
                const price = parseFloat(priceElem.textContent.replace('Rs.', '').trim());
                if (!isNaN(price)) {
                    cartTotalPrice += price;
                } else {
                    console.log('Non-numeric value found:', priceElem.textContent);
                }
            });

            totalPriceElem.textContent = `Rs. ${cartTotalPrice.toFixed(2)}`;
        }

        function updateQuantityInSession(product_id, newQuantity) {
            // Update quantity in session storage
            const cart = JSON.parse(sessionStorage.getItem('cart')) || {};

            cart[product_id] = newQuantity;
            sessionStorage.setItem('cart', JSON.stringify(cart));
        }

        function updateQuantityElementsFromSession() {
            // Retrieve quantities from session storage and update the elements
            const cart = JSON.parse(sessionStorage.getItem('cart')) || {};
            Object.keys(cart).forEach(product_id => {
                const quantity = cart[product_id];
                const quantityElem = document.querySelector(`[data-id="${product_id}"] .quantity`);
                const totalElem = document.querySelector(`[data-id="${product_id}"] .total-price`);
                if (quantityElem && totalElem) {
                    quantityElem.textContent = quantity;
                    // Calculate total price based on stored quantity
                    const price = parseFloat(quantityElem.parentNode.dataset.price).toString();
                    totalElem.textContent = `Rs. ${(price * quantity).toFixed(2)}`;
                }
            });
        }

        quantityBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const action = this.getAttribute('data-action');
                const product_id = this.getAttribute('data-id');
                const quantityElem = this.parentNode.querySelector('.quantity');
                const totalElem = this.closest('tr').querySelector('.total-price');

                let currentQuantity = parseInt(quantityElem.textContent);

                if (action === 'increase') {
                    currentQuantity++;
                } else if (action === 'decrease' && currentQuantity > 1) {
                    currentQuantity--;
                }
                

                quantityElem.textContent = currentQuantity;

                const price = parseFloat(this.parentNode.dataset.price).toString();

                totalElem.textContent = `Rs. ${(price * currentQuantity).toFixed(2)}`;

                // Update quantity in session storage
                updateQuantityInSession(product_id, currentQuantity);

                // Update the total cart price
                updateTotalPrice();
            });
        });

        // Load quantities from session storage on page load
        updateQuantityElementsFromSession();

        // Initial calculation when the page loads
        updateTotalPrice();
    });
</script>

    </div>
</body>
</html>