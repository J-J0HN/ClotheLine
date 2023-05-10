<h1><a href="adminDash.php" class="adminBack">
    <i class="fa-solid fa-arrow-left-long" style="
        position: relative;
        right: 2em;
        display: flex;
        align-items: center;
    "></i>
</a>Categories</h1>
<?php
foreach($categories as $cat){
?>
    <blockquote>
    <p>
	<?=$cat['name']?> 
</p>
	<a href="adminCat.php?id=<?=$cat['catid']?>">edit</a>
    <form action="deleteCat.php" method="post" class='deleteCat'>
		<input type="hidden" name="catid" value="<?=$cat['catid']?>">
		<input type="submit" value="Delete" name = "delete" id="deletebtn">
	</form>
</blockquote>
    <?php
}
?>
<form action="adminCat.php" class='addCatButton'>
    <input type="submit" value="Add new category" name = "add" id="addCatBtn">
</form>