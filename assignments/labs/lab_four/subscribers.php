<?php
//TODO:

/*
  TODO:
  1. Write a SELECT query to get all subscribers
  2. Add ORDER BY subscribed_at DESC
  3. Prepare the statement
  4. Execute the statement
  5. Fetch all results into $subscribers
*/
require "connection.php";

$sql = "SELECT * FROM subscribers ORDER BY subscribed_at DESC";

$stmt = $pdo->prepare($sql);

$stmt->execute();
$subscribers = $stmt->fetchAll();

?>

<main class="container mt-4">
  <h1>Subscribers</h1>

  <?php if (count($subscribers) === 0): ?>
    <p>No subscribers yet.</p>
  <?php else: ?>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Subscribed</th>
        </tr>
      </thead>
      <tbody>
        <!-- TODO: Loop through $subscribers and output each row -->
         <?php foreach($subscribers as $subscriber):?>
          <tr>
            <td><?php echo $subscriber['id']; ?></td>
            <td><?php echo $subscriber['first_name']; ?></td>
            <td><?php echo $subscriber['last_name']; ?></td>
            <td><?php echo $subscriber['email']; ?></td>
            <td><?php echo $subscriber['subscribed_at']; ?></td>
            <!-- Add link to direct to update page and append current id to end of url. -->
            <td><a href="update.php?id=<?= urlencode($subscriber['id']); ?>">Update</a></td>\
            <!-- add link to direct to delete page and append current id. -->
            <td><a href="delete.php?id=<?= urlencode($subscriber['id']); ?>">Delete</a></td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  <?php endif; ?>
  <!-- Link to go back to subscribe form. -->
  <p class="mt-3">
    <a href="index.php">Back to Subscribe Form</a>
  </p>
</main>

<?php //require "includes/footer.php"; ?>
