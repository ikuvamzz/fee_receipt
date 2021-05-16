<?php
    function num_alpha_class($class){
        switch($class){
            case 0: $class = "Nur/LKG/UKG"; break;
            case 1: $class = "1st"; break;
            case 2: $class = "2nd"; break;
            case 3: $class = "3rd"; break;
            case 4: $class = "4th"; break;
            case 5: $class = "5th"; break;
            case 6: $class = "6th"; break;
            case 7: $class = "7th"; break;
            case 8: $class = "8th"; break;
            case 9: $class = "9th"; break;
            case 10: $class = "10th"; break;
            case 11: $class = "11th"; break;
            case 12: $class = "12th"; break;
        }
        echo $class;
    }
    function alpha_num_class($class){
        switch($class){
            case 'Nur/LKG/UKG': $class = 0; break;
            case '1st': $class = 1; break;
            case '2nd': $class = 2; break;
            case '3rd': $class = 3; break;
            case '4th': $class = 4; break;
            case '5th': $class = 5; break;
            case '6th': $class = 6; break;
            case '7th': $class = 7; break;
            case '8th': $class = 8; break;
            case '9th': $class = 9; break;
            case '10th': $class = 10; break;
            case '11th': $class = 11; break;
            case '12th': $class = 12; break;
            default: "Class not selected!";
        }
        echo $class;
    }
    function num_alpha_month($month){
        switch($month){
            case 0: $month = "Admission"; break;
            case 1: $month = "January"; break;
            case 2: $month = "February"; break;
            case 3: $month = "March"; break;
            case 4: $month = "April"; break;
            case 5: $month = "May"; break;
            case 6: $month = "June"; break;
            case 7: $month = "July"; break;
            case 8: $month = "August"; break;
            case 9: $month = "September"; break;
            case 10: $month = "October"; break;
            case 11: $month = "November"; break;
            case 12: $month = "December"; break;
            default: "Please Select Month!";
        }
        return $month;
    }

    function num_alpha_month_short($month){
        switch($month){
            case 0: $month = "Adms"; break;
            case 1: $month = "Jan"; break;
            case 2: $month = "Feb"; break;
            case 3: $month = "Mar"; break;
            case 4: $month = "Apr"; break;
            case 5: $month = "May"; break;
            case 6: $month = "Jun"; break;
            case 7: $month = "Jul"; break;
            case 8: $month = "Aug"; break;
            case 9: $month = "Sep"; break;
            case 10: $month = "Oct"; break;
            case 11: $month = "Nov"; break;
            case 12: $month = "Dec"; break;
            default: "Please Select Month!";
        }
        return $month;
    }

?>