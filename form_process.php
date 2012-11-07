<html><body>
<?php
// POST variables sent thru html form 'form.htm'
$quantity = $_POST['quantity'];
$color = $_POST['color'];
// GET variables sent thru url string 'form_process.php?username=brad'
$username = $_GET['username'];

echo "You ordered ". $quantity . " " . $color . ".<br />";
echo "username = " . $username;

?>
</body></html>