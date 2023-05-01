<h1>Alter Subcategory</h1>

				<form action="" method="POST">

					<input type="hidden" name="subcategory[subcatid]" value="<?=isset($subcat['subcatid'])? $subcat['subcatid'] : '' ?>" />
					<label>Name</label>
					<input type="text" name="subcategory[name]" value="<?=$subcat['name'] ?? ''?>" />
					<input type="submit" name="submit" value="Save Subcategory" />

				</form>