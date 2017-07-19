<?php
echo "
<tr>
    <td>$lastname $firstname ".substr($middlename, 0, 1)."</td>
    <td>$alias</td>
    <td>$region</td>
    <td>$offenses</td>
    <td>$reward</td>
    <td>
        <a class='action-link edit_record' data-id='$id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
        <a class='action-link delete_record' data-id='$id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
    </td>
</tr>
";
?>