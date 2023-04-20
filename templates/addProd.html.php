<form action="" method="post" class="loginform">
    <input type="hidden" name="prod[prodid]" value="<?=isset($prod['prodid'])? $prod['id'] : '' ?>">

    <label>Product Name:</label>
				<input type="text" name="prod[prodname]" value="<?=$prod['prodname'] ?? ''?>"/>

				<label>Price</label>
				<input type="text" name="prod[prodprice]" value="<?=$prod['prodprice'] ?? ''?>"/>

				<label>Category</label>
				<select name="prod[category]">
				<?php 
				require '../pdo.php';
                    $catTypes=findAll($pdo, 'category');
					$prodCat=find($pdo, 'category', 'catid', $prod['category'])[0];
					foreach($catTypes as $row){
						echo '<option value="'. $row['catid'] . '" '.($prodCat['catid'] == $row['catid'] ? 'selected' : '').'>'. $row['name'].'</option>';
					}
?>
				</select>

				<label>Sub Category</label>
				<select name="prod[subcategory]">
				<?php 
				require '../pdo.php';
                    $subcatTypes=findAll($pdo, 'subcategory');
					$prodSubcat=find($pdo, 'subcategory', 'subcatid', $prod['subcategory'])[0];
					foreach($subcatTypes as $row){
						echo '<option value="'. $row['subcatid'] . '" '.($prodSubcat['subcatid'] == $row['subcatid'] ? 'selected' : '').'>'. $row['name'].'</option>';
					}
?>
				</select>

                <div id="content">
            <form method="POST" action="">
            <div class="form-group">
                <input class="form-control" type="file" name="prod[prodimg]" value="" />
            </div>
        </form>
    </div>
    <div id="display-image">
    <?php
        $query = "select * from product";
        $stmt = $pdo->prepare($query);

        $stmt->execute();
 
        while ($data = $stmt->fetch()) {
    ?>
        <img src="./public/<?php echo $data['prodimg']; ?>">
 
    <?php
        }
    ?>
    </div>


		<input type="submit" name="submit" value="Add" />

</form>