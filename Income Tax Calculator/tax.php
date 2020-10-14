        <!DOCsaltype html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Tax Calculator </title>
            <link rel="stylesheet" href="style2.css">
        </head>

        <body>
            <?php
            $salary = $saltype = $taxAllowance = "";
            $salary_error = $saltype_error = $taxAllowance_error = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                //salary required
                if (empty($_POST["salary"])) {
                    $salary_error = " * Salary is required";
                } else {
                    $salary = test_input($_POST["salary"]);
                    if (!is_numeric($salary)) {
                        $salary_error = "* Please enter a number";
                    }
                }

                //saltype required
                if (empty($_POST["saltype"])) {
                    $saltype_error = "* salary type is required";
                } else {
                    $saltype = test_input($_POST["saltype"]);
                }


                //tax free Allowance required
                if (empty($_POST["taxAllowance"])) {
                    $taxAllowance_error = "* Tax Free Allowance is required";
                } else {
                    $taxAllowance = test_input($_POST["taxAllowance"]);
                    if (!is_numeric($taxAllowance)) {
                        $taxAllowance_error = "* Please enter a number";
                    }
                }
                
                //annual salary calculation according to the rules
                    $totalsalary =$annualSalary=  $annualtaxAllowance= $taxAmount = $yearlySSF  = 0;
                if (isset($saltype) && $saltype == "Yearly-Salary") {
                    $annualSalary = $salary;
                    $annualtaxAllowance = $taxAllowance;
                    if ($annualSalary < 10000) {
                        $totalsalary = $annualSalary + $annualtaxAllowance;
                    } elseif ($annualSalary > 10000 && $annualSalary < 25000) {
                        $taxAmount = $annualSalary * (11 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    } elseif ($annualSalary > 25000 && $annualSalary < 50000) {
                        $taxAmount = $annualSalary * (30 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    } else {
                        $taxAmount = $annualSalary * (45 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    }
                } elseif (isset($saltype) && $saltype == "Monthly-Salary") {
                    $annualSalary = $salary * 12;
                    $annualtaxAllowance = $taxAllowance * 12;
                    if ($annualSalary < 10000) {
                        $totalsalary = $annualSalary + $annualtaxAllowance;
                    } elseif ($annualSalary > 10000 && $annualSalary < 25000) {
                        $taxAmount = $annualSalary * (11 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    } elseif ($annualSalary > 25000 && $annualSalary < 50000) {
                        $taxAmount = $annualSalary * (30 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    } else {
                        $taxAmount = $annualSalary * (45 / 100);
                        $yearlySSF = $annualSalary * (4 / 100);
                        $totalsalary = ($annualSalary - ($taxAmount + $yearlySSF)) + $annualtaxAllowance;
                    }
                }
                $monthlySalary = $taxAmountmonthly = $monthlySSF = $totalsalarymonthly  = 0;
                $monthlySalary = $annualSalary / 12;
                $taxAmountmonthly = $taxAmount / 12;
                $monthlySSF = $yearlySSF / 12;
                $totalsalarymonthly = $totalsalary / 12;
            }
            function test_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            
            <h1> Free Tax Calculator </h1>
            <div clacc="containor">
            <div class="warp">
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div  id="s"class="fc ">
                    <span class="error"> <?php echo $salary_error; ?></span><br>
                    <label>Salary in USD:</label><br>
                        <input type="text" name="salary" value="<?php echo $salary ?>">
                    </div>
                <div class="fc">
                <span class="error"> <?php echo $saltype_error; ?></span><br>
                <label> This  Salary is your :</label><br>
                    <input id="r"type="radio" name="saltype" <?php if (isset($saltype) && $saltype == "Monthly-Salary") echo "checked"; ?> value="Monthly-Salary">Monthly-Salary
                    <input id="r" type="radio" name="saltype" <?php if (isset($saltype) && $saltype == "Yearly-Salary") echo "checked"; ?> value="Yearly-Salary">Yearly-Salary <br><br>
        </div>
        <div class="fc">
        <span class="error"> <?php echo $taxAllowance_error; ?></span><br>
            <label>Tax Free Allowance in USD:</label> <br>
            <input  type="text" name="taxAllowance" value="<?php echo $taxAllowance ?>">
                        
        </div>
                    <div class="button" > <input class="button" type="submit" name="submit" value="Calculate"></div>
                </form>
            </div>
            <div class="result">
            
            <?php
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($salary_error == "" && $saltype_error == "" && $taxAllowance_error == "") {
                    echo "
                <table>
                    <tr>
                        <th>Income with Taxes</th>
                        <th>Monthly</th>
                        <th>Yearly</th>
                    </tr>
                    <tr>
                        <td>Total Salary</td>
                        <td>$monthlySalary$</td>
                        <td>$annualSalary$</td>
                    </tr>
                    <tr>
                        <td>Tax Amount</td>
                        <td>$taxAmountmonthly$</td>
                        <td>$taxAmount$</td>
                    </tr>
                    <tr>
                        <td>Social Security Fee</td>
                        <td>$monthlySSF$</td>
                        <td>$yearlySSF$</td>
                    </tr>
                    <tr>
                        <td>Salary After Tax</td>
                        <td>$totalsalarymonthly$</td>
                        <td>$totalsalary$</td>
                    </tr>
                </table>";
                }
            }
            ?>
            </div>
            </div>

        </body>

        </html>