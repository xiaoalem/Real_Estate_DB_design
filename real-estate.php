<html>
    <head>
        <title>CPSC 304 Project</title>
    </head>

    <body>
        <h1>Real Estate DB</h1>
        <hr>
            <form method="POST" action="real-estate.php">
                <input type="submit" name="property" value="View Property">
                <input type="submit" name="realtor" value="View Realtor">
                <input type="submit" name="lawyer" value="View Lawyer">
                <input type="submit" name="sell" value="Ownership Information">
                <input type="submit" name="buy" value="Buy a Property">
                <input type="submit" name="tax" value="Update Property Tax">
                <input type="submit" name="assessment" value="Update Property Assessment Value">
            </form>
        </hr>
        <form id="propertyField" style="display: none" method="POST" action="real-estate.php">
            <h2>By building year</h2>
            <hr>Which city you are looking for?</hr>
            <select name="pcity">
                <?php
                createCityOptions();
                ?>
            </select>
            <hr>Earliest built year?</hr>
            <input name="yearStart" type="number" min="1900" max="2021" value="2000">
            <hr>Latest built year?</hr>
            <input name="yearEnd" type="number" min="1900" max="2021" value="2021">
            <input type="submit" value="Submit" name="submitProperty">
            <h2>By building type</h2>
            <hr>Find the buildings with above median price</hr>
            <hr>Which city you are looking for?</hr>
            <select name="ptcity">
                <?php
                createCityOptions();
                ?>
            </select>
            <hr>
            Which building type are you interested?</hr>
            <select name="type">
                <option value="Condo">Condo</option>
                <option value="Townhouse">Townhouse</option>
                <option value="SF_HOUSE">Single-family house</option>
            </select>
            <input type="submit" value="Submit" name="submitPropertyType">
        </form>
        <form id="realtorField" style="display: none" method="POST" action="real-estate.php">
            <hr>Find the best realtor in your city:</hr>
            <select name="city">
                <?php
                    createCityOptions();
                ?>
            </select>
            <hr>Choose the least total transaction value the realtors accomplished:</hr>
            <input name="realtorVal" type="number" min="0" value="0">
            <input type="submit" value="Submit" name="submitRealtor">
            <hr>Find the realtor who is not a owner</hr>
            <input type="submit" value="Submit" name="realtorNotOwn">
        </form>
        <form id="taxField" style="display: none" method="POST" action="real-estate.php">
            <hr>Choose a Property</hr>
            <select name="taxProperty">
                <?php
                    createPropertyOptions();
                ?>
            </select>
            <hr>Enter Year:</hr>
            <input name="taxYear" type="number" min="1900" value="2021">
            <hr>Enter Amount:</hr>
            <input name="taxAmount" type="number" value="1000">
            <input type="submit" value="Submit" name="submitTax">
        </form>
        <form id="sellField" style="display: none" method="POST" action="real-estate.php">
            <h2>Ownership information:</h2>
            <hr>Your Owner ID(oid):</hr>
            <select name="checkOwnerOwns">
                  <?php
                       createOwnerIDOptions();
                  ?>
            </select>
            <input type="submit" value="Submit" name="submitOwnerID">
        </form>
        <form id="buyField" style="display: none" method="POST" action="real-estate.php">
            <hr>Do you have an account with us?</hr>
            <input type="submit" value="I'm a new buyer" name="iAmNewBuyer">
            <input type="submit" value="Remove me from the system" name="removeBuyer">
        </form>
        <form id="assessmentField" style="display: none" method="POST" action="real-estate.php">
            <hr>Choose a Property</hr>
            <select name="assessmentProperty">
                <?php
                    createPropertyOptions();
                ?>
            </select>
            <hr>Enter Year:</hr>
            <input name="assessmentYear" type="number" min="1900" value="2021">
            <hr>Enter Amount:</hr>
            <input name="assessmentAmount" type="number" value="1000">
            <input type="submit" value="Submit" name="submitAssessment">
        </form>
        <form id="newBuyerField" style="display: none" method="POST" action="real-estate.php">
            <hr>What's your name?</hr>
            <input name="buyerName" type="text">
            <hr>Your phone number?</hr>
            <input name="buyerPhoneNum" type="text">
            <hr>Your email?</hr>
            <input name="buyerEmail" type="text">
            <hr>Please choose a realtor by RID:</hr>
            <select name="realtorForBuyer">
                <?php
                createRealtorOptions();
                ?>
            </select>
            <input type="submit" value="Add new buyer" name="submitBuyer">
            <hr>
            <?php
            createRealtorFullList();
            ?>
        </form>
        <form id="deleteBuyerField" style="display: none" method="POST" action="real-estate.php">
            <hr>
            Please select the email you want to <font color="#cd5c5c">remove</font>
            <select name="buyerToRemove">
                <?php
                createBuyerOptions();
                ?>
            </select>
            <input type="submit" value="Submit" name="submitRemoveBuyer">
        </form>
        <form id="loginBuyerField" style="display: none" method="POST" action="real-estate.php">
            <hr>
            Please select the email you want to <font color="#a52a2a">login</font>
            <select name="buyerLogin">
                <?php
                createBuyerOptions();
                ?>
            </select>
            <p>Please select the property you like
                <select name="property">
                    <?php
                    createPropertyOptions();
                    ?>
                </select>
            </p>
            <hr>
            <input type="submit" value="Transact" name="submitTransaction">
        </form>
        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP
        // test
        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) {
            //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr);
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

            return $statement;
        }

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
        In this case you don't need to create the statement several times. Bound variables cause a statement to only be
        parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
        See the sample code below for how this function is used */

            global $db_conn, $success;
            $statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
                }

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example,
            // ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_mf941104", "a13006144", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function createCityOptions() {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT DISTINCT a.city
                                           FROM property p, address a
                                           WHERE p.pid = a.pid");
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    $city = $row["CITY"];
                    echo "<option value=$city>$city</option>";
                }
                disconnectFromDB();
            }
        }

        function createPropertyOptions() {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT pid FROM property");
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    $pid = $row["PID"];
                    echo "<option value=$pid>$pid</option>";
                }
                disconnectFromDB();
            }
        }

        function createRealtorOptions()
        {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT rid FROM realtor");
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    $rid = $row["RID"];
                    echo "<option value=$rid>$rid</option>";
                }
            }
            disconnectFromDB();
        }

        function createOwnerIDOptions()
        {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT oid FROM served_owner");
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    $oid = $row["OID"];
                    echo "<option value=$oid>$oid</option>";
                }
            }
            disconnectFromDB();
        }


        function createRealtorFullList()
        {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT * FROM realtor");
                echo "<br>Here is the full list of realtor in the system, <br>";
                echo "<br>you can check their performance under View Realtor section<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>RID</th>
                            <th style='border: 1px solid black;'>Name</th>
                            <th style='border: 1px solid black;'>Email</th>
                            <th style='border: 1px solid black;'>Phone</th>
                      </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["RID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PHONE_NUM"] . "</td>
                           </tr>";
                }

                echo "</table>";
            }
            disconnectFromDB();
        }

        function createBuyerOptions() {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT * FROM served_buyer");
                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    $email = $row["EMAIL"];
                    echo "<option value=$email>$email</option>";
                }
            }
            disconnectFromDB();
        }



        function handleViewPropertyRequest($yearStart, $yearEnd, $city) {
            if (connectToDB()) {
                global $db_conn;

                $result = executePlainSQL(
                        "SELECT p.PID, LIST_PRICE, SQ_FOOTAGE, YEAR_BUILT, UNIT_NUM, STREET_NUM, STREET_NAME, CITY, PROVINCE
                         FROM property p, address a
                         WHERE p.pid = a.pid AND a.city = '$city' AND p.year_built > $yearStart AND p.year_built < $yearEnd");
                echo "<br>Here is a list of properties that satisfy your search criteria:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>ID</th>
                            <th style='border: 1px solid black;'>List Price</th>
                            <th style='border: 1px solid black;'>SQFT</th>
                            <th style='border: 1px solid black;'>Year Built</th>
                            <th style='border: 1px solid black;'>Unit</th>
                            <th style='border: 1px solid black;'>Street Number</th>
                            <th style='border: 1px solid black;'>Street Name</th>
                            <th style='border: 1px solid black;'>City</th>
                            <th style='border: 1px solid black;'>Province</th>
                      </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["PID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["LIST_PRICE"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["SQ_FOOTAGE"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["YEAR_BUILT"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["UNIT_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["STREET_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["STREET_NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["CITY"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PROVINCE"] . "</td>
                           </tr>";
                }

                echo "</table>";
                disconnectFromDB();
            }
        }

        function handleViewRealtorRequest($city, $realtorVal) {
            if (connectToDB()) {
                global $db_conn;

                $result = executePlainSQL(
                    "SELECT re.*, r_value.Total_Transaction_Value
                     FROM realtor re JOIN
                     (SELECT r.rid, SUM(pa.sell_price) AS Total_Transaction_Value
                     FROM realtor r, transaction t, facilitate f, payment pa, property p, address a
                     WHERE r.rid = f.rid
                            AND f.tid = t.tid
                            AND t.down_pay = pa.down_pay
                            AND t.mortgage = pa.mortgage
                            AND t.pid = p.pid
                            AND p.pid = a.pid
                            AND a.city = '$city'
                     GROUP BY r.rid
                     HAVING SUM(pa.sell_price) >= $realtorVal) r_value on re.rid = r_value.rid
                     ORDER BY r_value.Total_Transaction_Value DESC");
                echo "<br>Here is the rank of realtor in $city:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>ID</th>
                            <th style='border: 1px solid black;'>Name</th>
                            <th style='border: 1px solid black;'>Email</th>
                            <th style='border: 1px solid black;'>Phone</th>
                            <th style='border: 1px solid black;'>Total Transaction Value</th>
                      </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["RID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PHONE_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["TOTAL_TRANSACTION_VALUE"] . "</td>
                           </tr>";
                }

                echo "</table>";
                disconnectFromDB();
            }
        }

        function handleRealtorNOtOwn()
        {
            if (connectToDB()) {
                global $db_conn;

                $result = executePlainSQL(
                    "select name, PHONE_NUM, EMAIL from REALTOR
                     minus
                     select name, PHONE_NUM, EMAIL from INDIVIDUAL_OWNER join SERVED_OWNER using (oid)"
                );
                echo "<br>Here is all realtors who does <font color='red'>NOT</font> own any property:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>Name</th>
                            <th style='border: 1px solid black;'>Phone number</th>
                            <th style='border: 1px solid black;'>Email</th>
                       </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PHONE_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                           </tr>";
                }
                echo "</table>";
                OCICommit($db_conn);
                disconnectFromDB();
            }
        }

        function handleTaxRequest($taxYear, $taxAmount, $pid) {
            if (connectToDB()) {
                global $db_conn;

                $taxExist = executePlainSQL(
                    "SELECT COUNT(*) FROM property p, property_tax t
                    WHERE  p.pid = $pid AND p.pid = t.pid AND t.year = $taxYear");
                $row = oci_fetch_row($taxExist);
                if ($row[0] != 0) {
                    $result = executePlainSQL(
                        "UPDATE property_tax SET amount = $taxAmount WHERE pid = $pid AND year = $taxYear");
                } else {
                    $result = executePlainSQL(
                        "INSERT INTO property_tax VALUES($taxYear, $pid, $taxAmount)");
                }

                $result = executePlainSQL("SELECT * FROM property_tax ORDER BY YEAR DESC, PID");
                echo "<br>Property with ID No.{$pid} has a tax amount of $ {$taxAmount} in {$taxYear}<br>";
                echo "<br>Here is a record of property tax:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>ID</th>
                            <th style='border: 1px solid black;'>Year</th>
                            <th style='border: 1px solid black;'>Tax Amount</th>
                       </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["PID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["YEAR"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["AMOUNT"] . "</td>
                           </tr>";
                }
                echo "</table>";
                OCICommit($db_conn);
                disconnectFromDB();
            }
        }

        function handleInsertNewBuyer()
        {
            if (connectToDB()) {
                global $db_conn;

                $numOfBuyers = executePlainSQL("SELECT max(bid) FROM served_buyer");

                $row = oci_fetch_row($numOfBuyers);
                $nextBid = $row[0] + 1;
                $tuple = array(
                    ":bind0" => $nextBid,
                    ":bind4" => $_POST['realtorForBuyer'],
                    ":bind1" => $_POST['buyerName'],
                    ":bind2" => $_POST['buyerPhoneNum'],
                    ":bind3" => $_POST['buyerEmail'],
                    ":bind5" => 0
                );
                $alltuples = array($tuple);

                executeBoundSQL(
                    "INSERT INTO served_buyer VALUES (:bind0, :bind4, :bind1, :bind2, :bind3, :bind5)", $alltuples
                );
                $result = executePlainSQL("SELECT * FROM served_buyer ORDER BY BID");
                echo "<br>New buyer with RID. $nextBid added successfully<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>BID</th>
                            <th style='border: 1px solid black;'>RID</th>
                            <th style='border: 1px solid black;'>NAME</th>
                       </tr>";

                while ($newRow = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $newRow["BID"] . "</td>
                              <td style='border: 1px solid black;'>" . $newRow["RID"] . "</td>
                              <td style='border: 1px solid black;'>" . $newRow["NAME"] . "</td>
                           </tr>";
                }
                echo "</table>";

                OCICommit($db_conn);
                disconnectFromDB();
            }
        }

        function handleRemoveBuyer($email)
        {
            if (connectToDB()) {
                global $db_conn;

                $removedRid = executePlainSQL("SELECT BID FROM served_buyer WHERE email = '$email'");
                $result = executePlainSQL("DELETE FROM served_buyer WHERE email = '$email'");

                echo "<br>Buyer with email {$email} has been removed<br>";


                $result = executePlainSQL("SELECT * FROM served_buyer ORDER BY BID");
                echo "<br>Here is all buyers in the system:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>BID</th>
                            <th style='border: 1px solid black;'>RID</th>
                            <th style='border: 1px solid black;'>NAME</th>
                            <th style='border: 1px solid black;'>Email</th>
                       </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["BID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["RID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                           </tr>";
                }
                echo "</table>";


                $result = executePlainSQL("SELECT * FROM AUTHORIZE ORDER BY BID");
                echo "<br>Here is the authorization for title registration:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                                            <th style='border: 1px solid black;'>BID</th>
                                            <th style='border: 1px solid black;'>Title number</th>
                                            <th style='border: 1px solid black;'>Authorized date</th>
                                       </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                                              <td style='border: 1px solid black;'>" . $row["BID"] . "</td>
                                              <td style='border: 1px solid black;'>" . $row["PSID"] . "</td>
                                              <td style='border: 1px solid black;'>" . $row["AUTHORIZED_DATE"] . "</td>
                                           </tr>";
                }
                echo "</table>";

                OCICommit($db_conn);
                disconnectFromDB();
            }
        }

        function handleTransaction($buyer, $property)
        {
            if (connectToDB()) {
                global $db_conn;

                $owner = executePlainSQL("
                        select oid
                        from served_owner join owns using (oid)
                        where pid = $property");
            }
        }

        function toggleProperty() {
            ?>
            <script type="text/javascript">document.getElementById('propertyField').style.display = 'block';</script>
            <?php
        }

        function toggleRealtor()
        {
            ?>
            <script type="text/javascript">document.getElementById('realtorField').style.display = 'block';</script>
            <?php
        }

        function toggleLawyer()
        {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT * FROM lawyer");
                echo "<br>Here is a list of lawyers registered in the system:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>ID</th>
                            <th style='border: 1px solid black;'>Name</th>
                            <th style='border: 1px solid black;'>Phone</th>
                            <th style='border: 1px solid black;'>Email</th>
                      </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["LID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["NAME"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PHONE_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                           </tr>";
                }

                echo "</table>";
                disconnectFromDB();
            }
        }
        function handlePropertyType($city, $type)
        {
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL(
                    "select median(list_price)
                     from property join $type using (pid)
                                   join address using (aid)
                     where address.city = '$city'");
                $median = floor(oci_fetch_row($result)[0]);
                if (!$median) {
                    echo "<br>There is no {$type} in {$city}<br>";
                } else {
                    echo "<br>The median price of all {$type} in {$city} is: {$median}<br>";
                    echo "<br>Here is the average price and average area of {$type} that have above-median price:<br>";

                    echo "<table style='border: 1px solid black;'>";
                    echo "<tr>
                            <th style='border: 1px solid black;'>Year built</th>
                            <th style='border: 1px solid black;'>cnt</th>
                            <th style='border: 1px solid black;'>Avg price</th>
                            <th style='border: 1px solid black;'>Avg sq. foot</th>
                      </tr>";

                    $filteredProp = executePlainSQL(
                        "with type as (select * from property join $type using (pid) join address using (aid))
                         select YEAR_BUILT, count(LIST_PRICE) cnt, ROUND(avg(LIST_PRICE)) avg, ROUND(AVG(sq_footage)) area
                         from type
                         where city = '$city'
                             and LIST_PRICE >= (select median(list_price)
                                                from type
                                                where city = '$city')
                         group by YEAR_BUILT"
                    );
                    while ($row = OCI_Fetch_Array($filteredProp, OCI_BOTH)) {
                        echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["YEAR_BUILT"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["CNT"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["AVG"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["AREA"] . "</td>

                           </tr>";
                    }

                    echo "</table>";
                }
                disconnectFromDB();
            }
        }


        function toggleBuy()
        {
            ?>
            <script type="text/javascript">document.getElementById('buyField').style.display = 'block';</script>
            <?php
        }

        function toggleSell()
        {
            ?>
            <script type="text/javascript">document.getElementById('sellField').style.display = 'block';</script>
            <?php
        }

        function toggleTax()
        {
            ?>
            <script type="text/javascript">
                document.getElementById('taxField').style.display = 'block';
            </script>
            <?php
        }

        function toggleAssessment()
        {
            ?>
            <script type="text/javascript">
                 document.getElementById('assessmentField').style.display = 'block';
            </script>
            <?php
        }

        function toggleAddBuyer()
        {
            ?>
            <script type="text/javascript">document.getElementById('newBuyerField').style.display = 'block';</script>
            <?php
        }

        function toggleRemoveBuyer()
        {
            ?>
            <script type="text/javascript">document.getElementById('deleteBuyerField').style.display = 'block';</script>
            <?php
        }

        function toggleLogin()
        {
            ?>
            <script type="text/javascript">document.getElementById('loginBuyerField').style.display = 'block';</script>
            <?php
        }

        function checkOwnerProperty($oid) {
            if (connectToDB()) {
                global $db_conn;

                $result = executePlainSQL(
                        "SELECT s.OID, PHONE_NUM, EMAIL,o.PID,LIST_PRICE, SQ_FOOTAGE, YEAR_BUILT
                         FROM served_owner s, owns o, property p
                         WHERE s.oid = o.oid
                               AND o.pid = p.pid
                               AND s.oid = '$oid'");
                echo "<br>Here is your Ownership of Property Recording:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>Owner_ID</th>
                            <th style='border: 1px solid black;'>Phone number</th>
                            <th style='border: 1px solid black;'>Email</th>
                            <th style='border: 1px solid black;'>Property_ID</th>
                            <th style='border: 1px solid black;'>List Price</th>
                            <th style='border: 1px solid black;'>SQFT</th>
                            <th style='border: 1px solid black;'>Year Built</th>
                      </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["OID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PHONE_NUM"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["EMAIL"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["PID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["LIST_PRICE"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["SQ_FOOTAGE"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["YEAR_BUILT"] . "</td>
                           </tr>";
                }

                echo "</table>";
                disconnectFromDB();
            }
        }

        function handleAssessmentRequest($assessmentYear, $assessmentAmount, $pid) {
            if (connectToDB()) {
                global $db_conn;

                $assessmentExist = executePlainSQL(
                    "SELECT COUNT(*) FROM property p, assess_val v
                    WHERE  p.pid = $pid AND p.pid = v.pid AND v.year = $assessmentYear");
                $row = oci_fetch_row($assessmentExist);
                if ($row[0] != 0) {
                    $result = executePlainSQL(
                        "UPDATE assess_val SET amount = $assessmentAmount WHERE pid = $pid AND year = $assessmentYear");
                } else {
                    echo "<p>hit here</p>";
                    $result = executePlainSQL(
                        "INSERT INTO assess_val VALUES($assessmentYear, $pid, $assessmentAmount)");
                }

                $result = executePlainSQL("SELECT * FROM assess_val ORDER BY YEAR DESC, PID");
                echo "<br>Property with ID No.{$pid} has a update assessment amount of $ {$assessmentAmount} in {$assessmentYear}<br>";
                echo "<br>Here is a record of updated assessment value:<br>";
                echo "<table style='border: 1px solid black;'>";
                echo "<tr>
                            <th style='border: 1px solid black;'>ID</th>
                            <th style='border: 1px solid black;'>Year</th>
                            <th style='border: 1px solid black;'>Assessment Amount</th>
                       </tr>";

                while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                    echo "<tr>
                              <td style='border: 1px solid black;'>" . $row["PID"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["YEAR"] . "</td>
                              <td style='border: 1px solid black;'>" . $row["AMOUNT"] . "</td>
                           </tr>";
                }
                echo "</table>";
                OCICommit($db_conn);
                disconnectFromDB();
            }
        }

        if (isset($_POST['property'])) {
            toggleProperty();
        } else if (isset($_POST['realtor'])) {
            toggleRealtor();
        } else if (isset($_POST['lawyer'])) {
            toggleLawyer();
        } else if (isset($_POST['buy'])) {
            toggleBuy();
        } else if (isset($_POST['sell'])) {
            toggleSell();
        } else if (isset($_POST['tax'])) {
            toggleTax();
        } else if (isset($_POST['assessment'])) {
            toggleAssessment();
        } else if (isset($_POST['submitProperty'])) {
            $yearStart = $_POST['yearStart'];
            $yearEnd = $_POST['yearEnd'];
            $city = $_POST['pcity'];
            handleViewPropertyRequest($yearStart, $yearEnd, $city);
        } else if (isset($_POST['submitPropertyType'])) {
            $city = $_POST['ptcity'];
            $type = $_POST['type'];
            handlePropertyType($city, $type);
        } else if (isset($_POST['submitRealtor'])) {
            $city = $_POST['city'];
            $realtorVal = $_POST['realtorVal'];
            handleViewRealtorRequest($city, $realtorVal);
        } else if (isset($_POST['submitTax'])) {
            $taxYear = $_POST['taxYear'];
            $taxAmount = $_POST['taxAmount'];
            $pid = $_POST['taxProperty'];
            handleTaxRequest($taxYear, $taxAmount, $pid);
        } else if (isset($_POST['iAmNewBuyer'])) {
            toggleAddBuyer();
        } else if (isset($_POST['removeBuyer'])) {
            toggleRemoveBuyer();
        } else if (isset($_POST['login'])) {
            toggleLogin();
        } else if (isset($_POST['submitBuyer'])) {
            handleInsertNewBuyer();
        } else if (isset($_POST['submitTransaction'])) {
            $buyer = $_POST['buyerLogin'];
            $property = $_POST['property'];
            handleTransaction($buyer, $property);
        } else if (isset($_POST['submitRemoveBuyer'])) {
            $email = $_POST['buyerToRemove'];
            handleRemoveBuyer($email);
        } else if (isset($_POST['realtorNotOwn'])) {
            handleRealtorNOtOwn();
        } else if (isset($_POST['submitOwnerID'])) {
            $oid = $_POST['checkOwnerOwns'];
            checkOwnerProperty($oid);
        } else if (isset($_POST['submitAssessment'])) {
          $assessmentYear = $_POST['assessmentYear'];
          $assessmentAmount = $_POST['assessmentAmount'];
          $pid = $_POST['assessmentProperty'];
          handleAssessmentRequest($assessmentYear, $assessmentAmount, $pid);
        }
        ?>
     </body>
</html>

