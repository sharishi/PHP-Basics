
<h3>Inscrie-te la o specialitate!</h3>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"enctype="multipart/form-data">
    <fieldset>
        <table>
            <tr>
                <td><label>Numele dvoastra:</label></td>
                <td><input type="text" name="person_name" value=""/><span
                            class="err"><?php if (!empty($person_errors["person_name"])) echo " * " . $person_errors["person_name"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Prenumele dvoastra:</label></td>
                <td><input type="text" name="person_surname" value=""/><span
                            class="err"><?php if (!empty($person_errors["person_surname"])) echo " * " . $person_errors["person_surname"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Adresa dvoastra:</label></td>
                <td><input type="text" name="address" value=""/><span
                            class="err"><?php if (!empty($person_errors["address"])) echo " * " . $person_errors["address"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Adresa de email:</label></td>
                <td><input type="text" name="person_email""/><span
                            class="err"><?php if (!empty($person_errors["person_email"])) echo " * " . $person_errors["person_email"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Numarul dvoastra de telefon:</label></td>
                <td><input type="text" name="telephone_number""/><span
                            class="err"><?php if (!empty($person_errors["telephone_number"])) echo " * " . $person_errors["telephone_number"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Anul absolvirii liceului:</label></td>
                <td><input type="number" name="graduation_year""/><span
                            class="err"><?php if (!empty($person_errors["graduation_year"])) echo " * " . $person_errors["graduation_year"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label for="high_school_avg">Media absolvirii liceului:</label></td>
                <td><input type="number" name="high_school_avg" id="high_school_avg" step="0.01""/><span
                            class="err"><?php if (!empty($person_errors["high_school_avg"])) echo " * " . $person_errors["high_school_avg"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Selectati specialitate:</label></td>
                <td>
                    <select name="speciality" type="text" value="speciality">
                        <?php
                        require('connect.php');
                        $query = "SELECT * FROM specialitate";
                        $stmt = $connect->query($query);
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['id_specialitate'] . "'>" . $row['denumire_specialitate'] . ' ' . $row['durata_specialitate'] . ' ani' ."</option>";
                        }
                        $connect = null;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Selectati facultate:</label></td>
                <td>
                    <select name="faculty" type="text" value="faculty">
                        <?php
                        require('connect.php');
                        $query = "SELECT * FROM facultate";
                        $stmt = $connect->query($query);
                        while ($row = $stmt->fetch()) {
                            echo "<option value='" . $row['id_facultate'] . "'>" . $row['denumire_facultate'] . "</option>";
                        }
                        $connect = null;
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Încărcați o fotografie:</label></td>
                <td><input type="file" name="image" id ="image" accept=".jpg, .jpeg" value="" >
                    <span class="err"><?php if (!empty($person_errors["image"])) echo " * " . $person_errors["image"]; ?></span></td>
            </tr>
        </table>
    </fieldset>
    <input type="submit" value="Inregistreaza-ma" name="submit"/>
</form>

