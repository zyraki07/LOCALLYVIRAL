<?php
session_start();
?>

<!DOCTYPE html>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="browse.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
      <title>Locally Viral | Browse Businesses</title>
</head>

<body>
      <header>
            <div class="navbar"> <!--navi bar with mini logo-->
                  <img src="logoo.png" class="logo">
                  <div class="hamburger" onclick="toggleMenu()">☰</div> <!--menu bar on mobile-->
                  <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#category">Category</a></li>
                        <li><a href="browse.php#footer">Contact</a></li>
                        <li><a href="browse.php">Browse</a></li>

                        <?php if (!empty($_SESSION['is_admin'])): ?>
                              <li class="divider"></li>
                              <li><a href="admin_page.php">Admin Panel</a></li>
                              <li><a href="logout.php">Logout</a></li>
                        <?php endif; ?>

                  </ul>
            </div>
      </header>

      <main>
            <input type="text" id="search" name="search" placeholder="Search businesses...">
            <div id="search-results"></div>
      </main>

      <footer class="footer" id="footer">
            <h1 id="local"><img src="logo.png" id="logo">Locally Viral</h1>

            <p>EMAIL: <a href="https://mail.google.com/mail/?view=cm&fs=1&to=locallyviral02@gmail.com" id="emaill"
                        target="_blank">locallyviral02@gmail.com</a></p>
            <p>CONTACT: <a href="tel:09276845740" class="admin-num">0927-684-5740</a></p>
      </footer>

      <script src="browse1.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script type="text/javascript">
            $(document).ready(function () {
                  loadBusinesses();

                  $("#search").keyup(function () {
                        var input = $(this).val();

                        if (input != "") {
                              $.ajax({
                                    url: "search.php",
                                    method: "POST",
                                    data: { input: input },
                                    success: function (data) {
                                          $("#search-results").html(data);
                                    }
                              });

                        } else {
                              loadBusinesses();
                        }
                  });

                  function loadBusinesses() {
                        $.ajax({
                              url: "search.php",
                              method: "POST",
                              data: { input: "" },
                              success: function (data) {
                                    $("#search-results").html(data);
                              }
                        });
                  }
            });
      </script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
</body>

</html>