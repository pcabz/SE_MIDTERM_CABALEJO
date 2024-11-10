<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Order | Vario Motorcycles</title>
	<link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="variologo.png">
</head>
<body>

	<h1>Edit customer's order</h1>
	<?php $getOrderByID = getOrderByID($pdo, $_GET['order_id']); ?>
    <form action="core/handleForms.php?order_id=<?php echo $_GET['order_id']; ?>&customer_id=<?php echo $_GET['customer_id']; ?>" method="POST">
        
        <label for="order_type">Order Type:</label><br>
        <select id="order_type" name="order_type" required>
            <option value="Sale" <?php if ($getOrderByID['order_type'] == 'Sale') echo 'selected'; ?>>Sale</option>
            <option value="Repair" <?php if ($getOrderByID['order_type'] == 'Repair') echo 'selected'; ?>>Repair</option>
            <option value="Moto GP Accessory" <?php if ($getOrderByID['order_type'] == 'Moto GP Accessory') echo 'selected'; ?>>Moto GP Accessory</option>
            <option value="Motorcycle" <?php if ($getOrderByID['order_type'] == 'Motorcycle') echo 'selected'; ?>>Motorcycle</option>
        </select><br><br>
        
        <label for="item_description">Item Description:</label><br>
        <input type="text" name="item_description" value="<?php echo $getOrderByID['item_description']; ?>" required><br><br>
        <label for="price">Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?php echo $getOrderByID['price']; ?>" required><br><br>
        
        <input type="submit" name="editOrderBtn">
        <input type="submit" name="canceleditBtn" value="Cancel">
	</form>
</body>
</html>