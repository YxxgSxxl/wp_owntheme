<table>
        <?php
        foreach ($result as $value) {
            echo "<tr style='display: flex; flex-direction: row; gap: 60px; justify-content: space-between;'>
                    <td>$value->ID</td>
                    <td>$value->user_login </td>
                    <td>$value->user_email</td>
                    <td>$value->user_registered</td>
                    <td><a href='http://localhost/3EME/wordpress/modifuser?id=" . $value->ID."'>modifier</a></td>
                   </tr></br>";
        }
        ?>
</table>