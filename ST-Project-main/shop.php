<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>GoMart</title>
  
  <!-- SweetAlert2 Library -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<nav class="navbar">
  <div class="logo">
    <img src="images/LOGO3.png" alt="GoMart Logo" />
  </div>
  <ul class="nav-links">
    <li><a href="index.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="#receipt">Receipt</a></li>
  </ul>
  <div class="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="shopping">
    <img src="images/shopping-bag.png" alt="shopping-bag">
    <span class="quantity">0</span>
  </div>
   <a href="logout.php" class="logout-btn">Logout</a>
</nav>

  <div class="landingpage">
    <h1 class="gomart">GoMart</h1>
    <p>Your one-stop online shopping destination! Discover a world of convenience as you browse, 
      shop, and buy your favorite products—all in one place. With GoMart, enjoy seamless shopping 
      experiences, exclusive deals, and a wide range of items to suit every need. Shop smarter, 
      faster, and better with GoMart today!</p>
  </div>

  <div class="background"></div>
  
  <div id="product-container" class="products"></div>

  <div class="cart">
    <h2>Your Cart</h2>
    <ul id="cart-items"></ul>
    <p id="total-amount">Total: $0.00</p>
    <button id="checkout-button" class="checkout-button">Checkout</button>
  </div>

  <?php include 'footer.php'; ?>


<script>
  document.addEventListener("DOMContentLoaded", () => {   
    const productContainer = document.getElementById("product-container");
    const cartContainer = document.querySelector(".cart");
    const openShopping = document.querySelector(".shopping img");
    const cartCounter = document.querySelector(".shopping .quantity");
    let cart = [];  

    openShopping.addEventListener("click", () => {
      cartContainer.classList.toggle("active");
    });

    async function fetchProducts() {
      try {
        const dummyJsonResponse = await fetch("https://dummyjson.com/products");
        const dummyJsonData = await dummyJsonResponse.json();

        const fakestoreResponse = await fetch("https://fakestoreapi.com/products");
        const fakestoreData = await fakestoreResponse.json();

        const combinedProducts = [
          ...dummyJsonData.products,
          ...fakestoreData.slice(0, 30),
        ];

        renderProducts(combinedProducts);
      } catch (error) {
        console.error("Failed to fetch products:", error);
        productContainer.innerHTML = "<p>Error loading products. Try again later.</p>";
      }
    }

    function renderProducts(products) {
      productContainer.innerHTML = "";
      products.forEach((product) => {
        const productCard = document.createElement("div");
        productCard.classList.add("card");

        const imageUrl = product.thumbnail || product.image || product.images?.[0] || "placeholder.jpg";

        productCard.innerHTML = `
          <img class="card-image" src="${imageUrl}" alt="${product.title}">
          <div class="card-content">
            <h3 class="card-title">${product.title}</h3>
            <p class="card-description">${product.description || "No description available"}</p>
            <p class="price">$${product.price}</p>
            <button class="card-button" data-title="${product.title}" data-price="${product.price}" data-image="${imageUrl}">Add to Cart</button>
          </div>
        `;

        productContainer.appendChild(productCard);
      });

      document.querySelectorAll(".card-button").forEach((button) => {
        button.addEventListener("click", (event) => {
          const { title, price, image } = event.target.dataset;
          addToCart(title, parseFloat(price), image);
        });
      });
    }

    function addToCart(title, price, image) {
      const existingItem = cart.find((item) => item.title === title);
      if (existingItem) {
        existingItem.quantity++;
      } else {
        cart.push({ image, title, price, quantity: 1 });
      }
      updateCartCounter();
      renderCart();

      // SweetAlert kung mag add to cart ang user kag makadto sa cart
      Swal.fire({
        title: 'Product Added to Cart!',
        text: `${title} has been added to your cart.`,
        icon: 'success',
        confirmButtonText: 'Go to Cart'
      });
    }

    function renderCart() {
      const cartItems = document.getElementById("cart-items");
      const totalAmount = document.getElementById("total-amount");

      cartItems.innerHTML = "";
      let total = 0;

      cart.forEach((item, index) => {
        const cartItem = document.createElement("li");
        cartItem.innerHTML = `
          <img class="img-cart" src="${item.image}" alt="${item.title}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
          ${item.title} - ₱${item.price.toFixed(2)} X 
          <button class="quantity-btn minus-btn" button onclick="updateQuantity(${index}, -1)"> - </button> 
          ${item.quantity} <button class="quantity-btn plus-btn" button onclick="updateQuantity(${index}, 1)"> + </button>
          <button class="remove-btn" button onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItems.appendChild(cartItem);
        total += item.price * item.quantity;
      });

      totalAmount.textContent = `Total: $${total.toFixed(2)}`;
    }

    document.getElementById("checkout-button").addEventListener("click", () => {
      if (cart.length > 0) {
        // Ga reset ini kung pinduton
        alert("Checkout successful!");

        // Gina save niya ang receipt details
        displayReceipt();

        // I-clear ang cart
        cart = [];

        // Ma render liwat ang cart kundi mag empty siya liwat ang process 
        renderCart();
        
      } else {
        alert("Your cart is empty! Add some items first.");
      }
    });

    window.updateQuantity = function(index, change) {
      if (cart[index].quantity + change > 0) {
        cart[index].quantity += change;
      } else {
        cart.splice(index, 1);
      }
      updateCartCounter();
      renderCart();
    };

    function updateCartCounter() {
      cartCounter.textContent = cart.length;
    }

    window.removeFromCart = function (index) {
      cart.splice(index, 1);
      renderCart();
    };

    fetchProducts();
  });
</script>

<script>
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });

  
</script>


</body>
</html>
