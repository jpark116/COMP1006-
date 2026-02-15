<?php
require "connection.php";

//making sure id exists.
if (!isset($_GET['id'])) {
    die("No subscriber ID provided.");
}

//set Update ID to id from subscribers page.
$subscriber_id = $_GET['id'];

//Post under condition that form is submitted.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');

//display error if field is blank otherwise update information with new inputs. 
if ($first_name === '' || $last_name === '' || $email === ''){
    $error = "Please make sure that first name, last name and email are not empty.";
} 
else{
    $sql = "UPDATE subscribers 
            SET first_name = :first_name,
                last_name = :last_name,
                email = :email
            WHERE id = :id";

//prepare statement.   
$stmt = $pdo->prepare($sql);

//Bind parameters.
$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':id', $subscriber_id);

//execute statement.
$stmt->execute();

//redirect page to subscribers page.
header("Location: subscribers.php");

exit;
 }
}

//getting current data for id row. Then storing the data in variable.
$sql = "SELECT * FROM subscribers WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $subscriber_id);
$stmt->execute();

$subscriber = $stmt->fetch();

if(!$subscriber){
    die("no subscriber found.");
}
?>

<!-- prevents display of form if there is an error previously. -->
<main>
<?php if (!empty($error)): ?>
    <p class="text-danger"><?= htmlspecialchars($error); ?></p>
  <?php endif; ?>
  <!-- form populated with subscriber data from specific id that can be changed/updated with new information. -->
    <form method="post">
        <h2>Update subscriber <?= htmlspecialchars($subscriber['id']);?></h2>

        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($subscriber['first_name'])?>">
        </input>
        <lable for="last_name"> Last Name</label>
        <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($subscriber['last_name'])?>";>
        </input>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($subscriber['email'])?>">
        </input>
        <!-- button to save changes made in form. -->
        <button class="btn btn-primary">Save Changes</button>
        <a href="subscribers.php" class="btn btn-secondary">Cancel</a>
        </input>
    </form>
</main>


