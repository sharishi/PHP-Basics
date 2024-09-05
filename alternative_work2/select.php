
<h3>Informații suplimentare</h3>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <table>
        <tr>
            <td><label >Selectati specialitatea care va intereseaza:</label></td>
            <td>
                <select name="speciality">
                    <?php
                    require('connect.php');
                    $query = "SELECT * FROM specialitate";
                    $stmt = $connect->prepare($query);
                    $stmt->execute();
                    $specialities = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($specialities as $speciality){
                        echo "<option value='".$speciality['id_specialitate']."'>".$speciality['denumire_specialitate']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Afiseaza rezultate" name="submit"  />
</form>

<?php
if(isset($_POST['speciality'])){
    require('connect.php');
    $search = "SELECT st.nume_student, st.prenume_student, st.nr_telefon
           FROM student st
           JOIN specialitate sp ON st.id_specialitate = sp.id_specialitate
           WHERE sp.id_specialitate = :speciality";

    $stmt = $connect->prepare($search);
    $stmt->bindParam(':speciality', $_POST['speciality']);
    $stmt->execute();
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($students) == 0) {
        echo 'Nu au fost gasite inscrieri la aceasta specialitate!';
    } else {
        ?>
        <table class="final_table">
            <caption></caption>
            <tr>
                <th>Numele</th>
                <th>Prenumele</th>
                <th>Nr.telefon</th>
            </tr>
            <?php foreach($students as $student){ ?>
                <tr>
                    <td><?php echo $student['nume_student']; ?></td>
                    <td><?php echo $student['prenume_student']; ?></td>
                    <td><?php echo $student['nr_telefon']; ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php }
}
?>

