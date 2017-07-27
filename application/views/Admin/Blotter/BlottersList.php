<?php
echo "
<tr>
    <td>$entry_number</td>
    <td>$incident</td>
    <td>$place_of_incident</td>
    <td>$date_reported</td>
    <td>
        <a class='action-link edit_record' data-id='$id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
        <a class='action-link delete_record' data-id='$id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
    </td>
</tr>
";
?>