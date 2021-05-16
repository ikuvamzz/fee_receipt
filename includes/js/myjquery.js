$(document).ready(function() {
    $('input').focus(function(){
        $(this).attr('autocomplete','off');
    });
    $(this).delay(3000).queue(function() {
        $('.error').slideUp();
        $('.container').animate({
            top: 110
        }, 'slow');
    });
    $('.btn_reset').on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, '1000');
        $('.btn_reset').delay(1500).queue(function() {
            location.reload(true);
        });
    });
    $("input[type=text].ws-date").keyup(function (e) {
        var textSoFar = $(this).val();
        if (e.keyCode != 191) {
            if (e.keyCode != 8) {
                if (textSoFar.length == 2 || textSoFar.length == 5) {
                    $(this).val(textSoFar + "/");
                }

                    //to handle copy & paste of 8 digit
                else if (e.keyCode == 86 && textSoFar.length == 8) {
                    $(this).val(textSoFar.substr(0, 2) + "/" + textSoFar.substr(2, 2) + "/" + textSoFar.substr(4, 4));
                }
            }
            else {
                //backspace would skip the slashes and just remove the numbers
                if (textSoFar.length == 5) {
                    $(this).val(textSoFar.substring(0, 4));
                }
                else if (textSoFar.length == 2) {
                    $(this).val(textSoFar.substring(0, 1));
                }
            }
        }
        else {
            //remove slashes to avoid 12//01/2014
            $(this).val(textSoFar.substring(0, textSoFar.length - 1));
        }
    });

    //only numeric keys allowed in date field
    $(".ws-date").keypress(function(e){
        var keyCode = e.which;
        /*
        8 - (backspace)
        32 - (space)
        48-57 - (0-9)Numbers
        */
        if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) { 
          return false;
        }
      });

      $("#name").keypress(function(e){
        var keyCode = e.which;

        /* 
        48-57 - (0-9)Numbers
        65-90 - (A-Z)
        97-122 - (a-z)
        8 - (backspace)
        32 - (space)
        */
        // Not allow special 
        if ( !( (keyCode >= 48 && keyCode <= 57) 
          ||(keyCode >= 65 && keyCode <= 90) 
          || (keyCode >= 97 && keyCode <= 122) ) 
          && keyCode != 8 && keyCode != 32) {
          e.preventDefault();
        }
      });
    $(".ws-date").blur(function(){
        var date = $(this).val();
        if(date.length != 10 && date.length != 0){
            alert("Please enter a valid date format (dd/mm/yyyy)");
        }
    });

});
