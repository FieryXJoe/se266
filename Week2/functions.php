<?php
    $fName = $lName = $highBP = $diabetes = $heartCondition = "";
    $married =  false;
    $birthDate= null;
    $feet = $inches = $weight = -1;

    function age ($bdate) 
    {
        $date = new DateTime($bdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    function isDate($dt) 
    {
        try {
            $d = new DateTime($dt);
            return (true);
        } catch(Exception $e) {
            return false;
        }
    }

    function bmi ($ft, $inch, $weight)
    {
        $heightInMeters = (($ft * 12) + $inch) * 0.0254;
        $weightInKilos = $weight / 2.20462;
        return $weightInKilos / ($heightInMeters * $heightInMeters);
    }

    function bmiDescription ($bmi) 
    {
        if($bmi < 18.5)
            return "Underwieght";
        else if($bmi < 25)
            return "Normal Weight";
        else if($bmi < 30)
            return "Overweight";
        else
            return "Obese";
    }

    function isEmpty($str)
    {
        return $str == null || $str == "";
    }

    function isMarriedEmpty()
    {
        return !isset($_POST["married"]);
    }
    //Used for weight 
    function isValidWeight($num)
    {
        return $num != null && $num > 0;
    }
    //Used for ft & inches
    function isValidHeight($num)
    {
        return $num > -1 && $num < 12;
    }

    /*
        Processess and stores all vars, flag toggles to false if any required field is empty
        All but conditions use temp variable for storing _POST data, 
    */
    function submitClick()
    {
        $flag = true;

        $temp = $_POST["birth_date"];
        if(isDate($temp))
            $birthDate = $temp;
        else
            $flag = false;
        $temp = $_POST["first_name"];
        if(!isEmpty($temp))
            $fName = $temp;
        else
            $flag = false;
        $temp = $_POST["last_name"];
        if(!isEmpty($temp))
            $lName = $temp;
        else
            $flag = false;
        //Skipped temp on this one cause of how I wrote the function for date
        if(!isMarriedEmpty())
            $married = $_POST["married"];
        else
            $flag = false;

        /*
            Removed this because it was counter productive, if heart condition only one selected it would store it in
            highBP, doing a foreach on conditions array at output is far easier than storing them in vars
        if(isset($_POST["conditions"]))
        {
            $highBP = $_POST["conditions"][0];
            $diabetes = $_POST["conditions"][1];
            $heartCondition = $_POST["conditions"][2];
        }*/
        $temp = $_POST["ft"];
        if(isValidHeight($temp))
            $feet = $temp;
        else
            $flag = false;
        $temp = $_POST["inches"];
        if(isValidHeight("inches"))
            $inches = $temp;
        else
            $flag = false;
        $temp = $_POST["weight"];
        if(isValidWeight($temp))
            $weight = $temp;
        else
            $flag = false;

        if($flag)
        {
            //TODO:: Clear form
            ?> 
                <script type="text/javascript">
                    document.getElementById('inputForm').style.display = 'none';
                </script>
            <?php

            echo $fName . "<br />";
            echo $lName . "<br />";
            echo ($married == false ? "Not " : "") . "Married<br />";
            echo $birthDate . "<br />";
            echo $feet . "<br />";
            echo $inches . "<br />";
            echo $weight . "<br />";
            
            if(isset($_POST["conditions"]))
                foreach($_POST["conditions"] as $value)
                    echo $value . "<br />";
        }
        else
        {
            //TODO:: Dont change pages or something idk
        }
    }
    //checks if set and returns the response to the field
    //Day2: May not even need this function at all
    function getFormField($name)
    {
        if(isset($_POST[$name]))
            return $_POST[$name];
        else
            return NULL;//TODO:: Figure out what to return here
    }
