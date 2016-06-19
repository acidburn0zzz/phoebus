<!DOCTYPE html>
<html>
	<head>
		<title>Easy nsIVersionComparator</title>
	</head>
	<body>
		<p>Check the result of a services.vc comparison.
        <form action="ezvc.php" method="post">
            Current Version: <input type="text" name="currVersion"><br>
            Compare to Version: <input type="text" name="compVersion"><br>
            <input type="submit">
        </form>
        <hr>
        <?php
            require_once('../lib/vc/nsIVersionComparator.php');
            if (array_key_exists('currVersion', $_POST) && array_key_exists('compVersion', $_POST)) {
                
                $vcResult = ToolkitVersionComparator::compare($_POST['currVersion'], $_POST['compVersion']);
                
                if ($vcResult == 0) {
                    $htmlWriteOut = '<p>' . $_POST['compVersion'] . ' is the same version</p>';
                }
                elseif ($vcResult == 1) {
                    $htmlWriteOut = '<p>' . $_POST['compVersion'] . ' is a newer version</p>';
                }
                elseif ($vcResult == -1) {
                    $htmlWriteOut = '<p>' . $_POST['compVersion'] . ' is an older version</p>';
                }
                print($htmlWriteOut);
            }
        ?>
	</body>
</html>