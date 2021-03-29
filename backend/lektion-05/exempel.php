<?php
$table = "<table>";
    $table .= "<tr>
        <th>Name</th>
        <th>Email</th>
    </tr>";
    foreach ($array as $key => $value) {
    $table .= "<tr>
        <td> $value[name] </td>
        <td> $value[email] </td>
    </tr>";
    }
    $table .= "</table>";
echo $table;
?>