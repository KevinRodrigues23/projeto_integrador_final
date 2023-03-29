<?php

include 'config.php';

include("admin_header.php");

$select_boxmessages = $conn->prepare("SELECT * FROM `boxmessages`");
$select_boxmessages->execute();

if ($select_boxmessages->rowCount() > 0) {
  while ($fetch_boxmessages = $select_boxmessages->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="box">
      <p> placed on : <span><?= $fetch_boxmessages['placed_on']; ?></span> </p>
      <p> name : <span><?= $fetch_boxmessages['nome_boxMessage']; ?></span> </p>
      <p> email : <span><?= $fetch_boxmessages['email_boxMessage']; ?></span> </p>
      <p> telefone : <span><?= $fetch_boxmessages['telefone_boxMessage']; ?></span> </p>
      <p> message : <span><?= $fetch_boxmessages['address_boxMessage']; ?></span> </p>
      
      <form action="" method="post">
        <input type="hidden" name="order_id" value="<?= $fetch_boxmessages['id_boxMessage']; ?>">
        <select name="payment_status" class="select">
          <option selected disabled><?= $fetch_boxmessages['payment_status']; ?></option>
          <option value="pending">pending</option>
          <option value="completed">completed</option>
        </select>
        <div class="flex-btn">
          <input type="submit" value="update" class="option-btn" name="update_payment">
          <a href="admin_boxmessages.php?delete=<?= $fetch_boxmessages['id_boxMessage']; ?>" class="delete-btn" onclick="return confirm('delete this order?');">delete</a>
        </div>
      </form>
    </div>
<?php
  }
} else {
  echo '<p class="empty">no boxmessages placed yet!</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

   <!-- font awesome cdn link  -->z
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom admin style link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>

