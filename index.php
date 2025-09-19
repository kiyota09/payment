<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Payment</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top: 160px;
    }
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      background: linear-gradient(to bottom, #4071f7ff, #9c9cb4ff);
      padding-top: 20px;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
    }
    
    
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 form-container">
        <h2 class="text-center mb-4 text-white">Payment Form</h2>

        <form id="paymentForm" method="POST" action="create_payment.php">
          <div class="form-group">
            <label class="text-white" for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your email">
          </div>

          <div class="form-group">
            <label class="text-white" for="phone">Phone Number:</label>
            <input type="text" class="form-control" name="phone" id="phone" required placeholder="09XXXXXXXXX">
          </div>

          <div class="form-group">
            <label class="text-white" for="amount">Amount (PHP):</label>
            <input type="number" class="form-control" name="amount" id="amount" required placeholder="Enter amount in PHP">
          </div>

          <button type="submit" class="btn btn-custom btn-block">Pay Now</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
