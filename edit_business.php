<?php
session_start();
if (empty($_SESSION['is_admin'])) {
    header('Location: index.php');
    exit;
}

require 'db_connect.php';

$new_id = $_GET['new_id'] ?? null;
if (!$new_id) {
    header('Location: admin_page.php');
    exit;
}

// form submit (update to database)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $BusinessName = $_POST['name'] ?? '';
    $Address = $_POST['address'] ?? '';
    $Category = $_POST['category'] ?? '';
    $Menu = $_POST['menu'] ?? '';
    $Price = $_POST['price_range'] ?? '';
    $BusinessDescription = $_POST['description'] ?? '';
    $MAPLOCATION = $_POST['location'] ?? '';
    $Contact = $_POST['contact'] ?? '';
    $Num = $_POST['number'] ?? '';
    $email = $_POST['email'] ?? '';

    $existingLogo = $_POST['existing_logo'] ?? '';
    $existingImages = $_POST['existing_images'] ?? '';
    $Logo = $existingLogo;

    if (!empty($_FILES['logo']['name'])) {
        $uploadDir = 'img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = time() . '_' . basename($_FILES['logo']['name']);
        $targetPath = $uploadDir . $fileName;

        $allowedTypes = ['image.jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (
            $_FILES['logo']['error'] === UPLOAD_ERR_OK &&
            in_array($_FILES['logo']['type'], $allowedTypes)
        ) {
            if (move_uploaded_file($_FILES['logo']['tmp_name'], $targetPath)) {
                $Logo = $targetPath;
            }
        }
    }

    $businessFolder = 'business_img/' . 'business_' . time() . '/';
    $relativePath = basename($businessFolder) . '/' . $fileName;

    if (!is_dir($businessFolder)) {
        mkdir($businessFolder, 0777, true);
    }

    // --- BUSINESS IMAGES

    $BusinessImage = $existingImages; // keep old 
    $paths = [];


    if (!empty($_FILES['images']['name'][0])) {
        $uploadDir = 'business_img/';    // folder for logo images
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/webp'];

        foreach ($_FILES['images']['name'] as $index => $name) {
            if ($_FILES['images']['error'][$index] !== UPLOAD_ERR_OK)
                continue;
            if (!in_array($_FILES['images']['type'][$index], $allowedTypes))
                continue;

            $fileName = time() . '_' . $index . '_' . basename($name);
            $targetPath = $businessFolder . $fileName;

            if (move_uploaded_file($_FILES['images']['tmp_name'][$index], $targetPath)) {
                $paths[] = basename($businessFolder) . '/' . $fileName;
            }
        }
        if (!empty($paths)) {
            $BusinessImage = implode(',', $paths);

        }
    }

    // ✅ Replace behavior (no duplicates)
    if (!empty($paths)) {
        $BusinessImage = implode(',', $paths);   // NEW images only
    } else {
        $BusinessImage = $existingImages;        // keep old if no new upload
    }


    $stmt = mysqli_prepare(
        $conn,
        "UPDATE businesses 
         SET Logo=?, BusinessName=?, Address=?, Category=?, Menu=?, Price=?, BusinessDescription=?, MAPLOCATION=?, BusinessImage=?, Contact=?, Num=?, email=?
         WHERE new_id=?"
    );
    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssssssi",
        $Logo,
        $BusinessName,
        $Address,
        $Category,
        $Menu,
        $Price,
        $BusinessDescription,
        $MAPLOCATION,
        $BusinessImage,
        $Contact,
        $Num,
        $email,
        $new_id
    );
    mysqli_stmt_execute($stmt);
    if (mysqli_stmt_errno($stmt) === 0) {
        $_SESSION['status_3'] = 'BUSINESS CHANGES SAVED!';
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
    mysqli_stmt_close($stmt);

    header('Location: admin_page.php');
    exit;
}

// Load current data to show in form
$stmt = mysqli_prepare($conn, "SELECT * FROM businesses WHERE new_id = ?");
mysqli_stmt_bind_param($stmt, "i", $new_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$business = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$business) {
    echo "Business not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Locally Viral | Edit Business</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
</head>

<body>
    <header>
        <div class="admin-nav">
            <h1>EDIT BUSINESS</h1>
            <li><a href="admin_page.php">Dashboard</a></li>
        </div>
    </header>

    <div class="edit">
        <form action="#" method="POST" class="admin-form" enctype="multipart/form-data">
            <h2>BUSINESS DETAIL</h2>

            <!--CURRENT LOGO UPLOADED-->
            <div class="input-box" id="logoim">
                <?php if (!empty($business['Logo'])): ?>
                    <img src="<?php echo htmlspecialchars($business['Logo']); ?>" alt="Business Logo"
                        style="max-width:150px; max-height:150px; display:flex; margin-bottom:8px;">
                <?php else: ?>
                    <span><i>No Logo Uploaded</i></span>
                <?php endif; ?>
            </div>

            <div class="input-box">
                <label>Change Logo:</label>
                <input type="file" name="logo" accept="image/*">
            </div>

            <input type="hidden" name="existing_logo" value="<?php echo htmlspecialchars($business['Logo']); ?>">

            <div class="input-box">
                <label>Business Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($business['BusinessName']); ?>"
                    required>
            </div>

            <div class="input-box">
                <label>Address:</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($business['Address']); ?>"
                    required>
            </div>

            <div class="input-box">
                <label>Price Range:</label>
                <input type="text" name="price_range" value="<?php echo htmlspecialchars($business['Price']); ?>">
            </div>

            <div class="input-box">
                <label>Description:</label>
                <textarea name="description"
                    rows="4"><?php echo htmlspecialchars($business['BusinessDescription']); ?></textarea>
            </div>

            <div class="input-box">
                <label>Category:</label>
                <input type="text" name="category" value="<?php echo htmlspecialchars($business['Category']); ?>">
            </div>

            <div class="input-box">
                <label>Menu:</label>
                <input type="text" name="menu" value="<?php echo htmlspecialchars($business['Menu']); ?>" required>
            </div>

            <div class="input-box">
                <label>Location:</label>
                <input type="text" name="location" value="<?php echo htmlspecialchars($business['MAPLOCATION']); ?>">
            </div>

            <div class="images">
                <div class="image-box">
                    <label>Current Business Images:</label><br>
                    <?php
                    if (!empty($business['BusinessImage'])) {
                        $paths = explode(',', $business['BusinessImage']);
                        foreach ($paths as $path) {
                            $path = trim($path);
                            if ($path === '')
                                continue;
                            echo '<img src="' . htmlspecialchars($path) . '"class="img">';
                        }
                    } else {
                        echo '<span>No Images Uploaded</span>';
                    }
                    ?>
                </div>

                <div class="new-image-box">
                    <label>Upload New Business Images:</label><br>
                    <input type="file" name="images[]" accept="image/*" multiple>
                </div>

                <input type="hidden" name="existing_images"
                    value="<?php echo htmlspecialchars($business['BusinessImage']); ?>">
            </div>

            <h3>Contact Information</h3>
            <div class="contact-box">
                <label>Facebook Page:</label>
                <input type="text" name="contact" value="<?php echo htmlspecialchars($business['Contact']); ?>">
                <label>Phone Number:</label>
                <input type="text" name="number" value="<?php echo htmlspecialchars($business['Num']); ?>">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($business['email']); ?>">
            </div>

            <a href="admin_page.php"><button type="submit" class="btn">Save Changes</button></a>
        </form>
    </div>

    <footer>
        <img src="logo.png" id="logo">
        <p>© 2025 Locally Viral</p>
    </footer>
</body>

</html>