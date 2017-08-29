<?php
echo "
<tr>
    <td>$id</td>
    <td>$crime</td>
    <td>$address</td>
    <td>$date_reported</td>
    <td>
        <a href='/admin/crimeReportView/$id' target='_blank' class='action-link view-crime-report'>View</a>
        $flag
    </td>
</tr>
";
?>