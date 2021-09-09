<!DOCTYPE html>
<html>
    <head>
        <style>
            p {
                background-color: rgb(128, 128, 128);
                width: 90%;
            }
        </style>
       <link rel="stylesheet" href="asset/style.css">
    </head>
    <body>
        <center> <!-- center is Depreciated -->
            <h1>Phasmophobia Ghost Determining Tool<h2>
            <h2>By Declan Sheehan<h2>

            <div class="webappframe">

                <img class="topbarimage" src="asset/topbar.jpg">

                <form action="" method="post">
                    <label>Evidence # 1:</label>
                    <select id="e1" name="evid1">
                        <option value="X">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br>

                    <label>Evidence # 2:</label>
                    <select id="e2" name="evid2">
                        <option value="X">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br>
                
                    <label>Evidence # 3:</label>
                    <select id="e3" name="evid3">
                        <option value="X">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br><br>

                    <label>Evidence NOT Found # 1:</label>
                    <select id="e4" name="evid4">
                        <option value="Y">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br>

                    <label>Evidence NOT Found # 2:</label>
                    <select id="e5" name="evid5">
                        <option value="Y">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br>

                    <label>Evidence NOT Found # 3:</label>
                    <select id="e6" name="evid6">
                        <option value="Y">None</option>
                        <option value="0">EMF Level 5</option>
                        <option value="1">Finger Prints</option>
                        <option value="2">Freezing Temperatures</option>
                        <option value="3">Ghost Orbs</option>
                        <option value="4">Ghost Writing</option>
                        <option value="5">Spirit Box</option>
                        <option value="6">DOTS Projector</option>
                    </select><br>

                    <input type="submit" name="button" value="Submit">
                </form>

                <p>
                    <?php
                        // Initialize / Create variables
                        $selected = array();
                        $unselected = array();
                        $Results = array();
                        $Ghosts = array(
                            array("Banshee", 1, 3, 6),
                            array("Demon", 1, 2, 4),
                            array("Goryo", 0, 1, 6), // Added 8/26/21, Introduced 6/20/21
                            array("Hantu", 1, 2, 3), // Added 8/20/21, Introduced 6/20/21
                            array("Jinn", 0, 1, 2),
                            array("Mare", 3, 4, 5),
                            array("Myling", 0, 1, 4), // Added 8/26/21, Introduced 6/20/21
                            array("Oni", 0, 2, 6),
                            array("Phantom", 1, 5, 6),
                            array("Poltergiest", 1, 4, 5),
                            array("Revenant", 2, 3, 4),
                            array("Shade", 0, 2, 4),
                            array("Spirit", 0, 4, 5),
                            array("Wraith", 0, 5, 6),
                            array("Yokai", 3, 5, 6), // Added 8/20/21, Introduced 6/20/21
                            array("Yurei", 2, 3, 6)
                        );
                        $Options = array(
                            array("EMF Level 5", 0),
                            array("Finger Prints", 1),
                            array("Freezing Temperatures", 2),
                            array("Ghost Orbs", 3),
                            array("Ghost Writing", 4),
                            array("Spirit Box", 5),
                            array("DOTS Projector", 6)
                        );
                        $Searchedfor = array();
                        $Include_non_opt = false;
                        $count = 0;

                        // If each option value is set, run the following:
                        if(isset($_POST['evid1']) && isset($_POST['evid2']) && isset($_POST['evid3']) && isset($_POST['evid4']) && isset($_POST['evid5']) && isset($_POST['evid6'])) {
                        
                            
                            $e1 = $_POST['evid1'];
                            $e2 = $_POST['evid2'];
                            $e3 = $_POST['evid3'];
                            $e4 = $_POST['evid4'];
                            $e5 = $_POST['evid5'];
                            $e6 = $_POST['evid6'];

                            // Put results into arrays.
                            $selected = array($e1, $e2, $e3);
                            $unselected = array($e4, $e5, $e6);

                            // Count how many options are evidence-options are "None"
                            foreach ($selected as $num)
                                if ($num == 'X')
                                    $count++;

                            // If all are set to None, add all ghost options to results.
                            if ($count == 3) {
                                foreach ($Ghosts as $Ghost)
                                    array_push($Results, $Ghost);

                            // If two are set to None, add the type of ghost that satisfy the non-None option to results.
                            } else if ($count == 2) {
                                foreach ($Ghosts as $Ghost)
                                    foreach ($selected as $var)
                                        if ($var != 'X')
                                            if (in_array($var, $Ghost))
                                                array_push($Results, $Ghost);

                            // If only one is set to None, add the ghost option that satisfies two non-None options to results.
                            } else if ($count == 1) {
                                foreach ($Ghosts as $Ghost) {
                                    if ($e1 == "X") {
                                        if (in_array($e2, $Ghost) && in_array($e3, $Ghost))
                                            array_push($Results, $Ghost);
                                    } else if ($e2 == "X") {
                                        if (in_array($e1, $Ghost) && in_array($e3, $Ghost))
                                            array_push($Results, $Ghost);
                                    } else {
                                        if (in_array($e1, $Ghost) && in_array($e2, $Ghost))
                                            array_push($Results, $Ghost);
                                    }
                                }
                            // If none of the options are None, add the ghost that contains all evidences to results.
                            } else {
                                foreach ($Ghosts as $Ghost)
                                    if (in_array($e1, $Ghost) && in_array($e2, $Ghost) && in_array($e3, $Ghost))
                                        array_push($Results, $Ghost);

                            }

                            // Given "Evidence not found", remove ghost types that have certain evidences in the not-found category.
                            foreach ($Results as $type)
                                foreach ($unselected as $val)
                                    if ($val != "Y") {
                                        $Include_non_opt = true;
                                        if (in_array($val, $type)){
                                            $key = array_search($type, $Results);
                                            unset($Results[$key]);
                                        }
                                    }

                            // Grab the list of evidences inputted for print-out.
                            foreach ($Options as $Option)
                                foreach ($selected as $sel)
                                    if ($sel == $Option[1] && $sel != "X") {
                                        array_push($Searchedfor, $Option[0]);
                                    } else if ($sel == $Option[1] && $sel == "X") {
                                        array_push($Searchedfor, "None");
                                    }

                            // Print out what the user searched for:
                            print_r("You searched for: " . $Searchedfor[0] . ", " . $Searchedfor[1] . " and " . $Searchedfor[2] . ".<br>");

                            // If the user excluded evidences, print that too.
                            if ($Include_non_opt == true) {
                                foreach ($Options as $Option){
                                    foreach ($unselected as $unsel) {
                                        if ($unsel == $Option[1] && $unsel != "Y"){
                                            array_push($Searchedfor, $Option[0]);
                                        } else if ($unsel == $Option[1] && $unsel == "Y") {
                                            array_push($Searchedfor, "None");
                                        }
                                    }
                                }

                            print_r("You Excluded: " . $Searchedfor[3] . ", " . $Searchedfor[4] . " and " . $Searchedfor[5] . ".<br>");

                            }

                            // If results are empty, show "No match", else: print results.
                            if (empty($Results)) {
                                print_r("No Match.");
                            } else {
                                print_r("<table>
                                            <thead>
                                                <tr>
                                                    <th>Ghost</th>
                                                    <th>Evidence 1</th>
                                                    <th>Evidence 2</th>
                                                    <th>Evidence 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>");
                                foreach ($Results as $type)
                                    print_r("<tr><th>" . $type[0] . "</th><td>" . 
                                            $Options[$type[1]][0] . "</td><td>" . 
                                            $Options[$type[2]][0] . "</td><td>" . 
                                            $Options[$type[3]][0] . "</td></tr>");
                                print_r("</tbody></table>");
                            }

                        }
                    ?>
                </p>
            </div>
        </center>
    </body>
</html>
