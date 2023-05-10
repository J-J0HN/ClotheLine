<h1>Alter Category</h1>

				<form action="" method="POST">

					<input type="hidden" name="category[catid]" value="<?=isset($cat['catid'])? $cat['catid'] : '' ?>" />
					<label>Name</label>
					<input type="text" name="category[name]" value="<?=$cat['name'] ?? ''?>" />
					<input type="submit" name="submit" value="Save Category" />

				</form>