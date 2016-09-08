<?php 

require "../layout/header.php";
require "../common/programmes.class.php"; 

require "../layout/sidebar.php";

?>

<input type="text" name="myname" id="myname" />
<button id="my">ClickMe</button>



<?php

require "../layout/footer.php";

?>

<script type="text/javascript">
$(function(){
	
	$('#my').click(function(){
		alert('hello')
	})

});
</script>