var income = document.querySelector("#income");

// tax relief details
var is_disable = document.querySelector("#is_disable");
var marital_status = document.querySelector("#marital_status");
var is_hus_wife_disable = document.querySelector("#is_hus_wife_disable");
var is_hus_wife_work = document.querySelector("#is_hus_wife_work");
var pay_former_wife = document.querySelector("#pay_former_wife");
var have_child = document.querySelector("#have_child");


// child details
var child_u_18_o = document.querySelector("#child_u_18_o");
var child_abv_18_o = document.querySelector("#child_abv_18_o");
var child_abv_18_dip_o = document.querySelector("#child_abv_18_dip_o");
var child_dis_o = document.querySelector("#child_dis_o");
var child_dis_abv_18_dip_o = document.querySelector("#child_dis_abv_18_dip_o");

var child_edu_save = document.querySelector("#child_edu_save");
var breastfeed = document.querySelector("#breastfeed");
var kindergartens = document.querySelector("#kindergartens");

// parent details
var parent_med = document.querySelector("#parent_med");

// other details
var annuity = document.querySelector("#annuity");
var edu_med_ins = document.querySelector("#edu_med_ins");
var edu_fees = document.querySelector("#edu_fees");
var support_equipment = document.querySelector("#support_equipment");
var med_expenses = document.querySelector("#med_expenses");
var epf_kwsp = document.querySelector("#epf_kwsp");
var insurance = document.querySelector("#insurance");
var lifestyle = document.querySelector("#lifestyle");
var lifestyle_add = document.querySelector("#lifestyle_add");
var lifestyle_sport = document.querySelector("#lifestyle_sport");
var socso = document.querySelector("#socso");
var travel = document.querySelector("#travel");
var pcb = document.querySelector("#pcb");
var zakat = document.querySelector("#zakat");

var calculateBtn = document.querySelector(" .calculate-btn");

// ci = chargeable income
const ci = [5000, 15000, 15000, 15000, 20000, 30000, 150000, 150000, 200000, 400000, 1000000, 2000000]
const ci_sum = [5000, 20000, 35000, 50000, 70000, 100000, 250000, 400000, 600000, 1000000, 2000000, 4000000, 600000.0]

const rate = [0, 0.01, 0.03, 0.08, 0.13, 0.21, 0.24, 0.245, 0.25, 0.26, 0.28, 0.30]
const ci_rate = [0, 150.0, 450.0, 1200.0, 2600.0, 6300.0, 36000.0, 36750.0, 50000.0, 104000.0, 280000.0, 600000.0]

// auto calculate input value into ouput field without click on submit button
function child_u_18(value){document.getElementById('child_u_18_o').value = value*2000;}
function child_abv_18(value){document.getElementById('child_abv_18_o').value = value*2000;}
function child_abv_18_dip(value){document.getElementById('child_abv_18_dip_o').value = value*8000;}
function child_dis(value){document.getElementById('child_dis_o').value = value*6000;}
function child_dis_abv_18_dip(value){document.getElementById('child_dis_abv_18_dip_o').value = value*14000;}
function annually(value){document.getElementById('annualli').value = value*12;}


function add(){
    var total =  0;
        for(var i=0; i<arguments.length; i++){
            const args = arguments[i].value;
            if (args==="") {
                args = 0 ;
            }
            total += parseInt(args);
        }
    return total;
};

//  check input value if exceed the max input requirement 
function max(id) {
    $(id).change(function() {
       var max = parseInt($(this).attr('max'));
       if ($(this).val() > max){$(this).val(max);}
    });
    return $(this).val(max);
};
max("#parent_med");
max("#annuity");
max("#edu_med_ins");
max("#edu_fees");
max("#support_equipment");
max("#med_expenses");
max("#epf_kwsp");
max("#insurance");
max("#lifestyle");
max("#lifestyle_add");
max("#lifestyle_sport");
max("#socso");
max("#travel");

function sum_of_list(l, n) {
    let sum = 0;
    
    for (let i = 0; i < l.length; i++) {
        if (i < n){
            sum += l[i];
        }
    }
    return sum;
}

function tax_amount(taxable_income) {
    let current_taxable_income = 0;
    let index = 0;

    for (let i = 0; i < ci_sum.length; i++) {
        if (ci_sum[i]<=taxable_income) {
            index +=1;
            current_taxable_income = ci_sum[i];
            console.log("current tax amount = ",current_taxable_income);
        }
    }

    let last_ci_rate = (taxable_income - current_taxable_income) * rate[index];
    let taxamount = sum_of_list(ci_rate, index);
    let newtaxamount = last_ci_rate + taxamount;
    return newtaxamount;
}

function change_value(name, value) {
    if (name == "husorwife_disable") {
        if (value=="yes") {
            document.getElementById("is_hus_wife_disabel").value = 5000;
        }
        else  {
            document.getElementById("is_hus_wife_disabel").value = 0;
        }
    }
    if (name == "husorwife_work") {
        if (value=="yes") {
            document.getElementById("is_work").value = 0;
            $('#pay_former_wife').show();
        }
        else  {
            document.getElementById("is_work").value = 4000;
            $('#pay_former_wife').hide();
        }
    }
    if (name == "child") {
        let myStringArray  = ["#c", "#cd", "#l18", "#m18", "#ma18", "#dc", "#ndc", "#ndca", "#cedus", "#bfe", "#kind"]

        if (value=="yes") {
            for (let index = 0; index < myStringArray .length; index++) {
                $(myStringArray[index]).show();
                
            }
            $('#has_child').show();
        }
        else  {
            for (let index = 0; index < myStringArray .length; index++) {
                $(myStringArray[index]).hide();
                
            }
            $('#has_child').hide();
        }
    }
}



$(document).ready(function () {
    $('#marital_status').change(function () {
        if (this.value == "single") {
            $('#check_is_maried').hide();
            $('#check_is_maried').hide();
            $('#husorwife_work').hide();
            $('#pay_former_wife').hide();
            $('#has_child').hide();
            $('#child').hide();
        } else {
            $('#check_is_maried').show();
            $('#husorwife_work').show();
            // $('#pay_former_wife').show();
            $('#child').show();
            $('#has_child').hide();
        }

    });
});
 




calculateBtn.addEventListener("click", () => {
    let Individual_Spouse_Relief = 9000;
    let Child_Relief = add(child_u_18_o,child_abv_18_o,child_abv_18_dip_o,child_dis_o,child_dis_abv_18_dip_o,child_edu_save,breastfeed,kindergartens);
    let Parent_Relief = add(parent_med);
    let Other_Relief =  add(annuity,edu_med_ins,edu_fees,support_equipment,med_expenses,epf_kwsp,insurance,lifestyle,lifestyle_add,lifestyle_sport,socso,travel);
    let tax_deduction = Child_Relief+Parent_Relief+Other_Relief
    console.log(tax_deduction)
    tax_deduction = tax_deduction + Individual_Spouse_Relief;

    console.log(Child_Relief,Parent_Relief,Other_Relief)
    let taxable_income = income.value - tax_deduction;
    console.log("taxable_income",taxable_income)
    
    let current_tax_amount = tax_amount(taxable_income);
    let taxable_should_pay = current_tax_amount - zakat.value - pcb.value;
    
    // console.log(output);

    // print output in HTML
    document.getElementById("Child_Relief").innerHTML = Child_Relief;
    document.getElementById("Parent_Relief").innerHTML = Parent_Relief;
    document.getElementById("Other_Relief").innerHTML = Other_Relief;
    document.getElementById("zakat").innerHTML = zakat;
    document.getElementById("Other_Relief").innerHTML = Other_Relief;
    document.getElementById("taxable_income").innerHTML = taxable_income;
    document.getElementById("tax_amount").innerHTML = current_tax_amount;
    document.getElementById("taxable_should_pay").innerHTML = taxable_should_pay;
    // tax_amount(income.value);
    // console.log()
});

$(document).ready(function () {
    $(".calculator").addClass("active");
});

