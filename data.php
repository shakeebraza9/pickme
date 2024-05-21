<?php include_once("global.php");

global $webClass;
global $_e;
global $productClass;
global $dbF;

//include_once('header.php');

$upd_chk = '';
$ref_id = '';
$slug = '';


/* check product slug in SEO, 
if not found then insert data into SEO  */

$a = 1;	


$sql = "SELECT * FROM `webmenu`";
$productIds = $dbF->getRows($sql);

$arr = array();

echo "<table style='border: 1px'>
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>short_desc</th>
				<th>icon</th>
				<th>link</th>
				<th>type</th>
				<th>sort</th>
				<th>under</th>
				<!-- <th>sale</th>
				<th>view</th>
				<th>prodet_timeStamp</th> -->
			</tr>
		</thead><tbody id='body_id'>";

foreach ($productIds as $key => $value) {
	$id = $value['id'];
	$name = $value['name'];
	$short_desc = $value['short_desc'];
	$icon = $value['icon'];
	$link = $value['link'];
	$type = $value['type'];
	$sort = $value['sort'];
	$under = $value['under'];
?>
	<tr>
	<td><?php echo $id; ?></td>
	<td><?php echo $name; ?></td>
	<td><?php echo $short_desc; ?></td>
	<td><?php echo $icon; ?></td>
	<td><?php echo $link; ?></td>
	<td><?php echo $type; ?></td>
	<td><?php echo $sort; ?></td>
	<td><?php echo $under; ?></td>
	<!-- <td><?php echo $value['prodet_timeStamp']; ?></td> -->

	</tr>

	<?php
}

echo "</tbody></table>";


?>
<script>
$(function() {
	var a = $('.chk_prblm').length;
	console.log(a);
});
</script>

<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>