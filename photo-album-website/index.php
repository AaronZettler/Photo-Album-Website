<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="styles.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!--For Year Picker-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        include 'db_handler.php';
        include 'uploader.php';

        session_start();
        $date_str = "2020";
        $subject_string = "";

        //Set YEAR String
        if (isset($_POST['selecteddate'])) {
            $date_str = $_POST['selecteddate'];
            $_SESSION["selecteddate"] = $_POST['selecteddate'];
        } else if (isset($_SESSION["selecteddate"])) {
            $date_str = $_SESSION["selecteddate"];
        }
        //Set SUBJECT String
        if (isset($_POST['selectedsubject'])) {
            $subject_string = $_POST['selectedsubject'];
            $_SESSION["selectedsubject"] = $_POST['selectedsubject'];
        } else if (isset($_SESSION["selectedsubject"])) {
            $subject_string = $_SESSION["selectedsubject"];
        }

        if (isset($_POST['add_year'])) {
            $new_year = $_POST['new_year'];
            unset($_POST['new_year']);

            if (exists_Year($new_year, $mysqli) || $new_year == '') {
                //Handle ERROR
            } else {
                add_Year($new_year, $mysqli);
            }
        }
        if (isset($_POST['add_subject'])) {
            $new_subject = $_POST['new_subject'];
            unset($_POST['new_subject']);

            $year_ref = get_YearID($date_str, $mysqli);

            if (exists_Subject($year_ref, $new_subject, $mysqli) || $new_subject == '') {
                //Handle ERROR
            } else {
                add_Subject($year_ref, $new_subject, $mysqli);
            }
        }
        if (isset($_FILES['file']['name']) && $subject_string != '') {
            $countfiles = count($_FILES['file']['name']);
            $year_ref = get_YearID($date_str, $mysqli);
            $collection_ref = get_SubjectID($subject_string, $mysqli);


            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['file']['name'][$i];
                upload_file('upload', $filename, $i);
                add_picture($collection_ref, $year_ref, $filename, 'upload/' . $filename, $mysqli);
            }
            unset($_FILES['file']['name']);
        }
        ?>
        
        <form action="index.php" method="post">
            
            <!--Subject Menu-->
            <div class="scrollmenu sticky" id="scrollmenu">
                <a href="#open" onclick="openNav()">
                    <?php
                    echo $date_str
                    ?>
                </a>
                <?php
                $year_ref = get_YearID($date_str, $mysqli);
                $result_subjects = get_Subjects($year_ref, $mysqli);
                while ($data_subjects = $result_subjects->fetch_assoc()) {
                    $subject = $data_subjects['title'];
                    echo "<a href=\"#\"><input class=\"subject\" name=\"selectedsubject\" type=\"submit\" value=\"$subject\"></a>";
                }
                ?>
                <a href="#" style="font-size: 24px;" id="newSubjectModalOpen">+</a>
            </div>
            
            <!--Year Menu-->
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php
                $result_years = get_Years($mysqli);
                while ($data_years = $result_years->fetch_assoc()) {
                    $date = explode('-', $data_years['date']);
                    $year = $date[0];
                    echo "<a onmousedown=\"showDelete(event, $year)\" href=\"#\"><input class=\"date\" name=\"selecteddate\" type=\"submit\" value=\"$year\"></a>";
                }
                ?>
                <a onmousedown="showDelete(event)" href="#" class="date" style="font-size: 24px;" id="newYearModalOpen">+</a>
            </div>
            
        </form>>

        
        <form method='post' action='' enctype='multipart/form-data'>
            
            <!--Add a new Image-->
            <div class="scrollmenu sticky2" id="addimg">
                <input type="file" name="file[]" id="file" multiple class="inputfile" onchange="this.form.submit();">
                <label style="color:#F0F8FF; margin-left:10px" for="file"><span></span> <i class="fa fa-upload w3-button w3-block w3-blue-grey"><strong> Choose a file&hellip;</strong></i></label>
            </div>
        </form>

        <!--Display Images-->
        <div class="row" id="main"> 
            <?php
            $year_ref = get_YearID($date_str, $mysqli);
            $collection_ref = get_SubjectID($subject_string, $mysqli);
            $result_picture_path = get_Picture_Pats($collection_ref, $year_ref, $mysqli);
            $picture_count = $result_picture_path->num_rows;
            $pictures_per_segment = floor($picture_count / 4);
            $left_overs = $picture_count - $pictures_per_segment * 4;
            $pic_count = 0;
            for ($x = 0; $x < 4; $x++) {
                echo "<div class=\"column\">";
                for ($y = 0; $y < $pictures_per_segment + (($left_overs - $x) > 0); $y++) {
                    $result_picture_path->data_seek($pic_count);
                    echo "<img src='{$result_picture_path->fetch_row()[0]}' style=\"width:100%\">";
                    $pic_count++;
                }
                echo "</div>";
            }
            ?>
        </div>
        
        <!--Add new Year "Menu"-->
        <form action="index.php" method="post">
            <!-- The Modal -->
            <div id="newYearModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close" id="newYearModalClose">&times;</span>

                    <div class="w3-container w3-blue-grey">
                        <h1>Add a new Date</h1>
                    </div>
                    <div class="w3-container">  
                        <p>
                        <form>
                            Year:
                            <input name="new_year" type="text" id="datepicker" onkeydown="return false" autocomplete="off">
                            <input class="w3-button w3-black" name="add_year" type="submit" value="Add">
                        </form>
                        </p>
                    </div>

                </div>
            </div>
        </form>

        <!--Add new Subject "Menu"-->
        <form action="index.php" method="post">
            <!-- The Modal -->
            <div id="newSubjectModal" class="modal">
                <div class="modal-content">
                    <span class="close" id="newSubjectModalClose">&times;</span>

                    <div class="w3-container w3-blue-grey">
                        <h1>Add a new Subject</h1>
                    </div>
                    <div class="w3-container">  
                        <p>
                        <form>
                            Subject:
                            <input name="new_subject" type="text">
                            <input class="w3-button w3-black" name="add_subject" type="submit" value="Add">
                        </form>
                        </p>
                    </div>

                </div>
            </div>
        </form>

        <!--Scripts for opening/closing the scrollbar-->
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "150px";
                document.getElementById("main").style.marginLeft = "150px";
                document.getElementById("scrollmenu").style.marginLeft = "150px";
                document.getElementById("addimg").style.marginLeft = "150px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.getElementById("scrollmenu").style.marginLeft = "0";
                document.getElementById("addimg").style.marginLeft = "0";
            }

        </script>

        <!--Activating Year "Menu"-->
        <script>
            //----Popup_1--------------
            // Get the modal
            var modal = document.getElementById("newYearModal");

            // Get the button that opens the modal
            var btn = document.getElementById("newYearModalOpen");

            // Get the <span> element that closes the modal
            var span = document.getElementById("newYearModalClose");

            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        <!--For YearPicker-->
        <script type="text/javascript">
            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years"
            });
        </script>

        <!--Activating Subject "Menu"-->
        <script>
            //----Popup_2--------------
            // Get the modal
            var modal2 = document.getElementById("newSubjectModal");

            // Get the button that opens the modal
            var btn2 = document.getElementById("newSubjectModalOpen");

            // Get the <span> element that closes the modal
            var span2 = document.getElementById("newSubjectModalClose");

            // When the user clicks the button, open the modal 
            btn2.onclick = function () {
                modal2.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span2.onclick = function () {
                modal2.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal2) {
                    modal2.style.display = "none";
                }
            }
        </script>

        <!--For deleting Items (not jet implemented)-->
        <script>
            function showDelete(event, year) {
                //alert("You pressed button: " + event.button)
                if (event.button == 2)
                {
                    //if (confirm('Do you want to delete this Item: ' + year))
                    //{

                    //}

                }
            }
        </script>

    </body>
</html>
