<h3>More info</h3>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <table>
        <tr>
            <td><label>Info about person, who has postal code MD4044:</label></td>
            <td>
                <?php
                require('connect_exam.php');
                $query = "SELECT * FROM client WHERE postal_code = 'MD4044'";
                $stmt = $connect->prepare($query);
                $stmt->execute();
                $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($clients)) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Surname</th><th>First Name</th></tr>";
                    foreach($clients as $client) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($client['id_client']) . "</td>";
                        echo "<td>" . htmlspecialchars($client['client_surname']) . "</td>";
                        echo "<td>" . htmlspecialchars($client['client_firstname']) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No clients found with postal code MD4044.";
                }
                ?>
            </td>
        </tr>
    </table>
</form>
