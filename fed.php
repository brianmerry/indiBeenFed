<?php
	$name=$_SESSION['name'];
	$name=ucfirst($name);
?>
<script>
function no() {
    var x = document.getElementById("fed");
    x.checked = true;
	document.getElementById("form").submit();
}
function yes() {
    var x = document.getElementById("fed1");
    x.checked = true;
	document.getElementById("form").submit();
}
</script>
<center>
<h1>Did you feed Indi today, <?php echo "$name";?>?</h1>
<form method="POST" action="submitmorning.php" id="form">
<table style="text-align:center" width="25%">
<tr><td><input type="radio" name="fed" id="fed" value="0" hidden></td><td><input type="radio" name="fed" id="fed1" value="1" hidden></td></tr>
<tr><td><h1><a href="" onclick="no()">NO</a></h1></td><td><h1><a href="" onclick="yes()">YES</a></h1></td></tr>
</form></table>