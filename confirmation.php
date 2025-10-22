<?php include 'db.php'; 
$hotel_id=$_GET['hotel_id']??0;
$stmt=$conn->prepare("SELECT * FROM hotels WHERE id=?");
$stmt->execute([$hotel_id]);
$hotel=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Booking Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:Arial;margin:0;background:#f2f2f2;}
    header{background:#004080;color:#fff;padding:15px;text-align:center;}
    .container{max-width:600px;margin:20px auto;padding:20px;background:#fff;border-radius:10px;text-align:center;}
    a{display:inline-block;margin-top:20px;background:#004080;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none;}
  </style>
</head>
<body>
<header>
  <h1>Booking Confirmed</h1>
</header>
<div class="container">
  <h2>Your booking for <?php echo $hotel['name']; ?> is confirmed!</h2>
  <p>Thank you for choosing our service.</p>
  <a href="index.php">Back to Home</a>
</div>
</body>
</html>
