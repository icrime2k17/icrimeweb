<?php
echo "
<tr>
    <td>$station</td>
    <td>$district</td>
    <td>$address</td>
    <td>$phone</td>
    <td>
        <a class='action-link edit_record' data-id='$id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
        <a class='action-link delete_record' data-id='$id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
    </td>
</tr>
";
?>