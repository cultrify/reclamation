<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cultrify</title>
  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,400&display=swap"
    rel="stylesheet">
  <!-- google fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
  <style>
    /* Center the form on the page */
    form {
      margin: 0 auto;
      max-width: 500px;
  margin: 0 auto;
    }

    label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
  font-size: 16px;
  font-weight: bold;
}

input[type=submit] {
  background-color: #3f51b5;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 18px;
  font-weight: bold;
  border-radius: 5px;
  font-size: 16px;
  width: 100px; /* add this line to make the button shorter */
}


button[type="submit"]:hover {
  background-color: #3e8e41;
}


  </style>
</head>

<body>
  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg stroke">
 
      <a class="navbar-brand" href="#index.html">
          <img src="logoo.png" alt="Your logo" style="height: 70px;" />
      </a>
        <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
          data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
          <span class="navbar-toggler-icon fa icon-close fa-times"></span>
          </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Destinations</a>
            </li>
    
            <li class="nav-item active">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
        <div class="d-lg-block d-none">
          <a href="colorlib-wizard-10/colorlib-wizard-10/form.html" style="left: 30px;" class="btn btn-style btn-secondary">Sign in</a>
        </div>
        <div class="d-lg-block d-none">
          <a href="sign up/colorlib-wizard-10/form.html" style="left: 30px;" class="btn btn-style btn-secondary">Login</a>
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
        <!-- //toggle switch for light and dark theme -->
      </nav>
    </div>
  </header>
  <!-- //header -->
  <!-- about breadcrumb -->
  <section class="w3l-about-breadcrumb text-left">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-2">
        <h2 class="title">Contact Us</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Home</a></li>
          <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
  <form action="contact.php" method="POST">
  <!-- contact-form -->
  
  <form action="#" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
  
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>
  
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="5" cols="30"></textarea><br>
  
    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address"><br>
  
    <input type="submit" value="Submit">
  </form>
   
  <?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "projet";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check for errors when connecting to the database
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Process form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $nom = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $adresse = $_POST["address"];
  
    if (empty($nom)) {
      die("Name is required");
    }
  
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO reclamations (nom, email, message, adresse) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $message, $adresse);
  
    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
      echo "Record added successfully";
    } else {
      echo "Error adding record: " . $stmt->error;
    }
  
    // Close statement and connection
    $stmt->close();
    $conn->close();
  }
  ?>
  
  <script>
  // Get the form element
  var form = document.querySelector('form');
  
  // Add event listener for form submission
  form.addEventListener('submit', function(event) {
    // Prevent the form from submitting normally
    event.preventDefault();
  
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
  
    // Configure the XMLHttpRequest object
    xhr.open('POST', 'Reclamation.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    // Define the callback function for when the response is received
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          alert(xhr.responseText);
        } else {
          alert('Error: ' + xhr.status);
        }
      }
    };
  
    // Serialize the form data and send the request
    var formData = new FormData(form);
    xhr.send(formData);
  });
  </script>
  
  </body>
  </html>
<!-- /contact-form -->

  <!--/w3l-footer-29-main-->
  <footer>
    <!-- footer -->
    <section class="w3l-footer">
      <div class="w3l-footer-16-main py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 column">
              <div class="row">
                <div class="col-md-4 column">
                  <h3>Company</h3>
                  <ul class="footer-gd-16">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                  </ul>
                </div>
                <div class="col-md-4 column mt-md-0 mt-4">
                  <h3>Useful Links</h3>
                  <ul class="footer-gd-16">
                    <li><a href="#url">Destinations</a></li>
                    <li><a href="#url">Our Branches</a></li>
                    <li><a href="#url">Latest Media</a></li>
                    <li><a href="about.html">About Company</a></li>
                    <li><a href="#url">Our Packages</a></li>
                  </ul>
                </div>
                <div class="col-md-4 column mt-md-0 mt-4">
                  <h3>Our Services</h3>
                  <ul class="footer-gd-16">
                    <li><a href="#url">Privacy Policy</a></li>
                    <li><a href="#url">Our Terms</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="landing-single.html">Landing Page</a></li>
                    <li><a href="#url">Our Guides</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 column pl-lg-5 column4 mt-lg-0 mt-5">
              <h3>Newsletter </h3>
              <div class="end-column">
                <h4>Get latest updates and offers.</h4>
                <form action="#" class="subscribe" method="post">
                  <input type="email" name="email" placeholder="Email Address" required="">
                  <button type="submit">Go</button>
                </form>
                <p>Sign up for our latest news & articles. We won’t give you spam mails.</p>
              </div>
            </div>
          </div>
          <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
            <div class="columns-2 mt-lg-0 mt-3">
              <ul class="social">
                <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                </li>
                <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                </li>
                <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                </li>
                <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                </li>
                <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  
      <!-- move top -->
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
      </button>
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
          scrollFunction()
        };
  
        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }
  
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- //move top -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
    </section>
    <!-- //footer -->
  </footer>
  <!-- Template JavaScript -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/theme-change.js"></script>
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="assets/js/bootstrap.min.js"></script>
  <?php
  // Connect to database
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "projet";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Prepare SQL statement
  $stmt = $conn->prepare("INSERT INTO reclamation (idclient, IDC, Sujet, Description) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $idclient, $idc, $sujet, $description);
  
  // Set parameters and execute statement
  $idclient = $_POST['idclient'];
  $idc = $_POST['idc'];
  $sujet = $_POST['sujet'];
  $description = $_POST['description'];
  
  if ($stmt->execute()) {
    echo "Reclamation submitted successfully.";
  } else {
    echo "Error submitting reclamation: " . $conn->error;
  }
  
  // Close statement and connection
  $stmt->close();
  $conn->close();
  ?>
  

</body>

</html>