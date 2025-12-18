<?php
session_start();
if (empty($_SESSION['is_admin'])) {
    header('Location: index.php');
    exit;
}

require 'db_connect.php';

$result = mysqli_query($conn, "SELECT * FROM businesses ORDER BY BusinessName");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Locally Viral | Admin Dashboard</title>
    <link rel="stylesheet" href="admin_page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="admin-nav">
            <h1>ADMIN DASHBOARD</h1>
            <div class="hamburger" onclick="toggleMenu()">☰</div>
            <ul id="admin-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="add_business.php">Add Business</a></li>
                <li><a href="browse.php">Businesses</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <?php
    if (isset($_SESSION['status'])) { // BUSINESS ADDED ALERT
        ?>
        <div class="alert-success" role="alert">
            <?php echo $_SESSION['status']; ?>
        </div>

        <?php
        unset($_SESSION['status']);
    }
    ?>

    <?php
    if (isset($_SESSION['status_2'])) { // BUSINESS REMOVED ALERT
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $_SESSION['status_2']; ?>
        </div>

        <?php
        unset($_SESSION['status_2']);
    }
    ?>

    <?php
    if (isset($_SESSION['status_3'])) { // BUSINESS CHANGES SAVED ALERT
        ?>
        <div class="alert alert-info" role="alert">
            <?php echo $_SESSION['status_3']; ?>
        </div>

        <?php
        unset($_SESSION['status_3']);
    }
    ?>

    <a class="submitbtn" href="add_business.php?">ADD A BUSINESS</a>

    <div class="admin-section">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>PRICE RANGE</th>
                    <th>BUSINESS DESCRIPTION</th>
                    <th>LOCATION</th>
                    <th>IMAGES</th>
                    <th>FACEBOOK PAGE</th>
                    <th>NUMBER</th>
                    <th>EMAIL</th>
                    <th>CHANGE</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1;
                while ($row = mysqli_fetch_assoc($result)): ?>

                    <tr>
                        <td class="row-num"><?php echo $i++; ?></td>
                        <td class="business-name"><?php echo htmlspecialchars($row['BusinessName']); ?></td>
                        <td data-label="Address:"><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td data-label="Price Range:"><?php echo htmlspecialchars($row['Price']); ?></td>
                        <td data-label="Description:"><?php echo htmlspecialchars($row['BusinessDescription']); ?></td>
                        <td data-label="Location:"><?php echo htmlspecialchars($row['MAPLOCATION']); ?></td>
                        <td data-label="Images:"><?php
                        if (!empty($row['BusinessImage'])) {
                            $paths = explode(',', $row['BusinessImage']);
                            $count = count($paths);
                            echo $count . ' IMAGE' . ($count > 1 ? 'S' : '');
                        } else {
                            echo 'No images';
                        }
                        ?></td>
                        <td data-label="Facebook:"><?php echo htmlspecialchars($row['Contact']); ?></td>
                        <td data-label="Number:"><?php echo htmlspecialchars($row['Num']); ?></td>
                        <td data-label="Email:"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="actions">
                            <a class="edit-btn" href="edit_business.php?new_id=<?php echo $row['new_id']; ?>">Edit
                                Business</a>
                            <button class="remove-btn"
                                onClick="deleteBusiness(<?php echo $row['new_id']; ?>, '<?php echo addslashes($row['BusinessName']); ?>')">Remove
                                Business</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <a href="#" class="top">BACK TO TOP</a>

    <footer>
        <img src="logo.png" id="logo">
        <p>© 2025 Locally Viral</p>
    </footer>

    <script> // REMOVE BUSINESS CONFIRMATION
        function deleteBusiness(new_id, BusinessName) {
            if (confirm("Are you sure you want to remove \"" + BusinessName + "\" from the database?")) {
                window.location.href = 'remove_business.php?new_id=' + new_id + '';
                return true;
            }
        }
    </script>

    <script>
        function toggleMenu() {
            document.getElementById("admin-menu").classList.toggle("active");
        }
    </script>
</body>

</html>