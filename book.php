<?php include 'db.php'; 
$hotel_id = $_GET['hotel_id'] ?? 0;
$stmt=$conn->prepare("SELECT * FROM hotels WHERE id=?");
$stmt->execute([$hotel_id]);
$hotel=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $checkin=$_POST['checkin'];
    $checkout=$_POST['checkout'];

    $insert=$conn->prepare("INSERT INTO bookings (hotel_id,name,email,checkin,checkout) VALUES (?,?,?,?,?)");
    $insert->execute([$hotel_id,$name,$email,$checkin,$checkout]);
    echo "<script>window.location.href='confirmation.php?hotel_id=$hotel_id';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Hotel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body{font-family:Arial;margin:0;background:#f2f2f2;}
    header{background:#004080;color:#fff;padding:15px;text-align:center;}
    .container{max-width:600px;margin:20px auto;padding:20px;background:#fff;border-radius:10px;}
    input,button{width:100%;padding:10px;margin:8px 0;border:1px solid #ccc;border-radius:5px;}
    button{background:#004080;color:#fff;border:none;cursor:pointer;}
  </style>
</head>
<body>
<header>
  <h1>Book: <?php echo $hotel['name']; ?></h1>
</header>
<div class="container">
<form method="post">
  <label>Your Name</label>
  <input type="text" name="name" required>
  <label>Your Email</label>
  <input type="email" name="email" required>
  <label>Check-In Date</label>
  <input type="date" name="checkin" required>
  <label>Check-Out Date</label>
  <input type="date" name="checkout" required>
  <button type="submit">Confirm Booking</button>
</form>
</div>
</body>
</html>
