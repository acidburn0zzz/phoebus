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
            require_once('../lib/vc/nsIVersionComparator.php'
            if (isset($_POST[currVersion]) && isset($_POST[compVersion])) {
                require_once('../lib/vc/nsIVersionComparator.php')
                
                $vcResult = ToolkitVersionComparator::compare($_POST[currVersion], $_POST[compVersion]);
                
                if ($vcResult = 0) {
                    $htmlWriteOut = '<p>Compare version ' . $_POST[compVersion] . ' is the same as current version ' . $_POST[currVersion] . '</p>';
                }
                elseif ($vcResult = 1) {
                    $htmlWriteOut = '<p>Compare version' . $_POST[compVersion] . ' is newer than current version ' . $_POST[currVersion] . '</p>';
                }
                elseif ($vcResult = -1) {
                    $htmlWriteOut = '<p>Compare version' . $_POST[compVersion] . ' is older than current version ' . $_POST[currVersion] . '</p>';
                }
                print($htmlWriteOut);
            }
        ?>
	</body>
</html>