<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <!-- <script src="index.js"></script> -->
  <title>rate the professor</title>
</head>

<body>
  <main>
    <div class="header_class" id="myHeader">

      <div class="site_name">
        <h2>rate the professor</h2>
      </div>

      <div class="navbar_items">
        <div class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </div>
        <div class="nav-item">
          <a class="nav-link" href="#home">Account</a>
        </div>
      </div>
    </div>
    <div class="contentANDcards">
      <div class="content">
        <div class="homePageParagraph">
          <p> Welcome to our website where students can rate their <br>professors, we believe that student feedback
            plays a
            <br>crucial role in giving other students valuable insights.<br><br> We encourage students to be objective
            and thoughtful <br>with their
            rating.
          </p>
        </div>
        <div class="full-list-link">
          <a href="http://localhost/rate%20the%20prof/full_list_2.php" class="Button__StyledButton-sc-1nimqw7-0 dWGYca">full&nbsp;list<!-- --> <span class="icon-wrapper"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.929 2.625l11.446 11.344m0 0L13.866 25.375m11.509-11.406l-22.75-.265" stroke="#F3F2ED" stroke-width="1.75"></path>
              </svg></span></a>
        </div>
      </div>

      <div class="cards">
        <h1 class="top3h1">Top 3 rated professors :</h1>
        <div class="ratings">

          <?php
          include("C:/xampp/htdocs/rate the professor website/database.php");
          $sql = "SELECT professor_name,professor_faculty,professor_rating,rating_count FROM professors ORDER BY professor_rating DESC, rating_count DESC LIMIT 3;";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
            echo "<div class='topcard'>
        <div class='teacher_info'>
          <div class='professorName'>" . $row['professor_name'] . "</div>
          <div class='professorFaculty'>" . $row['professor_faculty'] . "</div>
        </div>
        <div class='ratingtop3'>
          <div class='ratingNumberGREEN'>" . $row['professor_rating'] . "&#9733" . "</div>
          <div class='ratingCount'>" . $row['rating_count'] . "ratings" . "</div>
        </div>
      </div>";
          }
          mysqli_close($conn);
          ?>

          <!-- <div class='topcard'>
            <div class='teacher_info'>
              <div class='professorName'>" . $row['professor_name'] . "</div>
              <div class='professorFaculty'>" . $row['professor_faculty'] . "</div>
            </div>
            <div class='ratingtop3'>
              <div class='ratingNumberGREEN'>". $row['professor_rating'] . "&#9733" . "</div>
              <div class='ratingCount'>". $row['rating_count'] ."ratings"."</div>
            </div>
          </div>

          <div class="topcard">
            <div class="teacher_info">
              <div class="professorName">first name last name</div>
              <div class="professorFaculty">professors'faculty</div>
            </div>
            <div class="ratingtop3">
              <div class="ratingNumberGREEN">7.8 &#9733</div>
              <div class="ratingCount">210 ratings</div>
            </div>
          </div>

          <div class="topcard">
            <div class="teacher_info">
              <div class="professorName">first name last name</div>
              <div class="professorFaculty">professors'faculty</div>
            </div>
            <div class="ratingtop3">
              <div class="ratingNumberGREEN">7.7 &#9733</div>
              <div class="ratingCount">157 ratings</div>
            </div>
          </div>
        </div> -->
        </div>
      </div>
      <script src="index.js"></script>
  </main>
</body>

</html>