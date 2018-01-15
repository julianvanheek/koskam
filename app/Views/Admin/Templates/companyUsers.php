<thead>
  <tr>
    <th>ID</th>
    <th>Naam</th>
    <th>E-mail</th>
  </tr>
</thead>
<tbody>
	<?php 
	foreach ($records as $user) {
		echo '
		<tr>
			<td>'. $user->u_id .' </td>
			<td>'. $user->u_firstname .' '. $user->u_lastname .' </td>
			<td>'. $user->u_email .' </td>
		</tr>
		';
	}
	?>
</tbody>