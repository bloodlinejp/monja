<html>
<body>
<form method="POST">
    <input name="first"  type="text" />
    <input name="second" type="text" />
    <input type="submit" />
</form>
<?php
var_dump(file_get_contents("php://input"));
?>
</body>
</html>
