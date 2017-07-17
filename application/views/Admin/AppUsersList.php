<?php
echo "
<tr>
    <td>$username</td>
    <td>$firstname</td>
    <td>$lastname</td>
    <td>$position</td>
    <td>
        <a class='action-link' href='appUsersEdit/$id'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
        <a class='action-link' href='appUsersDelete/$id'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
    </td>
</tr>
";
?>