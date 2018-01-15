<thead>
  <tr>
    <th>ID</th>
    <th>Naam</th>
    <th>KvK</th>
    <th>Eigenaar</th>
    <th>Bezorg adres</th>
    <th>Postcode</th>
    <th>Plaats</th>
    <th>Telefoon</th>
    <th>Mobiel</th>
    <th>E-mail</th>
    <th>Bewerken</th>
  </tr>
</thead>
<tbody>
	<?php 
	foreach ($records as $company) {
		echo '
		<tr>
			<td>'. $company->c_id .'</td>
			<td>'. $company->c_name .'</td>
			<td>'. $company->c_kvk .'</td>
			<td>'. $company->c_owner .'</td>
			<td>'. $company->c_deliver_address .'</td>
			<td>'. $company->c_zipcode .'</td>
			<td>'. $company->c_city .'</td>
			<td>'. $company->c_phone .'</td>
			<td>'. $company->c_phone_m .'</td>
			<td>'. $company->c_email .'</td>
			<td>
				<button class="btn btn-warning editCompany" data-id="'.$company->c_id.'" data-toggle="modal" data-target="#editCompany"><span class="fa fa-pencil"></span></button>
				<button class="btn btn-info usersList" data-id="'.$company->c_id.'" data-toggle="modal" data-target="#usersList"><span class="fa fa-users"></span></button>
			</td>
		</tr>
		';
	}
	?>
</tbody>