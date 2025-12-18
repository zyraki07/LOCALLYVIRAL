<?php
session_start();
if (empty($_SESSION['is_admin'])) {
    header('Location: index.php');
    exit;
}

require 'db_connect.php';

if (isset($_POST['Submit'])) {
    $BusinessName = $_POST['name'];
    $Address = $_POST['address'];
    $Category = $_POST['category'];
    $Menu = $_POST['menu'];
    $Price = $_POST['price_range'];
    $BusinessDescription = $_POST['description'];
    $MAPLOCATION = $_POST['location'];
    $Contact = $_POST['contact'];
    $Num = $_POST['number'];
    $email = $_POST['email'];

    $Logo = '';
    $BusinessImage = '';

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

        $con = mysqli_connect('localhost', 'root', '', 'businesses');

        $sql = "INSERT INTO businesses (`BusinessName`, `Address`, `Category`, `Menu`, `Price`, `BusinessDescription`, `MAPLOCATION`, `BusinessImage`, `Contact`, `Num`, `email`, `Logo`) 
    VALUES ('$BusinessName', '$Address', '$Category', '$Menu', '$Price', '$BusinessDescription', '$MAPLOCATION', '$BusinessImage', '$Contact', '$Num', '$email', '$Logo')";

        $query_run = mysqli_query($con, $sql);

        if ($query_run) {
            $_SESSION['status'] = 'BUSINESS ADDED SUCCESSFULLY!';
            header('location: admin_page.php');
        } else {
            echo 'Something went wrong.';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Locally Viral | Add Business</title>
    <link rel="stylesheet" href="add_business.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <div class="admin-nav">
            <h1>ADD BUSINESS</h1>
            <li><a href="admin_page.php">Dashboard</a></li>
        </div>
    </header>

    <div class="edit">
        <form action="" method="POST" class="admin-form" enctype="multipart/form-data">
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

            <input type="hidden" name="existing_logo">

            <div class="input-box">
                <label>Business Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="input-box">
                <label>Address:</label>
                <input type="text" name="address" required>
            </div>

            <div class="input-box">
                <label>Price Range:</label>
                <input type="text" name="price_range" required>
            </div>

            <div class="input-box">
                <label>Description:</label>
                <textarea name="description" required rows="4" ?></textarea>
            </div>

            <div class="input-box">
                <label>Category:</label>
                <input type="text" name="category" required>
            </div>

            <div class="input-box">
                <label>Menu:</label>
                <input type="text" name="menu" required>
            </div>

            <div class="input-box">
                <label>Location:</label>
                <input type="text" name="location" required>
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
                    <input type="file" name="images[]" multiple accept="image/*" required>
                </div>

                <input type="hidden" name="existing_images">
            </div>

            <h3>Contact Information</h3>
            <div class="contact-box">
                <label>Facebook Page:</label>
                <input type="text" name="contact">
                <label>Phone Number:</label>
                <input type="text" name="number">
                <label>Email:</label>
                <input type="text" name="email">
            </div>

            <a href="admin_page.php"><input type="Submit" id="submit" value="Submit" name="Submit"></a>
        </form>
    </div>
    <footer>
        <img src="logo.png" id="logo">
        <p>© 2025 Locally Viral</p>
    </footer>
</body>

</html>