<h1><a href="adminDash.php" class="adminBack">
    <i class="fa-solid fa-arrow-left-long" style="
        position: relative;
        right: 2em;
        display: flex;
        align-items: center;
    "></i>
</a>Sub Categories</h1>
<?php
foreach($subcategories as $subcat){
?>
    <blockquote>
    <p>
	<?=$subcat['name']?> 
</p>
	<a href="adminSubCat.php?id=<?=$subcat['subcatid']?>">edit</a>
    <form action="deleteSubCat.php" method="post" class='deleteCat'>
		<input type="hidden" name="subcatid" value="<?=$subcat['subcatid']?>">
		<input type="submit" value="Delete" name = "delete" id="deletebtn">
	</form>
</blockquote>
    <?php
}
?>
<form action="adminSubCat.php" class='addCatButton'>
    <input type="submit" value="Add new subcategory" name = "add" id="addCatBtn">
</form>