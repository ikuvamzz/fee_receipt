<?php
    require("includes/config/config.php");
    require("includes/header.php");
    include("includes/classes/Institute.php");
    foreach($_SESSION as $key => $val)
    {

        if ($key !== 'username')
        {
          unset($_SESSION[$key]);
        }

    }
?>
    <?php
        $inst_obj = new Institute($db_con);
        $inst = $inst_obj->showInstData();
        if($inst == ""){

        }
        else{
            echo'<div class="container full_width">
            <h3 >Institute Details</h3>
                <form>
                    <label for="inst_name" class="lbl full_half">Name of Institute</label>
                    <label for="inst_city" class="lbl full_half">City</label>
                    <input type="text" id="inst_name" class="input_txt full_half" value="'.$inst['inst_name'].'" disabled>
                    <input type="text" id="inst_city" class="input_txt full_half" value="'.$inst['inst_city'].'" disabled>
                    <label for="inst_add1" class="lbl full_half">Address Line 1</label>
                    <label for="inst_add2" class="lbl full_half">Address Line 2</label>
                    <input type="text" id="inst_add1" class="input_txt full_half" value="'.$inst['inst_add1'].'" disabled>
                    <input type="text" id="inst_add2" class="input_txt full_half" value="'.$inst['inst_add2'].', '.$inst['inst_city'].'" disabled>
                    <label for="inst_dist" class="lbl full_half">District</label>
                    <label for="inst_state" class="lbl full_half">State</label>
                    <input type="text" id="inst_dist" class="input_txt full_half" value="'.$inst['inst_dist'].'" disabled>
                    <input type="text" id="inst_state" class="input_txt full_half" value="'.$inst['inst_state'].'" disabled>
                    <label for="inst_mob1" class="lbl full_half">Mobile 1</label>
                    <label for="inst_mob2" class="lbl full_half">Mobile 2</label>
                    <input type="text" id="inst_mob1" class="input_txt full_half" value="'.$inst['inst_mob1'].'" disabled>
                    <input type="text" id="inst_mob2" class="input_txt full_half" value="'.$inst['inst_mob2'].'" disabled>
                    <label for="inst_head_name" class="lbl full_half">Name of Institute Head</label>
                    <label for="inst_head_desig" class="lbl full_half">Designation</label>
                    <input type="text" id="inst_head_name" class="input_txt full_half" value="'.$inst['inst_head_name'].'" disabled>
                    <input type="text" id="inst_head_desig" class="input_txt full_half" value="'.$inst['inst_head_desig'].'" disabled>
                </form>
            </div>';
        }
        ?>

<?php
    require("includes/footer.php");
?>