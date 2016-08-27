<?php
	//analyse formulaire avant envoit bdd
	function console_no($post_console)
	{
		if ($post_console === "ps4")
			$number = 1;
		else
			$number = 2;
		return($number);
	}

	function classe_no($post_classe)
	{
		if ($post_classe === "hunt")
			$number = 1;
		else if ($post_classe === "titan")
			$number = 2;
		else
			$number = 3;
		return($number);
	}

	function raid_mode_no($post_raid_mode)
	{
		if ($post_raid_mode === "normal")
			$number = 1;
		else
			$number = 2;
		return($number);
	}

	function activities_no($post_activities)
	{
		if ($post_activities === "beginning")
			$number = 1;
		else if ($post_activities === "glyphes")
			$number = 2;
		else if ($post_activities === "pretre")
			$number = 3;
		else if ($post_activities === "golgo")
			$number = 4;
		else if ($post_activities === "pretresses")
			$number = 5;
		else if ($post_activities === "oryx")
			$number = 6;
		return($number);
	}

	function notAlone_no($post_notAlone)
	{
		if($post_notAlone === "1")
			$number = 1;
		else if ($post_notAlone === "2")
			$number = 2;
		else if ($post_notAlone === "3")
			$number = 3;
		else if ($post_notAlone === "4")
			$number = 4;
		else
			$number = 0;
		return($number);
	}
 ?>
