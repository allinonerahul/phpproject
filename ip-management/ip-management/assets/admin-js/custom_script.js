
/*************************  Form Wizard Script *********************************/



$('.gender-checkbox').bootstrapSwitch();
$('.smoke-checkbox').bootstrapSwitch();
$('.alcohol-checkbox').bootstrapSwitch();
$('.vegetarian-checkbox').bootstrapSwitch();
$('.married-checkbox').bootstrapSwitch();
$('.weakness-checkbox').bootstrapSwitch();
$('.giddiness-checkbox').bootstrapSwitch();
$('.hair_loss-checkbox').bootstrapSwitch();
$('.joint_pains-checkbox').bootstrapSwitch();
$('.appetite-checkbox').bootstrapSwitch();
$('.hypertension-checkbox').bootstrapSwitch();
$('.diabetes_melitus-checkbox').bootstrapSwitch();
$('.severe_obesity-checkbox').bootstrapSwitch();
$('.cvd_pvd-checkbox').bootstrapSwitch();
$('.chd-checkbox').bootstrapSwitch();
$('.acidic_reaction-checkbox').bootstrapSwitch();


/*************************  Form Wizard Script *********************************/




/*************************  Form Wizard Script *********************************/

$('.sidebar-toggler').click(function() {
    if ($('#sidebar > ul').is(":visible") === true) {
        $('#main-content').animate({
            'margin-left': '25px'
        });

        $('#sidebar').animate({
            'margin-left': '-190px'
        }, {
            complete: function() {
                $('#sidebar > ul').hide();
                $("#container").addClass("sidebar-closed");
            }
        });
    } else {
        $('#main-content').animate({
            'margin-left': '215px'
        });
        $('#sidebar > ul').show();
        $('#sidebar').animate({
            'margin-left': '0'
        }, {
            complete: function() {
                $("#container").removeClass("sidebar-closed");
            }
        });
    }
});