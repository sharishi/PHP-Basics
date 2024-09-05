
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
      enctype="multipart/form-data">
    <fieldset>
        <table>
            <tr>
                <td><label>Your surname:</label></td>
                <td><input type="text" name="person_surname" value=""/><span
                            class="err"><?php if (!empty($person_errors["person_surname"])) echo " * " . $person_errors["person_surname"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Your name:</label></td>
                <td><input type="text" name="person_name" value=""/><span
                            class="err"><?php if (!empty($person_errors["person_name"])) echo " * " . $person_errors["person_name"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Your address:</label></td>
                <td><input type="text" name="address" value=""/><span
                            class="err"><?php if (!empty($person_errors["address"])) echo " * " . $person_errors["address"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Your postal code:</label></td>
                <td><input type="text" name="postal_code" value=""/><span
                            class="err"><?php if (!empty($person_errors["postal_code"])) echo " * " . $person_errors["postal_code"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Your phone number:</label></td>
                <td><input type="text" name="telephone_number""/><span
                            class="err"><?php if (!empty($person_errors["telephone_number"])) echo " * " . $person_errors["telephone_number"]; ?></span>
                </td>
            </tr>
            <tr>
                <td><label>Your email:</label></td>
                <td><input type="text" name="person_email""/><span
                            class="err"><?php if (!empty($person_errors["person_email"])) echo " * " . $person_errors["person_email"]; ?></span>
                </td>
            </tr>

</form>
