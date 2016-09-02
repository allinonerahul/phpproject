$(document).ready(function() {
    var $validator = $("#patient_main_form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'error-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        rules: {
            patient_code: {
                required: true,
                remote: {
                        type: 'POST',
                        url: '../admin/checkPatientCode'
                    }
            },
            patient_name: {
                required: true
            },
//            patient_gender: {
//                required: true
//            },
            patient_age: {
                required: true,
                number: true
            },
            patient_height: {
                required: true,
                number: true
            },
            patient_occupation: {
                required: true
            },
            patient_education: {
                required: true
            },
            patient_amount_paid: {
                required: true,
                number: true
            },
            patient_activity_description: {
                required: true
            },
            patient_address: {
                required: true
            },
            patient_weight: {
                required: true,
                number: true
            },
            patient_systolic: {
                required: true,
                number: true
            },
            patient_diastolic: {
                required: true,
                number: true
            },
            patient_bp_level: {
                required: true
            },
            patient_arm: {
                required: true,
                number: true
            },
            patient_wrist: {
                required: true,
                number: true
            },
            patient_chest: {
                required: true,
                number: true
            },
            patient_waist: {
                required: true,
                number: true
            },
            patient_hips: {
                required: true,
                number: true
            },
            patient_face: {
                required: true,
                number: true
            },
            patient_neck: {
                required: true,
                number: true
            },
            patient_biceps: {
                number: true
            },
            patient_triceps: {
                number: true
            },
            patient_subscapular: {
                number: true
            },
            patient_supralliac: {
                number: true
            },
            patient_activity: {
                number: true
            }
        },
        messages: {
            patient_code: {
                required: "Please enter patient code.",
                remote: "Patient Code Already Exist!"
            },
            
            patient_name: {
                required: "Please enter patient name."
            },
//            patient_gender: {
//                required: "Please select patient gender."
//            },
            patient_age: {
                required: "Please enter patient age.",
                number: "Please enter only digits."
            },
            patient_height: {
                required: "Please enter patient height.",
                number: "Please enter in numbers."
            },
            patient_occupation: {
                required: "Please enter patient occupation."
            },
            patient_education: {
                required: "Please enter patient education."
            },
            patient_amount_paid: {
                required: "Please enter patient amount paid.",
                number: "Please enter only digits."
            },
            patient_activity_description: {
                required: "Please enter patient activity."
            },
            patient_address: {
                required: "Please enter patient address."
            },
            patient_weight: {
                required: "Please enter patient weight.",
                digits: "Please enter only Numbers."
            },
            patient_systolic: {
                required: "Please enter patient systolic",
                number: "Please enter only digits."
            },
            patient_diastolic: {
                required: "Please enter patient diastolic.",
                number: "Please enter only digits."
            },
            patient_bp_level: {
                required: "Please enter patient BP level.",
            },
            patient_arm: {
                required: "Please enter patient arm size.",
                number: "Please enter only digits."
            },
            patient_wrist: {
                required: "Please enter patient wrist size.",
                number: "Please enter only digits."
            },
            patient_chest: {
                required: "Please enter patient chest size.",
                number: "Please enter only digits."
            },
            patient_waist: {
                required: "Please enter patient waist size.",
                number: "Please enter only digits."
            },
            patient_hips: {
                required: "Please enter patient hips size.",
                number: "Please enter only digits."
            },
            patient_face: {
                required: "Please enter patient face size.",
                number: "Please enter only digits."
            },
            patient_neck: {
                required: "Please enter patient neck size.",
                number: "Please enter only digits."
            },
            patient_biceps: {
                number: "Please enter only digits."
            },
            patient_triceps: {
                number: "Please enter only digits."
            },
            patient_subscapular: {
                number: "Please enter only digits."
            },
            patient_supralliac: {
                number: "Please enter only digits."
            },
            patient_activity: {
                number: "Please enter only digits."
            }
        },
        errorPlacement: function(error, element) {
            if (element.hasClass("err-element")) {
                error.insertAfter(element.next());
            }
            else {
                error.insertAfter(element);
            }

        },
        highlight: function(element) { // hightlight error inputs
            $(element)
                    .closest('.error-inline').removeClass('ok'); // display OK icon
            $(element)
                    .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
        },
        unhighlight: function(element) {// revert the change done by hightlight
            $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
        }
    });

    var $validator_edit = $("#patient_edit_form").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'error-inline', // default input error message class
        focusInvalid: true, // do not focus the last invalid input
        rules: {
            patient_code: {
                required: true
            },
            patient_name: {
                required: true
            },
//            patient_gender: {
//                required: true
//            },
            patient_age: {
                required: true,
                number: true
            },
            patient_height: {
                required: true,
                number: true
            },
            patient_occupation: {
                required: true
            },
            patient_education: {
                required: true
            },
            patient_amount_paid: {
                required: true,
                number: true
            },
            patient_activity_description: {
                required: true
            },
            patient_address: {
                required: true
            },
            patient_weight: {
                required: true,
                number: true
            },
            patient_systolic: {
                required: true,
                number: true
            },
            patient_diastolic: {
                required: true,
                number: true
            },
            patient_bp_level: {
                required: true
            },
            patient_arm: {
                required: true,
                number: true
            },
            patient_wrist: {
                required: true,
                number: true
            },
            patient_chest: {
                required: true,
                number: true
            },
            patient_waist: {
                required: true,
                number: true
            },
            patient_hips: {
                required: true,
                number: true
            },
            patient_face: {
                required: true,
                number: true
            },
            patient_neck: {
                required: true,
                number: true
            },
            patient_biceps: {
                number: true
            },
            patient_triceps: {
                number: true
            },
            patient_subscapular: {
                number: true
            },
            patient_supralliac: {
                number: true
            },
            patient_activity: {
                number: true
            }
        },
        messages: {
            patient_code: {
                required: "Please enter patient code."
            },
            patient_name: {
                required: "Please enter patient name."
            },
//            patient_gender: {
//                required: "Please select patient gender."
//            },
            patient_age: {
                required: "Please enter patient age.",
                number: "Please enter only digits."
            },
            patient_height: {
                required: "Please enter patient height.",
                number: "Please enter only digits."
            },
            patient_occupation: {
                required: "Please enter patient occupation."
            },
            patient_education: {
                required: "Please enter patient education."
            },
            patient_amount_paid: {
                required: "Please enter patient amount paid.",
                number: "Please enter only digits."
            },
            patient_activity_description: {
                required: "Please enter patient activity."
            },
            patient_address: {
                required: "Please enter patient address."
            },
            patient_weight: {
                required: "Please enter patient weight.",
                digits: "Please enter only Numbers."
            },
            patient_systolic: {
                required: "Please enter patient systolic",
                number: "Please enter only digits."
            },
            patient_diastolic: {
                required: "Please enter patient diastolic.",
                number: "Please enter only digits."
            },
            patient_bp_level: {
                required: "Please enter patient BP level.",
            },
            patient_arm: {
                required: "Please enter patient arm size.",
                number: "Please enter only digits."
            },
            patient_wrist: {
                required: "Please enter patient wrist size.",
                number: "Please enter only digits."
            },
            patient_chest: {
                required: "Please enter patient chest size.",
                number: "Please enter only digits."
            },
            patient_waist: {
                required: "Please enter patient waist size.",
                number: "Please enter only digits."
            },
            patient_hips: {
                required: "Please enter patient hips size.",
                number: "Please enter only digits."
            },
            patient_face: {
                required: "Please enter patient face size.",
                number: "Please enter only digits."
            },
            patient_neck: {
                required: "Please enter patient neck size.",
                number: "Please enter only digits."
            },
            patient_biceps: {
                number: "Please enter only digits."
            },
            patient_triceps: {
                number: "Please enter only digits."
            },
            patient_subscapular: {
                number: "Please enter only digits."
            },
            patient_supralliac: {
                number: "Please enter only digits."
            },
            patient_activity: {
                number: "Please enter only digits."
            }
        },
        errorPlacement: function(error, element) {
            if (element.hasClass("err-element")) {
                error.insertAfter(element.next());
            }
            else {
                error.insertAfter(element);
            }

        },
        highlight: function(element) { // hightlight error inputs
            $(element)
                    .closest('.error-inline').removeClass('ok'); // display OK icon
            $(element)
                    .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
        },
        unhighlight: function(element) {// revert the change done by hightlight
            $(element)
                    .closest('.control-group').removeClass('error'); // set error class to the control group
        }
    });


    $('#form_wizard_1').bootstrapWizard({
        'nextSelector': '.button-next',
        'previousSelector': '.button-previous',
        onTabClick: function(tab, navigation, index) {
//            alert('on tab click disabled');
            return false;
        },
        onNext: function(tab, navigation, index) {

            if ($("#patient_main_form").is(":visible")) {
                var $valid = $("#patient_main_form").valid();
                if (!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
            } else if ($("#patient_edit_form").is(":visible")) {
                var $valid = $("#patient_edit_form").valid();
                if (!$valid) {
                    $validator_edit.focusInvalid();
                    return false;
                }
            }

            var total = navigation.find('li').length;
            var current = index + 1;
            // set wizard title
            $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
            // set done steps
            jQuery('li', $('#form_wizard_1')).removeClass("done");
            var li_list = navigation.find('li');
            for (var i = 0; i < index; i++) {
                jQuery(li_list[i]).addClass("done");
            }

            if (current == 1) {
                $('#form_wizard_1').find('.button-previous').hide();
            } else {
                $('#form_wizard_1').find('.button-previous').show();
            }

            if (current >= total) {
                $('#form_wizard_1').find('.button-next').hide();
                $('#form_wizard_1').find('.button-submit').show();
            } else {
                $('#form_wizard_1').find('.button-next').show();
                $('#form_wizard_1').find('.button-submit').hide();
            }
//        App.scrollTo($('.page-title'));
        },
        onPrevious: function(tab, navigation, index) {
            var total = navigation.find('li').length;
            var current = index + 1;
            // set wizard title
            $('.step-title', $('#form_wizard_1')).text('Step ' + (index + 1) + ' of ' + total);
            // set done steps
            jQuery('li', $('#form_wizard_1')).removeClass("done");
            var li_list = navigation.find('li');
            for (var i = 0; i < index; i++) {
                jQuery(li_list[i]).addClass("done");
            }

            if (current == 1) {
                $('#form_wizard_1').find('.button-previous').hide();
            } else {
                $('#form_wizard_1').find('.button-previous').show();
            }

            if (current >= total) {
                $('#form_wizard_1').find('.button-next').hide();
                $('#form_wizard_1').find('.button-submit').show();
            } else {
                $('#form_wizard_1').find('.button-next').show();
                $('#form_wizard_1').find('.button-submit').hide();
            }

//        App.scrollTo($('.page-title'));
        },
        onTabShow: function(tab, navigation, index) {
            var total = navigation.find('li').length;
            var current = index + 1;
            var $percent = (current / total) * 100;
            $('#form_wizard_1').find('.bar').css({
                width: $percent + '%'
            });
        }
    });

    $('#form_wizard_1').find('.button-previous').hide();
    $('#form_wizard_1 .button-submit').click(function() {
//        alert('Finished!');
    }).hide();
});
   
