<h1><a href="adminDash.php" class="adminBack">
    <i class="fa-solid fa-arrow-left-long" style="
        position: relative;
        right: 2em;
        display: flex;
        align-items: center;
    "></i>
</a>Admins</h1>
<?php
foreach($admins as $admin){
?>
    <blockquote>
    <p>
	<?=$admin['Firstname']?> 
</p>
	<a href="adminAdmins.php?id=<?=$admin['userid']?>">edit</a>
    <form action="deleteAdmin.php" method="post" class='deleteCat'>
		<input type="hidden" name="userid" value="<?=$admin['userid']?>">
		<input type="submit" value="Delete" name = "delete" id="deletebtn">
	</form>
</blockquote>
    <?php
}
?>
<form action="adminAdmins.php" class='addCatButton'>
    <input type="submit" value="Add new admin" name = "add" id="addCatBtn">
</form>