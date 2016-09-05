<?php
	require "../common/access.php";
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";


	$users = User::getusers();
	$userscount = count($users);
	if($userscount){
		echo "
			<table class='table table-stripped'>
				<thead>
					<tr>
						<th>First Name</th>
						<th>Surname</th>
						<th>Username</th>
						<th>User Type</th>
						<th>Edit User</th>
						<th>Delete User</th>
					</tr>
				</thead>
				<tbody>";
		for($i=0; $i<$userscount; $i++){
			$username = $users[$i];
			$user = new User($username);
			$firstname = $user->getFirstName();
			$surname = $user->getSurname();
			$usertype = $user->getUserType();
			echo "<tr>
					<td>$firstname</td>
					<td>$surname</td>
					<td>$username</td>
					<td>$usertype</td>
					<td><a href='edituser.php?edituser=$username' id='$username'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a></td>
					<td><a href='' id='$username'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td> 
				</tr>";
		}
			
			echo	"</tbody>
			</table>";
	}
	else{
		echo "There are no users to display";
	}

	echo "<a href='adduser.php' class='btn btn-default'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Add User</a>";




	
?>



<script src='../public/bootstrap/js/bootstrap.min.js'></script>
<script>
        <!--
        $(document).ready(function()
        {
                $('a.delete').click(function(e)
                {
                        e.preventDefault();
                        var username = $(this).attr('id');
                        $(".modal-body").attr('id', username);
                        var text = 'Are You sure you want to delete '+username+'?';
                        $(".modal-body").html(text);
                        $('#myModal').modal('show');
                });
                
                $('a#modaldelete').click(function(e)
                {
                        var username = $('.modal-body').attr('id');
                        
                        $.ajax({
                                type: "POST",
                                url: "deleteuser.php",
                                data: {username: username},
                                cache: false,
                                success: function(html) { 
                                        $('tr#'+username).remove();
                                }
                        });
                });
                
                $('a.edit').click(function(e)
                {
                        e.preventDefault();
                        var username = $(this).attr('id');
                        $.ajax({
                                type: "POST",
                                url: "usersession.php",
                                data: {username: username},
                                cache: false,
                                success: function(html) { 
                                        window.location="edituser.php";
                                }
                        });
                });
                
    </script>

    <?php require "../layout/footer.php"; ?>
                                                                                                                                             264,30-58     93%
