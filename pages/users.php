<?php

	require_once('ConnexionWithBD.php');

        $sql = "SELECT * FROM Users";
		$stmt = $pdo->query($sql);

?><!DOCTYPE html>
<html>
<head>Afficher la table users</head>
<body>
 <h1>Liste des utilisateurs</h1>
 <table>
   <thead>
     <tr>
       <th>pseudo</th>
       <th>email</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['user_name']); ?></td>
       <td><?php echo htmlspecialchars($row['email']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>