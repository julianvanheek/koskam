<thead>
  <tr>
    <th>ID</th>
    <th>Merk</th>
    <th>Type</th>
    <th>Titel</th>
    <th>Beschrijving</th>
    <th>Prijs</th>
    <th>Bewerken</th>
  </tr>
</thead>
<tbody>
	<?php 
	foreach ($records as $product) {
		echo '
		<tr>
			<td>'. $product->p_id .'</td>
			<td>'. $product->p_brand .'</td>
			<td>'. $product->p_type .'</td>
			<td>'. $product->p_title .'</td>
			<td>'. $product->p_description .'</td>
			<td>€'. $product->p_price .',-</td>
			<td><button class="btn btn-warning editProduct" data-id="'.$product->p_id.'" data-toggle="modal" data-target="#editProduct"><span class="fa fa-pencil"></span></button></td>
		</tr>
		';
	}
	?>
</tbody>