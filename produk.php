<?php session_start(); ?>
<?php include"connection.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUK</title>
</head>
<body>
<pre>
	<form action="proses_tambah.php" method="POST">
		Nama PRODUK 	: <input type="text" name="title">
		HARGA 			: <input type="text" name="harga">
		DESC 			: <textarea name="desc"></textarea>
		IMAGE			: <input type="file" name="image">

		<h2>ACTION</h2>
		<select name="status">status
			<option value="1">Publish</option>
			<option value="2">Draft</option>
		</select>
		<?php 
			$sql="SELECT * FROM t_kategori";
			$result=$db->query($sql);
		?>
		<select name="kategori">kategori
		<?php if ($result->num_rows > 0) :?>
		<?php while ($row=$result->fetch_assoc()):?>
			<option value="<?=$row['id']?>"><?=$row['nama_kategori']?></option>
		<?php endwhile; ?>
	<?php endif; ?>
		</select>

	</form>
</pre>
</body>
</html>