<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Current Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Current Events</h1>
        <div>
            <?php
            session_start();
            require_once "../data/db_connections.php";

            if($_SESSION["role_id"] === "2"){
                ?>
                <a href="../events/admin_panel.php" class="btn btn-primary">Admin Panel</a>
                <?php
            }
            ?>
            <form action="logout.php" method="post" style="display: inline;">
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>

    <?php
    // Подготовка запроса
    $sql = "SELECT * FROM events WHERE date > CURRENT_TIMESTAMP";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Обработка результатов запроса
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($events) > 0) {
        echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
        foreach ($events as $row) {
            ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row["event_name"]; ?></h5>
                        <p class="card-text">Price: <?php echo $row["price"]; ?></p>
                        <p class="card-text">Available Seats: <?php echo $row["number_seats"]; ?></p>
                        <p class="card-text">Date: <?php echo $row["date"]; ?></p>
                        <?php if($_SESSION["role_id"] === "1"): ?>
                            <form action="recording.php" method="get">
                                <input type="hidden" name="event_id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="btn btn-primary">Recording for event '<?php echo $row["event_name"]; ?>'</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
        }
        echo '</div>';
    } else {
        echo "<p>No events found</p>";
    }
    $conn = null;
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
