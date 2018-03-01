<?php

	$username = 'amw46';
	$password = 'FzLRiQH3';
	$hostname = 'sql2.njit.edu';


	$dsn = "mysql:host=$hostname;dbname=$username";



	try {
		$db = new PDO($dsn, $username, $password);
		echo '<h2>Connected to the database successfully!</h2>';

	} catch (PDOException $error) {
		echo '<h3>Database Error</h3>';
		echo $error->getMessage().'<br>';
		exit(); //exit the program
	} catch (Exception $e) {
		echo '<h3>Generic Error</h3>';
		echo $e->getMessage().'<br>';
		exit();

	} //end try


	$query = 'SELECT * FROM accounts WHERE id < :id';
	$statement = $db->prepare($query);
	$statement->bindValue(':id', 6);
	$statement->execute();
	$accts = $statement->fetchAll();
	$statement->closeCursor();

?>

<table border="1">
<tr>
  <th>First name</th>
  <th>Last name</th>
</tr>
<?php foreach ($accts as $acct) : ?>
<?php $count; ?>
<tr>
<td><?php echo $acct['fname']; ?></td>
<td><?php echo $acct['lname']; ?> </td>
</tr>
<?php $count++; ?>

<?php endforeach; ?>
</table>

<?php echo '<br><strong>'.$count.' records displayed</strong>' ?>
