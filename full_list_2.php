<!DOCTYPE html>
<html lang="en">
<!--bug A1: the function filterTable() executes correctly the first time only, then i'll have to reset the table for it to work; -->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="full_list.css">
  <link rel="stylesheet" href="index.css">
  <title>Full list</title>
</head>

<body>
  <main>
    <div class="header_class" id="header_id">

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
    <div class="css-141buqv">
      <div class="theInputsAboveTable">
        <div class="css-qgiiv8">
          <input placeholder="Enter name" class="css-1ifm48" value="" id="search-input">
          <button class="css-7m2am6" id="search-button">
            <svg width="26" height="26" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.75 2.167c-4.175 0-7.583 3.408-7.583 7.583 0 4.175 3.408 7.583 7.583 7.583a7.538 7.538 0 0 0 4.955-1.862l.462.462v1.4l6.5 6.5 2.166-2.166-6.5-6.5h-1.4l-.462-.461a7.539 7.539 0 0 0 1.862-4.956c0-4.175-3.408-7.583-7.583-7.583Zm0 2.166a5.4 5.4 0 0 1 5.417 5.417 5.4 5.4 0 0 1-5.417 5.417A5.4 5.4 0 0 1 4.333 9.75 5.4 5.4 0 0 1 9.75 4.333Z" fill="#F3F2ED"></path>
            </svg>
          </button>
        </div>
        <div class="css-x31xq5">
          <div class="css-md9ile">
            <div class="css-4cffwv">
              <div class="dropdown">
                <button class="css-1d3uik7" onclick="toggleDropdown('dropdownContent1')">Faculty </button>
                <div class="dropdown-content1" id="dropdownContent1">
                  <button id="all-faculties"> All</button>
                  <button id="ENLS"> Exact sciences, natural sciences and life sciences</button>
                  <button id="EMC"> Economics, management and commerce</button>
                  <button id="ST"> Sciences and technology</button>
                  <button id="LPS"> Law and political sciences</button>
                  <button id="SSH"> Social sciences and humanities</button>
                  <button id="ISTPSA"> Institute of sciences and technics of physical and sport activities</button>
                  <button id="LL"> Literature and languages</button>
                </div>
              </div>
            </div>
          </div>
          <div class="css-md9ile">
            <div class="css-4cffwv">
              <div class="dropdown">
                <button class="css-1d3uik7" onclick="toggleDropdown('dropdownContent2')">Order</button>
                <div class="dropdown-content2" id="dropdownContent2">
                  <button id="sort-best">Best rated</button>
                  <button id="sort-worst">Worst rated</button>
                  <button id="sort-popular">Most popular</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="Xtable">
      <BUtton id="resetButton">reset</BUtton>
      <table id="tableID" class="tableClass">
        <tr>
          <th>Professor</th>
          <th>Faculty</th>
          <th class="td-rating">Rating</th>
        </tr>
        <?php
        include("C:/xampp/htdocs/rate the professor website/database.php");
        $sql = "SELECT professor_name,professor_faculty,professor_rating,rating_count FROM professors";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
          if($row['professor_rating']>=7){
            echo "<tr><td class='td_name'>" . $row['professor_name'] . "</td><td class='td_faculty'>" . $row['professor_faculty'] . "</td><td class='td-rating'><div class='rating'>
              <div class='ratingNumberGREEN'> ". $row['professor_rating'] . "&#9733" . "</div><div class='ratingCount'>". $row['rating_count'] ."ratings"."</div></div></td></tr>";
          }
          else if($row['professor_rating']>=4){
            echo "<tr><td class='td_name'>" . $row['professor_name'] . "</td><td class='td_faculty'>" . $row['professor_faculty'] . "</td><td class='td-rating'><div class='rating'>
              <div class='ratingNumberYELLOW'> ". $row['professor_rating'] . "&#9733" . "</div><div class='ratingCount'>". $row['rating_count'] ."ratings"."</div></div></td></tr>";
          }
          else{
            echo "<tr><td class='td_name'>" . $row['professor_name'] . "</td><td class='td_faculty'>" . $row['professor_faculty'] . "</td><td class='td-rating'><div class='rating'>
              <div class='ratingNumberRED'> ". $row['professor_rating'] . "&#9733" . "</div><div class='ratingCount'>". $row['rating_count'] ."ratings"."</div></div></td></tr>";
          }
        }
        mysqli_close($conn);
        ?>
      </table>
    </div>
    <script>
      window.onscroll = function() {
        myFunction()
      };
      var header = document.getElementById("header_id");
      var sticky = header.offsetTop;

      function myFunction() {
        if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      }
    </script>
    <script src="full_list.js"></script>
  </main>
</body>

</html>