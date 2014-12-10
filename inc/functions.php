<?php
function alert($type, $text)
{
    echo "<div class=\"alert alert-".$type."\" role=\"alert\">".$text."</div>";
}

function button($class, $value)
{
	echo "<button type=\"submit\" class=\"btn btn-".$class."\">".$value."</button>";
}

function login()
{
	if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
		return true;
	} else {
		return false;
	}
}
?>