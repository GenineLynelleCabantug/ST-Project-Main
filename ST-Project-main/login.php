<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>GoMart - Log In</title>
</head>
<body>
  <div class="login-container">
    <div class="left-section">
      <h1>GoMart</h1>
      <p>Log in now to continue shopping, discover exclusive deals, and unlock personalized offers designed just for you!</p>
      <img src="images/login.png" alt="GoMart Illustration" class="login-img">
    </div>
    <div class="right-section-container">
      <div class="welcome">
        <p><span class="welcome-title">Welcome back to GoMart!</span> <br> Let's get started by logging into your account.</p>
      </div>
      <div class="loginright-section">
        <h2>Login to your account</h2>
        <form>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
          </div>
          <button type="submit" class="submit-btn">Log In</button>
          <div class="divider">
            <hr>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <hr>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
