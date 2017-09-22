<?php
echo "
<tr>
    <td>$id</td>
    <td>$crime</td>
    <td>$type</td>
    <td>$address</td>
    <td>$date_reported</td>
    <td>
        <a href='/admin/crimeReportView/$id' target='_blank' class='action-link view-crime-report'>View</a>
        <a data-id='$id' class='action-link delete-crime-report'>Remove</a>
        $flag
    </td>
</tr>
";
?>