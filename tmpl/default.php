<?php

#@license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

defined('_JEXEC') or die;

print_r($breaks);

?>

<div id="responsive-tabs">

<?php 

	$is_first = true;

	foreach($tab_content as $tab){
		if ($is_first === true) {
			echo "<input type='radio' name='tabs' checked id='tab" . $tab['tab_count'] . "'/>";
			$is_first = false;
		} else {
			echo "<input type='radio' name='tabs' id='tab" . $tab['tab_count'] . "'/>";
		}

		echo "<label for='tab" . $tab['tab_count'] . "'><span>" . $tab['tab_title'] . "</span></label>";
	}

?>

	<div class="tab-content">

	<?php 

		foreach($tab_content as $tab){
			echo "<div id='content" . $tab['tab_count'] . "' class='tab-content-item'>";
			echo $tab['tab_content'];
			echo "</div>";
		}

	?>

	</div>

</div>