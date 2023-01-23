<!-- https://www.youtube.com/watch?v=HKWtJPumb7g -->
<?php
require_once 'template/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href ='css/calculator.css'/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>document.title = 'Tax Calculator';</script>
    <title>Calculator</title>
</head>
<body >

    <main class="">
        <section class="  flex-column container  p-5 mb-3 bg-white  ">
            <h4>Tax Calculator</h4>
            <table class="table table_1  table-borderless rounded rounded-6 overflow-hidden ">
                <!-- <form id="calculator_form" > -->
                    <div class="form">

                    <div class="income_details">
                        <!-- <label class="control-label" for="income">income</label>
                        <input type="number" id="income" placeholder="income" max=500 min="0" value="0"> -->

                        <tr>
                            <td colspan="5" class=""><h4  >income</h4></td>

                        </tr>
                        <tr>
                            <td class="align-text-bottom">Total Annual Income</td>
                            <td></td>
                            <td></td>
                            <td class="rm">RM</td>
                            <td class="col-md-2"><input class="form-control input-sm " type="number" id="income" placeholder="income" min="0" value="0" required></td>
                        </tr>
                    </div>
                    <div class="Tax_Relief_Details">
                        <tr style="display:show">
                            <td colspan="5" class=""><h4>Tax Relief Details</h4></td>

                        </tr>
                        <tr>
                            <td>Are you disabled?</td>
                            <td>   
                                <div class="btn-group  col-sm-9 disable">
                                <!-- <input class="form-check-input" type="radio" name="yes_no" value="yes">Yes</input> <input type="radio" name="yes_no" value="no">No</input> -->
                                
                                    <input type="radio" class="btn-check" name="disable" id="disable_y" autocomplete="off" value="yes"  onclick="change_value(this.name, this.value)"/>
                                    <label class="btn btn-custom" for="disable_y">Yes</label>

                                    <input type="radio" class="btn-check" name="disable" id="disable_n" autocomplete="off" value="no"  onclick="change_value(this.name, this.value)" selected/>
                                    <label class="btn btn-custom" for="disable_n">No</label>
                                </div>
                            </td>
                            <td></td>
                            <td>RM</td>
                            <td><input type="number" class="form-control disabled " readonly  min="0" value="0" id="is_disable"></td>
                        </tr>
                        <tr>
                            <td>Marital Status</td>
                            <td>
                                <select  class="form-control  form-control-inline input-sm" id="marital_status">

                                <!-- <select id="marital_status" > -->
                                    <option value="single">single</option>
                                    <option value="maried">maried</option>
                                    <option value="divorce">divorce</option>
                                </select>
                                
                            </td>
                            <td></td>
                            <td>RM</td>
                            <td><input type="number" class="form-control disabled " readonly  min="0" value="9000"></td>
                        </tr>
                        <!-- <div class="check_is_maried" style="display: none" id="check_is_maried"> -->
                            <tr class="check_is_maried" id="check_is_maried" >
                                <td>Is your husband / wife disabled?</td>
                                <td>
                                    <!-- <input type="radio" name="is_hus_wife_disable" value="yes">Yes</input>  <input type="radio" name="is_hus_wife_disable" value="no">No</input>  -->
                                    <div class="btn-group col-sm-9">
                                    <!-- <input class="form-check-input" type="radio" name="yes_no" value="yes">Yes</input> <input type="radio" name="yes_no" value="no">No</input> -->
                                    
                                        <input type="radio" class="btn-check" name="husorwife_disable" id="husorwife_disable_y" autocomplete="off"   value="yes" onclick="change_value(this.name, this.value)"/>
                                        <label class="btn btn-custom" for="husorwife_disable_y">Yes</label>

                                        <input type="radio" class="btn-check" name="husorwife_disable" id="husorwife_disable_n" autocomplete="off" value="no" onclick="change_value(this.name, this.value)"/>
                                        <label class="btn btn-custom" for="husorwife_disable_n">No</label>
                                    </div>
                                </td>
                                <td> </td>
                                <td>RM</td>
                                <td><input type="number" class="form-control disabled " readonly  min="0" value="0" id="is_hus_wife_disable"></td>
                            </tr>
                            <tr class="check_is_maried" id="husorwife_work">
                                <td>Is your husband / wife working?</td>
                                <td>
                                    <!-- <input type="radio" name="is_hus_wife_work" value="yes">Yes</input><input type="radio" name="is_hus_wife_work" value="no">No</input>    -->
                                    <div class="btn-group col-sm-9">
                                    <!-- <input class="form-check-input" type="radio" name="yes_no" value="yes">Yes</input> <input type="radio" name="yes_no" value="no">No</input> -->
                                    
                                        <input type="radio" class="btn-check" name="husorwife_work" id="husorwife_work_y" autocomplete="off"  value="yes" onclick="change_value(this.name, this.value)"/>
                                        <label class="btn btn-custom" for="husorwife_work_y">Yes</label>

                                        <input type="radio" class="btn-check" name="husorwife_work" id="husorwife_work_n" autocomplete="off" value="no" onclick="change_value(this.name, this.value)"/>
                                        <label class="btn btn-custom" for="husorwife_work_n">No</label>
                                    </div>
                                </td>
                                <td> </td>
                                <td>RM</td>
                                <td><input type="number" class="form-control disabled " id="is_work" readonly min="0" value="0"></td>
                            </tr>
                            <tr class="check_is_maried" id="pay_former_wife">
                                <td>Payment of alimony to former wife</td>
                                <td></td>
                                <td></td>
                                <td>RM</td>
                                <td><input class="form-control col-md-3 w-2" type="number" id="pay_former_wife" placeholder="" min="0" value=0></td>
                            </tr>
                            <tr class="check_is_maried" id="child">
                                <td>Do you have child?</td>
                                <td>
                                    <!-- <input type="radio" name="have_child" value="yes">Yes</input>  <input type="radio" name="have_child" value="no">No</input>   -->
                                    <div class="btn-group col-sm-9">
                                    <!-- <input class="form-check-input" type="radio" name="yes_no" value="yes">Yes</input> <input type="radio" name="yes_no" value="no">No</input> -->
                                    
                                        <input type="radio" class="btn-check" name="child" id="child_y" autocomplete="off" value="yes"  onclick="change_value(this.name, this.value)"/>
                                        <label class="btn btn-custom" for="child_y">Yes</label>

                                        <input type="radio" class="btn-check" name="child" id="child_n" autocomplete="off" value="no"onclick="change_value(this.name, this.value)" selected/>
                                        <label class="btn btn-custom" for="child_n">No</label>
                                    </div>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <!-- </div> -->
                    </div>

                    <!-- <div class="child_details" id="has_child"> -->
                        <tr id = "c">
                            <td colspan="5" class="" s><h4>CHILD DETAILS</h4></td>

                        </tr>
                        <tr  id="cd" style="display:none;">
                            <td><b>Child</b></td>
                            <td></td>
                            <td></th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr  id="l18">
                            <td>No. of child (&le;18)</td>
                            <td><input class="form-control" type="number"  name="" onchange="child_u_18(this.value);" min="0" value="0"></td>
                            <td>x 2,000</td>
                            <td>RM</td>
                            <td><input class="form-control" id="child_u_18_o" name="" readonly type="text" value="0"></td>
                        </tr>
                        <tr  id="m18">
                            <td>No. of child (&ge;18)</td>
                            <td><input class="form-control" type="number" name="" onchange="child_abv_18(this.value);" min="0" value=0></td>
                            <td>x 2,000</td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="child_abv_18_o" readonly type="text" value="0"></td>
                        </tr>
                        <tr  id="ma18">
                            <td>No. of child (&ge;18), diploma and above</td>
                            <td><input class="form-control" type="number"  name="" onchange="child_abv_18_dip(this.value);" min="0" value="0"></td>
                            <td>x 8,000</td>
                            <td>RM</td>
                            <td><input class="form-control"class="form-control" type="number" id="child_abv_18_dip_o" readonly type="text" value="0"></td>
                        </tr>
                        <tr  id="dc">
                            <!-- <tr> -->
                                <td><b>Disabled Child</b></td>
                                <td></td>
                                <td></th>
                                <td></td>
                                <td></td>
                            <!-- </tr> -->
                            
                        </tr>
                        <tr  id="ndc">
                            <td>No. of disabled child</td>
                            <td><input class="form-control" type="number"  name="" onchange="child_dis(this.value);" min="0" value="0"></td>
                            <td>x 6,000</td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="child_dis_o" readonly type="text" value="0"></td>
                        </tr>
                        <tr  id="ndca">
                            <td>No. of disabled child (&ge;18), diploma and above</td>
                            <td><input class="form-control" type="number"  name="" onchange="child_dis_abv_18_dip(this.value);" min="0" value="0"></td>
                            <td>x 14,000</td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="child_dis_abv_18_dip_o" readonly type="text" value="0"></td>
                        </tr>
                        <tr  id="cedus">
                            <td>Child Education Saving</td>
                            <td>[Limited to 8,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="child_edu_save" placeholder="" min="0" max="8000" value=0></td>
                        </tr>
                        <tr  id="bfe">
                            <td>Breastfeeding Equipment</td>
                            <td>[Limited to 1,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="breastfeed" placeholder="" min="0" max="8000" value=0></td>
                        </tr>
                        <tr  id="kind">
                            <td>Childcare centres and kindergartens fees</td>
                            <td>[Limited to 3,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="kindergartens" placeholder="" min="0" max="8000" value=0></td>
                        </tr>
                    <!-- </div> -->
                    <div class="parent_details">
                        <tr>
                            <td colspan="5" class=" "><h4>Parent Details</h4></td>

                        </tr>
                        <tr>
                            <td>Parent Medical</td>
                            <td>[Limited to 8,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="parent_med" placeholder="" min="0" max="8000" value=0></td>
                        </tr>
                        
                    </div>

                    <div class="other_details">
                        <tr>
                            <td colspan="5" class=" "><h4>Other Details</h4></td>

                        </tr>
                        <tr>
                            <td>Annuity / PRS</td>
                            <td>[Limited to 3,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" class="form-control" type="number" id="annuity" placeholder="" min="0" max="3000" value=0></td>
                        </tr>
                        <tr>
                            <td>Education & Medical Insurance</td>
                            <td>[Limited to 3,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="edu_med_ins" placeholder="" min="0" max="3000" value=0></td>
                        </tr>
                        <tr>
                            <td>Education Fees (Self)</td>
                            <td>[Limited to 7,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="edu_fees" placeholder="" min="0" max="7000" value=0></td>
                        </tr>
                        <tr>
                            <td>Supporting Equipment</td>
                            <td>[Limited to 6,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="support_equipment" placeholder="" min="0" max="6000" value=0></td>
                        </tr>
                        <tr>
                            <td>Medical Expenses (Self / Spouse / Child)</td>
                            <td>[Limited to 8,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="med_expenses" placeholder="" min="0" max="8000" value=0></td>
                        </tr>
                        <tr>
                            <td>EPF / KWSP</td>
                            <td>[Limited to 4,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="epf_kwsp" placeholder="" min="0" max="4000" value=0></td>
                        </tr>
                        <tr>
                            <td>Life Insurance</td>
                            <td>[Limited to 3,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="insurance" placeholder="" min="0" max="3000" value=0></td>
                        </tr>
                        <tr>
                            <td>Lifestyle</td>
                            <td>[Limited to 2,500]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="lifestyle" placeholder="" min="0" max="2500" value=0></td>
                        </tr>
                        <tr>
                            <td>Lifestyle (Additional)</td>
                            <td>[Limited to 2,500]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="lifestyle_add" placeholder="" min="0" max="2500" value=0></td>
                        </tr>
                        <tr>
                            <td>Lifestyle (Sports)</td>
                            <td>[Limited to 500]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="lifestyle_sport" placeholder="" min="0" max="500" value=0></td>
                        </tr>
                        <tr>
                            <td>SOCSO / PERKESO</td>
                            <td>[Limited to 250]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="socso" placeholder="" min="0" max="250" value=0></td>
                        </tr>
                        <tr>
                            <td>Domestic Travel Expenses</td>
                            <td>[Limited to 1,000]</td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="travel" placeholder="" min="0" max="1000" value=0 maxlength="4"></td>
                        </tr>
                        <tr>
                            <td>PCB</td>
                            <td></td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="pcb" placeholder="" min="0" value=0 ></td>
                        </tr>
                        <tr>
                            <td>Zakat</td>
                            <td></td>
                            <td></td>
                            <td>RM</td>
                            <td><input class="form-control" type="number" id="zakat" placeholder="" min="0" value=0></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </div>    
                    
                    </table>                    
                    <div class="button">                    
                        <button class="btn calculate-btn" type="submit" id="button"><a href="tax_output"></a> calculate</button>
                    </div>
                    </div><!-- </form> -->


            <div class="output" style="display:none" id="output_table">
                <table classs="table mt-3 table-borderless  p-5">
                    <tr>
                        <td colspan="5" >Income Tax Summary </td>
                    </tr>
                    <tr>
                        <td>Annual income</td>
                        <td><h4 id="annual_income"></h4>
                    </tr>
                    <tr>
                        <td>Tax Deductions</td>
                        <td ><h4 id="tax_deduction"></h4></td>
                    </tr>
                    
                    <tr>
                        <td><small style="margin-left:10px">Individual / Spouse Relief</small></td>
                        <td><small id="Individual_Spouse_Relief"></small></td>
                    </tr>
                    <tr>
                        <td><small style="margin-left:10px">Child Relief</small></td>
                        <td><small id="Child_Relief"></small></td>
                    </tr>
                    <tr>
                        <td><small style="margin-left:10px">Parent Relief</small></td>
                        <td><small id="Parent_Relief"></small></td>
                    </tr>
                    <tr>
                        <td><small style="margin-left:10px">Other Relief</small></td>
                        <td><small id="Other_Relief"></small></td>
                    </tr>
                    <tr>
                        <td><b>Taxable Income</b></td>
                        <td><b id="taxable_income">0</b></td>
                    </tr>
                    <tr>
                        <td><b>Tax amount</b></td>
                        <td><b id="tax_amount">0</b></td>
                    </tr>
                    <tr>
                        <td>less Zakat</td>
                        <td><small id="zakats">0</small></td>
                    </tr>
                    <!-- <tr>
                        <td>Less Tax Rebate</td>
                        <td><small>9000</small></td>
                    </tr> -->
                    <tr>
                        <td><b>Tax You Should Pay</b></td>
                        <td><b>RM </b><b id="taxable_should_pay">0</b></td>
                    </tr>                
                    <tr><a id="tax_output"></a>
                        <td><small>Average Tax Rate</small></td>
                        <td><small id="tax_rate"></small><small>%</small></td>
                    </tr>
                    
                </table>

            </div>
        </section>

    </main>

    <div class="output" id="output">total tax</div>
    <script src="js/calculator.js">
        $(document).ready(function () {
            $('#marital_status').change(function () {
                if (this.value == "single") {
                    $('#check_is_maried').show();
                } else {
                    $('#check_is_maried').hide();
                }

            });
        });
    </script>
    <script></script>
</body>
</html>

