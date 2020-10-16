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
        <center>
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
                    </select><br>

                    <input type="submit" name="button" value="Submit">
                </form>

                <p>
                    <?php
                        $selected = array();
                        $unselected = array();
                        $Results = array();
                        $Ghosts = array(                                array("Banshee", 0, 1, 2),
                            array("Demon", 2, 4, 5),
                            array("Jinn", 0, 3, 5),
                            array("Mare", 2, 3, 5),
                            array("Oni", 0, 4, 5),
                            array("Phantom", 0, 2, 3),
                            array("Poltergiest", 1, 3, 5),
                            array("Revenant", 0, 1, 4),
                            array("Shade", 0, 3, 4),
                            array("Spirit", 1, 4, 5),
                            array("Wraith", 1, 2, 5),
                            array("Yurei", 2, 3, 4)
                        );
                        $Options = array(
                            array("EMF Level 5", 0),
                            array("Finger Prints", 1),
                            array("Freezing Temperatures", 2),
                            array("Ghost Orbs", 3),
                            array("Ghost Writing", 4),
                            array("Spirit Box", 5)
                        );
                        $Searchedfor = array();


                        if(isset($_POST['evid1']) && isset($_POST['evid2']) && isset($_POST['evid3']) && isset($_POST['evid4']) && isset($_POST['evid5']) && isset($_POST['evid6'])) {
                        
                            $count = 0;
                            $e1 = $_POST['evid1'];
                            $e2 = $_POST['evid2'];
                            $e3 = $_POST['evid3'];
                            $e4 = $_POST['evid4'];
                            $e5 = $_POST['evid5'];
                            $e6 = $_POST['evid6'];

                            $selected = array($e1, $e2, $e3);
                            $unselected = array($e4, $e5, $e6);
                            foreach ($selected as $num)
                                if ($num == 'X')
                                    $count++;

                            if ($count == 3) {
                                foreach ($Ghosts as $Ghost)
                                    array_push($Results, $Ghost);

                                
                            } else if ($count == 2) {
                                foreach ($Ghosts as $Ghost)
                                    foreach ($selected as $var)
                                        if ($var != 'X')
                                            if (in_array($var, $Ghost))
                                                array_push($Results, $Ghost);

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
                            } else {
                                foreach ($Ghosts as $Ghost)
                                    if (in_array($e1, $Ghost) && in_array($e2, $Ghost) && in_array($e3, $Ghost))
                                        array_push($Results, $Ghost);

                            }

                            foreach ($Results as $type)
                                foreach ($unselected as $val)
                                    if ($val != "Y")
                                        if (in_array($val, $type)){
                                            $key = array_search($type, $Results);
                                            unset($Results[$key]);
                                        }

                            foreach ($Options as $Option)
                                foreach ($selected as $sel)
                                    if ($sel == $Option[1] && $sel != "X") {
                                        array_push($Searchedfor, $Option[0]);
                                    } else if ($sel == "X") {
                                        array_push($Searchedfor, "None");
                                    }

                            print_r("You searched for: " . $Searchedfor[0] . ", " . $Searchedfor[1] . " and " . $Searchedfor[2] . ".<br>");

                            if (empty($Results)) {
                                print_r("No Match.");
                            } else {
                                foreach ($Results as $type)
                                    print_r($type[0] . "<br>");
                            }

                        }
                    ?>
                </p>
            </div>
        </center>
    </body>
</html>
