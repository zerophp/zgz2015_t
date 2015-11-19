<?php 
echo "<pre>get: ";
print_r($_GET);
echo "</pre>";

echo "<pre>post: ";
print_r($_POST);
echo "</pre>";

$filename = 'user.txt';
$users = file_get_contents($filename);
$users = explode("\n", $users);

?>

<ul><form action ="action.php" method="post"  enctype = "multipart/form-data">
<li>Seguro que quieres borar a ?<?php echo $users[$_GET ['id']]?>
<input type='TEXT' name='name' value='null' />
</li><li>
<INPUT TYPE=SUBMIT NAME=submit VALUE=No>
</li>
<li>
<INPUT TYPE=SUBMIT NAME=submit VALUE=Si>
</li></form></ul>