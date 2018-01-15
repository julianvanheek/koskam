<thead>
  <tr>
    <th>ID</th>
    <th>BedrijfID</th>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>Email</th>
    <th>Level</th>
    <th>Geactiveerd</th>
    <th>Bewerken</th>
  </tr>
</thead>
<tbody>
	<?php 
	foreach ($records as $user) {
		echo '
		<tr>
			<td>'. $user->u_id .'</td>
			<td>'. $user->c_id .'</td>
			<td>'. $user->u_firstname .'</td>
			<td>'. $user->u_lastname .'</td>
			<td>'. $user->u_email .'</td>
			<td>'. $user->u_user_level .'</td>
			<td>'. $user->u_active .'</td>
			<td>
				<button class="btn btn-warning editUser" data-id="'.$user->u_id.'" data-toggle="modal" data-target="#editUser"><span class="fa fa-pencil"></span></button>
			</td>
		</tr>
		';
	}
	?>
</tbody>