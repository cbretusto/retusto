<table>
    <tr>
        <th>
            <b>PMI FY21</b>
        </th>
        <th>
            <b>Process Level Control (PLC) Assessment Summary</b>
        </th>
    </tr>

    <tr>
        <td rowspan="3" colspan="2">
            <b>Process Name</b>
        </td>
        <td colspan="3">
            <b>1st Half Year Assessment</b>
        </td>
        <td colspan="3">
            <b>Roll Forward</b>
        </td>
        <td colspan="2">
            <b>Follow-up Ending</b>
        </td>
        <td rowspan="3">
            <b>Remakrs</b>
        </td>
    </tr>

    <tr>
        <td rowspan="2">PMI</td>
        <td rowspan="2">YEC Review<br>Date Approved: </td>
        <td rowspan="2">Internal Control<br>No. Affected</td>

        <td rowspan="2">PMI</td>
        <td rowspan="2">YEC Review<br>Date Approved: </td>
        <td rowspan="2">Internal Control<br>No. Affected</td>

        <td rowspan="2">PMI</td>
        <td rowspan="2">YEC Review</td>

    </tr>

    <tr>

    </tr>

    <tr>
        <td>PMI-01</td>
        <td>Receiving Orders (from YEC)</td>

        <td>='Audit Status'!E5</td>
        <td>='Audit Status'!E5</td>
        {{-- <td>PMI</td> --}}

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 8){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td >='Audit Status'!H5</td>
        {{-- <td >='Audit Status'!H5</td> --}}
    </tr>

    <tr>
        <td>PMI-02</td>
        <td>Shipment Preparation</td>
        <td>='Audit Status'!E6</td>
        <td>='Audit Status'!E6</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 2){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H6</td>
        {{-- <td>='Audit Status'!H6</td> --}}
    </tr>

    <tr>
        <td>PMI-03</td>
        <td>Changing Sales Prices</td>
        <td>='Audit Status'!E7</td>
        <td>='Audit Status'!E7</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 3){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        {{-- @if ('Audit Status' == 'Not tested (non-key control)')
            <td> ='Audit Status'!H7 </td>
        @elseif ('Audit Status' == 'Good' || 'Audit Status' == 'Not Good')
            <td> ='Audit Status'!H7 </td>
            <td> ='Audit Status'!H7 </td>
        @endif --}}

        <td>='Audit Status'!H7</td>
    </tr>

    <tr>
        <td>PMI-04</td>
        <td>Changing Sales Qty. (before invoice issuance)</td>
        <td>='Audit Status'!E8</td>
        <td>='Audit Status'!E8</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 4){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H8</td>
        {{-- <td>='Audit Status'!H8</td> --}}
    </tr>

    <tr>
        <td>PMI-05</td>
        <td>Invoice Issuance (to YEC)</td>
        <td>='Audit Status'!E9</td>
        <td>='Audit Status'!E9</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 5){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H9</td>
        <td>='Audit Status'!H9</td>
    </tr>

    <tr>
        <td>PMI-06</td>
        <td>Changing Sales Invoices -1</td>
        <td>='Audit Status'!E10</td>
        <td>='Audit Status'!E10</td>

        <?php
        $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 6){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>
        <td>='Audit Status'!H10</td>
    </tr>

    <tr>
        <td>PMI-07</td>
        <td>Changing Sales Invoices -2</td>
        <td>='Audit Status'!E11</td>
        <td>='Audit Status'!E11</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 7){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>
        <td>='Audit Status'!H11</td>
    </tr>

    <tr>
        <td>PMI-08</td>
        <td>Verifying Monthly Data (With Sakura)</td>
        
        <td>='Audit Status'!E12</td>
        <td>='Audit Status'!E12</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 8){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H12</td>
    </tr>

    <tr>
        <td>PMI-09</td>
        <td>Purchase Orders (to YEC)</td>
        <td>='Audit Status'!E13</td>
        <td>='Audit Status'!E13</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 9){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>
        <td>='Audit Status'!H13</td>
    </tr>

    <tr>
        <td>PMI-10</td>
        <td>P/O Placement to CN, PPS Suppliers</td>
        <td>='Audit Status'!E14</td>
        <td>='Audit Status'!E14</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 10){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>
        <td>='Audit Status'!H14</td>
    </tr>

    <tr>
        <td>PMI-11</td>
        <td>Changing P/Os for CN, PPS Suppliers</td>
        <td>='Audit Status'!E15</td>
        <td>='Audit Status'!E15</td>
        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 11){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H15</td>
    </tr>

    <tr>
        <td>PMI-12</td>
        <td>Receiving Shipments from YEC</td>
        <td>='Audit Status'!E16</td>
        <td>='Audit Status'!E16</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 12){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>
        <td>='Audit Status'!H16</td>
    </tr>

    <tr>
        <td>PMI-13</td>
        <td>Generation of NG Reports</td>
        <td>='Audit Status'!E17</td>
        <td>='Audit Status'!E17</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 13){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H17</td>
    </tr>

    <tr>
        <td>PMI-14</td>
        <td>Handling Correct YEC Invoices</td>
        <td>='Audit Status'!E18</td>
        <td>='Audit Status'!E18</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 14){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H18</td>
    </tr>

    <tr>
        <td>PMI-15</td>
        <td>Handling Incorrect YEC Invoices</td>
        <td>='Audit Status'!E19</td>
        <td>='Audit Status'!E19</td>
        
        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 15){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H19</td>
    </tr>

    <tr>
        <td>PMI-16</td>
        <td>Vouchering</td>
        <td>='Audit Status'!E20</td>
        <td>='Audit Status'!E20</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 16){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H20</td>
    </tr>

    <tr>
        <td>PMI-17</td>
        <td>Check Payments by Peso</td>
        <td>='Audit Status'!E21</td>
        <td>='Audit Status'!E21</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 17){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H21</td>
    </tr>

    <tr>
        <td>PMI-18</td>
        <td>E-payments by Dollar</td>
        <td>='Audit Status'!E22</td>
        <td>='Audit Status'!E22</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 18){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H22</td>
    </tr>

    <tr>
        <td>PMI-19</td>
        <td>Billing</td>
        <td>='Audit Status'!E23</td>
        <td>='Audit Status'!E23</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 19){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H23</td>
    </tr>

    <tr>
        <td>PMI-20</td>
        <td>Offset Arrangement (with YEC)</td>
        <td>='Audit Status'!E24</td>
        <td>='Audit Status'!E24</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 20){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H24</td>
    </tr>

    <tr>
        <td>PMI-21</td>
        <td>Collection from YEC</td>
        <td>='Audit Status'!E25</td>
        <td>='Audit Status'!E25</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 21){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H25</td>
    </tr>

    <tr>
        <td>PMI-22</td>
        <td>Issuing Debit and Credit Memos</td>
        <td>='Audit Status'!E26</td>
        <td>='Audit Status'!E26</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 22){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H26</td>
    </tr>

    <tr>
        <td>PMI-23</td>
        <td>Posting Collections</td>
        <td>='Audit Status'!E27</td>
        <td>='Audit Status'!E27</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 23){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H27</td>
    </tr>

    <tr>
        <td>PMI-24</td>
        <td>Physical Count-TS</td>
        <td>='Audit Status'!E28</td>
        <td>='Audit Status'!E28</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 24){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H28</td>
    </tr>

    <tr>
        <td>PMI-25</td>
        <td>Devaluation of Slow-moving</td>
        <td>='Audit Status'!E29</td>
        <td>='Audit Status'!E29</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 25){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H29</td>
    </tr>

    <tr>
        <td>PMI-26</td>
        <td>Returning Defect Materials to YEC</td>
        <td>='Audit Status'!E30</td>
        <td>='Audit Status'!E30</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 26){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H30</td>
    </tr>

    <tr>
        <td>PMI-27</td>
        <td>Receiving Shipments from CN, PPS Suppliers</td>
        <td>='Audit Status'!E31</td>
        <td>='Audit Status'!E31</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 27){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H31</td>
    </tr>

    <tr>
        <td>PMI-28</td>
        <td>Physical Count-PPS</td>
        <td>='Audit Status'!E32</td>
        <td>='Audit Status'!E32</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 28){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H32</td>
    </tr>

    <tr>
        <td>PMI-29</td>
        <td>Handling Invoices from CN, PPS Suppliers</td>
        <td>='Audit Status'!E33</td>
        <td>='Audit Status'!E33</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 29){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H33</td>
    </tr>

    <tr>
        <td>PMI-30</td>
        <td>Handling Discrepancies to CN, PPS</td>
        <td>='Audit Status'!E34</td>
        <td>='Audit Status'!E34</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 30){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H34</td>
    </tr>

    <tr>
        <td>PMI-31</td>
        <td>Inventory Valuation</td>
        <td>='Audit Status'!E35</td>
        <td>='Audit Status'!E35</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 31){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H35</td>
    </tr>

    <tr>
        <td>PMI-32</td>
        <td>Correcting Monthly Data</td>
        <td>='Audit Status'!E36</td>
        <td>='Audit Status'!E36</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 32){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H36</td>
    </tr>

    <tr>
        <td>PMI-33</td>
        <td>Handling of Discrepancies to CN, PPS</td>
        <td>='Audit Status'!E37</td>
        <td>='Audit Status'!E37</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 33){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H37</td>
    </tr>

    <tr>
        <td>PMI-34</td>
        <td>Sales from PPS to TS, CN</td>
        <td>='Audit Status'!E38</td>
        <td>='Audit Status'!E38</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 24){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H38</td>
    </tr>

    <tr>
        <td>PMI-35</td>
        <td>Daily Cash in Bank Monitoring</td>
        <td>='Audit Status'!E39</td>
        <td>='Audit Status'!E39</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 35){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H39</td>
    </tr>

    <tr>
        <td>PMI-36</td>
        <td>Cash in Bank Monthly Monitoring</td>
        <td>='Audit Status'!E40</td>
        <td>='Audit Status'!E40</td>

        <?php
            $test_array = array();
            $test = "";
            for($i = 0; $i < count($data); $i++){
                if($data[$i]->category == 36){
                    if(!$i == count($data)) {
                        $test .= $data[$i]->control_no."<br>";
                        // array_push($test_array, '1nd if');
                    }
                    if($i+1 == count($data)) {
                        $test .= $data[$i]->control_no;
                        // array_push($test_array, '2nd if count:' . count($data));
                    }
                }
            }
        ?>

        <?php
        echo ("<td>
            $test
            </td>");
        ?>

        <td>='Audit Status'!H40</td>
    </tr>

</table>
