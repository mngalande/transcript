<?php
	require "../common/access.php";
	require "../common/authorise.php";
	require "../common/connect.php";
	require "../common/user.php";
	require "../layout/header.php";
	require "../layout/sidebar.php";


	$users = User::getusers();
	$userscount = count($users);
	if(isset($_SESSION['feedback'])){
		echo $_SESSION['feedback'];
		unset($_SESSION['feedback']);
	}
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
			echo "<tr id=$username>
					<td>$firstname</td>
					<td>$surname</td>
					<td>$username</td>
					<td>$usertype</td>
					<td><a href='edituser.php?edituser=$username'><span class='glyphicon glyphicon-pencil delete' aria-hidden='true'></span></a></td>
					<td><a href='' id='$username' class='delete'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td> 
				</tr>";
		}
			
			echo	"</tbody>
			</table>";
	}
	else{
		echo "There are no users to display";
	}

	echo "<a href='adduser.php' id=$username class='btn btn-default btn-circle btn-lg pull-right'>
          <i class='glyphicon glyphicon-plus'></i></a>";
	 




	
?>

 <!-- Confirmation Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body" id=''>

                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a href='' id='modaldelete' type="button" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

<!--end confirmation modal-->

<script>
    <!--
    $(document).ready(function(){

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
        	e.preventDefault();
            var username = $('.modal-body').attr('id');
            
            $.ajax({
                type: "POST",
                url: "deleteuser.php",
                data: {username: username},
                cache: false,
                success: function(html){ 
                	if(html == ''){
                		 $('#myModal').modal('hide');
                    	$('tr#'+username).remove();
	                }
	                else{

	                }
                }
            });
        });
    });
</script>

    <?php require "../layout/footer.php"; ?>