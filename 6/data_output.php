<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>output</title>
</head>
<body>
<?php

$file = "data/data.csv";
if ( ( $handle = fopen ( $file, "r" ) ) !== FALSE ) {
    echo "<table>\n";
    while ( ( $data = fgetcsv ( $handle, 1000, ",", '"' ) ) !== FALSE ) {
        echo "\t<tr>\n";
        for ( $i = 0; $i < count( $data ); $i++ ) {
            echo "\t\t<td>{$data[$i]}</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
    fclose ( $handle );
}

?>

<p>とりあえず、最低限ですが提出します。
金曜日終日かけて改良します！</p>

</body>
</html>
