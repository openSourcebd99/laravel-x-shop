<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Email</title>
  <style>
  body {
    font-family: Arial, sans-serif;
  }

  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
  }

  .header {
    text-align: center;
    margin-bottom: 20px;
  }

  .content {
    margin: 20px 0;
  }
  </style>
</head>

<body>
  <div class="container">
    <div class="header">
      <h1>Welcome, {{ $customer->name }}!</h1>
    </div>
    <div class="content">
      <p>Thank you for being a valued customer. We appreciate your business and look forward to serving you in the
        future.</p>
      <p>If you have any questions or need further assistance, please don't hesitate to contact us.</p>
      <p>Best Regards,</p>
      <p>Your Company Name</p>
    </div>
  </div>
</body>

</html>