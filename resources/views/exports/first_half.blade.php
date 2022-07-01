<table>

    <tr>
        <th>
            <b>PMI FY21</b>
        </th>
        <th>
            <b>Details of Findings (1st Half)</b>
        </th>
    </tr>

    <tr>
        <td><b>Department</b></td>

        <td><b>No. of Findings</b></td>
        <td><b>Process Name</b></td>
        <td><b>Internal Control No. Affected</b></td>
        <td><b>Statement of Findings</b></td>

    </tr>

    <?php
        for($i = 0; $i < count($concerned_dept); $i++){
            // if($i < $concerned_dept[$i]->category){

                $department = $concerned_dept[$i]->concerned_dept;
                $affected_control_no = $concerned_dept[$i]->control_no;
                $process_name = $concerned_dept[$i]['plc_categories']->plc_category;
                $statement_of_findings = $concerned_dept[$i]->dic_assessment;
                echo "<tr>
                    <td>
                        $department
                        </td>

                        <td>
                            1
                            </td>

                            <td>
                                $process_name
                                </td>

                            <td>
                                $affected_control_no
                                </td>

                            <td>
                                $statement_of_findings
                                </td>


                    </tr>";
            // }

        }

    ?>



</table>
