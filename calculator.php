<!-- https://www.youtube.com/watch?v=HKWtJPumb7g -->
<?php
require_once 'template/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href ='css/calculator.css'/>
    <title>Calculator</title>
</head>
<body >


    <table class="table table-borderless mt-3">
    <form action="" id="calculator_form" >
        <div class="income_details">
            <!-- <label class="control-label" for="income">income</label>
            <input type="number" id="income" placeholder="income" max=500 min="0" value="0"> -->

            <tr>
                <td><h1>income</h1></td>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="number" id="income" placeholder="income" max=500 min="0" value="0"></td>
            </tr>
        </div>
        <div class="income_details">
            <tr>
                <td><h1>Tax Relief Details</h1></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Are you disabled?</td>
                <td><input type="radio" name="yes_no" value="yes">Yes</input>  </td>
                <td><input type="radio" name="yes_no" value="no">No</input>  </td>
                <td>RM</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Marital Status</td>
                <td><select id="marital_status">
                    <option value="single">single</option>
                    <option value="maried">maried</option>
                    <option value="divorce">divorce</option>
                </select></td>
                <td></td>
                <td>RM</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Is your husband / wife disabled?</td>
                <td><input type="radio" name="is_hus_wife_disable" value="yes">Yes</input>  </td>
                <td><input type="radio" name="is_hus_wife_disable" value="no">No</input>  </td>
                
                <td>RM</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Is your husband / wife working?</td>
                <td><input type="radio" name="is_hus_wife_work" value="yes">Yes</input>  </td>
                <td><input type="radio" name="is_hus_wife_work" value="no">No</input>  </td>
                
                <td>RM</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Payment of alimony to former wife</td>
                <td></td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="pay_former_wife" placeholder="" min="0" value=0></td>
            </tr>
            <tr>
                <td>Do you have child?</td>
                <td><input type="radio" name="have_child" value="yes">Yes</input>  </td>
                <td><input type="radio" name="have_child" value="no">No</input>  </td>
                
                <td>RM</td>
                <td>0</td>
            </tr>
        </div>

        <div class="child_details">
            <tr>
                <td><h1>CHILD DETAILS</h1></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b>Child</b></td>
                <td></td>
                <td></th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No. of child (&le;18)</td>
                <td><input type="number"  name="" onchange="child_u_18(this.value);" min="0" value="0"></td>
                <td>x 2,000</td>
                <td>RM</td>
                <td ><input id="child_u_18_o" name="" readonly type="text" value="0"></td>
            </tr>
            <tr>
                <td>No. of child (&ge;18)</td>
                <td><input type="number" name="" onchange="child_abv_18(this.value);" min="0" value=0></td>
                <td>x 2,000</td>
                <td>RM</td>
                <td ><input type="number" id="child_abv_18_o" readonly type="text" value="0"></td>
            </tr>
            <tr>
                <td>No. of child (&ge;18), diploma and above</td>
                <td><input type="number"  name="" onchange="child_abv_18_dip(this.value);" min="0" value="0"></td>
                <td>x 8,000</td>
                <td>RM</td>
                <td ><input type="number" id="child_abv_18_dip_o" readonly type="text" value="0"></td>
            </tr>
            <tr>
                <tr>
                    <td><b>Disabled Child</b></td>
                    <td></td>
                    <td></th>
                    <td></td>
                    <td></td>
                </tr>
                
            </tr>
            <tr>
                <td>No. of disabled child</td>
                <td><input type="number"  name="" onchange="child_dis(this.value);" min="0" value="0"></td>
                <td>x 6,000</td>
                <td>RM</td>
                <td ><input type="number" id="child_dis_o" readonly type="text" value="0"></td>
            </tr>
            <tr>
                <td>No. of disabled child (&ge;18), diploma and above</td>
                <td><input type="number"  name="" onchange="child_dis_abv_18_dip(this.value);" min="0" value="0"></td>
                <td>x 14,000</td>
                <td>RM</td>
                <td ><input type="number" id="child_dis_abv_18_dip_o" readonly type="text" value="0"></td>
            </tr>
            <tr>
                <td>Child Education Saving</td>
                <td>[Limited to 8,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="child_edu_save" placeholder="" min="0" max="8000" value=0></td>
            </tr>
            <tr>
                <td>Breastfeeding Equipment</td>
                <td>[Limited to 1,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="breastfeed" placeholder="" min="0" max="8000" value=0></td>
            </tr>
            <tr>
                <td>Childcare centres and kindergartens fees</td>
                <td>[Limited to 3,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="kindergartens" placeholder="" min="0" max="8000" value=0></td>
            </tr>
        </div>
        <div class="parent_details">
            <tr>
                <td><h1>Parent Details</h1></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Parent Medical</td>
                <td>[Limited to 8,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="parent_med" placeholder="" min="0" max="8000" value=0></td>
            </tr>
            
        </div>

        <div class="other_details">
            <tr>
                <td><h1>Other Details</h1></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Annuity / PRS</td>
                <td>[Limited to 3,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="annuity" placeholder="" min="0" max="3000" value=0></td>
            </tr>
            <tr>
                <td>Education & Medical Insurance</td>
                <td>[Limited to 3,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="edu_med_ins" placeholder="" min="0" max="3000" value=0></td>
            </tr>
            <tr>
                <td>Education Fees (Self)</td>
                <td>[Limited to 7,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="edu_fees" placeholder="" min="0" max="7000" value=0></td>
            </tr>
            <tr>
                <td>Supporting Equipment</td>
                <td>[Limited to 6,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="support_equipment" placeholder="" min="0" max="6000" value=0></td>
            </tr>
            <tr>
                <td>Medical Expenses (Self / Spouse / Child)</td>
                <td>[Limited to 8,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="med_expenses" placeholder="" min="0" max="8000" value=0></td>
            </tr>
            <tr>
                <td>EPF / KWSP</td>
                <td>[Limited to 4,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="epf_kwsp" placeholder="" min="0" max="4000" value=0></td>
            </tr>
            <tr>
                <td>Life Insurance</td>
                <td>[Limited to 3,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="insurance" placeholder="" min="0" max="3000" value=0></td>
            </tr>
            <tr>
                <td>Lifestyle</td>
                <td>[Limited to 2,500]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="lifestyle" placeholder="" min="0" max="2500" value=0></td>
            </tr>
            <tr>
                <td>Lifestyle (Additional)</td>
                <td>[Limited to 2,500]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="lifestyle_add" placeholder="" min="0" max="2500" value=0></td>
            </tr>
            <tr>
                <td>Lifestyle (Sports)</td>
                <td>[Limited to 500]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="lifestyle_sport" placeholder="" min="0" max="500" value=0></td>
            </tr>
            <tr>
                <td>SOCSO / PERKESO</td>
                <td>[Limited to 250]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="socso" placeholder="" min="0" max="250" value=0></td>
            </tr>
            <tr>
                <td>Domestic Travel Expenses</td>
                <td>[Limited to 1,000]</td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="travel" placeholder="" min="0" max="1000" value=0 maxlength="4"></td>
            </tr>
            <tr>
                <td>PCB</td>
                <td></td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="pcb" placeholder="" min="0" value=0 ></td>
            </tr>
            <tr>
                <td>Zakat</td>
                <td></td>
                <td></td>
                <td>RM</td>
                <td><input type="number" id="zakat" placeholder="" min="0" value=0></td>
            </tr>
        </div>    
        </table>

    </form>
    <button class="calculate-btn" type="submit" >calculate</button>

    <div class="output" id="output">total tax</div>
    <script src="js/calculator.js"></script>
</body>
</html>

