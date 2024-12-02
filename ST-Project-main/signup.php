<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>GoMart</title>
</head>
<body>
  <div class="signupcontainer">
    <div class="left-section">
      <h1>GoMart</h1>
      <p>We’re thrilled to have you on board. Explore a wide range of products, enjoy exclusive deals, and make shopping easier than ever!</p>
      <img src="images/signup.png" alt="GoMart Illustration" class="signupimg">
    </div>
    <div class="right-section-container">
    <div class="welcome">
    <p><span class="welcome-title">Welcome to GoMart!</span> <br> Let's get started by creating your account.</p>
    </div>
      <div class="right-section">
        <h2>Create an account</h2>
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
            <small class="small-text">Use 8 or more characters with a mix of letters, numbers, & symbols</small>
          </div>
          <button type="submit" class="submit-btn">Create an account</button>
          <div class="divider">
            <hr>
            <p>Already have an account? <a href="login.php">Log In</a></p>
            <hr>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
