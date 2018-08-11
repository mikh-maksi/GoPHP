tmp
<?php

$handle = fopen("sql/sql_create.sql", "r");
echo $handle;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer."<br>";
    }
    if (!feof($handle)) {
        echo "Error: unexpected fgets() fail\n";
    }
    fclose($handle);
}
?>