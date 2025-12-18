<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="browse.css">
</head>

<!--BUSINESS LISTS-->
<div class="business-list">
    <?php
    include("db_connect.php");

    if (isset($_POST["input"]) && !empty($_POST["input"])) { // SEARCH BAR FETCH FROM DATABASE
        $input = $_POST["input"];
        $query = "SELECT * FROM businesses 
        WHERE BusinessName LIKE '%$input%'
        OR Address Like '%$input%'
        OR Category LIKE '%$input%'
        OR Menu LIKE '%$input%'
        OR Price LIKE '%$input%'";
    } else {
        $query = "SELECT * FROM businesses";
    }

    $result = mysqli_query($conn, $query);
    $count = 0;

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $count++;
            echo "<div class='business-box'>"; // BUSINESS CONTAINER BOX
            echo "<div class='business1'>";
            echo "<div id='logob'>";
            if (!empty($row['Logo'])) {
                echo "<img src='" . $row['Logo'] . "' class='business-logo'>";
            }
            echo "</div>";
            echo "<div class='businessContent'>";
            echo "<div class='businessContent1'>";
            echo "<h2>" . htmlspecialchars($row['BusinessName']) . "</h2>";
            echo "</div>";
            echo "<div class='businessContent2'>";
            echo "<p><strong>ADDRESS:</strong> " . htmlspecialchars($row['Address']) . "</p>";
            echo "<p><strong>MENU:</strong> " . htmlspecialchars($row['Menu']) . "</p>";
            echo "<p><strong>PRICE RANGE:</strong> " . htmlspecialchars($row['Price']) . "</p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

            echo "<div class='business-description' id='description-$count'>";
            echo "<p><strong>BUSINESS DESCRIPTION:</strong> " . htmlspecialchars($row['BusinessDescription']) . "</p>";
            echo "<br>";
            echo "<div class='contact-info'>";
            echo "<p><strong>CONTACT INFORMATION:</strong>" . "</p>";
            if (!empty($row['Contact'])) {
                echo "<ion-icon name='logo-facebook'></ion-icon>";
                echo "<a href='" . htmlspecialchars($row['Contact']) . "' target='_blank' class='contact'>"
                    . htmlspecialchars($row['BusinessName']) .
                    "</a>";
                echo "<br>";
            }
            if (!empty($row['Num'])) {
                echo "<ion-icon name='call' id='call'></ion-icon>";
                echo "<a href='tel:" . urlencode($row['Num']) . "' class='business-num'>" . htmlspecialchars($row['Num']) . "</a>";
            }
            echo "<br>";
            if (!empty($row['email'])) {
                echo "<ion-icon name='mail'></ion-icon>";
                echo "<a href='https://mail.google.com/mail/?view=cm&fs=1&to=" . urlencode($row['email']) . "' target='_blank' class='contact'>"
                    . htmlspecialchars($row['email']) .
                    "</a>";
            } else {
                echo "<span>-</span>";
            }
            echo "<br>";
            echo "</div>";
            echo "<div class='logo2'>";
            echo "<img src='logo.png' id='logo2'>";
            echo "<a href='" . htmlspecialchars($row['MAPLOCATION']) . "' id='gmap' target='_blank' class='map'>View on Google Maps</a>";
            echo "</div>";
            echo "<div class='gallery-row'>";

            if (!empty($row['BusinessImage'])) {
                $images = explode(',', $row['BusinessImage']);
                $baseURL = "http://localhost/official-locally-viral-/business_img/";
                $basePath = $_SERVER['DOCUMENT_ROOT'] . "/official-locally-viral-/business_img/";

                foreach ($images as $image) {
                    $src = trim($image);
                    if ($src === '')
                        continue;

                    // Normalize slashes
                    $src = str_replace('\\', '/', $src);

                    // Physical file path (NO encoding here)
                    $filePath = $basePath . $src;

                    // URL encoding for browser
                    $encoded = rawurlencode($src);
                    $encoded = str_replace('%2F', '/', $encoded);

                    $url = $baseURL . $encoded;

                    if (file_exists($filePath)) {
                        echo "<img src=\"$url\" class=\"business-pop\" onclick=\"openImage(this.src)\">";
                    } else {
                        echo "<p style=\"color:red;font-size:12px\">Missing image: $src</p>";
                    }


                }
                echo "</div>";

            }
            echo "</div>";
            echo "<button type='button' class='view' onclick='toggleDescription($count, this)'>VIEW</button>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p id='no-business'>No businesses found.</p>";
    }
    ?>
</div>

<script src="browse1.js"></script>

</html>