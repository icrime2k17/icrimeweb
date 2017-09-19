<?php
echo "
<tr>
    <td>$id</td>
    <td>$crime</td>
    <td>$type</td>
    <td>
        <a class='action-link edit_record' data-id='$id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
        <a class='action-link delete_record' data-id='$id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
    </td>
</tr>
";
?>