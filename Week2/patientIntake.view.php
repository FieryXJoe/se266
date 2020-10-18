<!DOCTYPE html>
<html>
<head>
    <style>
        label{
            font-weight:bold;
            float:left;
            margin-right:15px;
        }
    </style>
</head>
<body>
<form name="patient" method="post" action="patientIntake.php" id="inputForm">
        <div class="wrapper">
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="first_name" value="">
            </div>
            <br />
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="last_name" value="">
            </div>
            <br />
            <div class="label">
                <label>Married:</label>
            </div>
            <div>
                <input type="radio" name="married" value="yes">Yes
                <input type="radio" name="married" value="no">No
            </div>
            <br />
            <div class="label">
                <label>Conditions:</label>
            </div>
            <div>
                <input type="checkbox" name="conditions[]" value="High Blood Pressure">
                    High Blood Pressure
                <input type="checkbox" name="conditions[]" value="Diabetes">
                    Diabetes
                <input type="checkbox" name="conditions[]" value="Heart Condition">
                    Heart Condition
            </div>
            <br />
            <div class="label">
                <label>Birth Date:</label>
            </div>
            <div>
                <input type="date" name="birth_date" value="">
            </div>
            <br />
            <div class="label">
                <label>Height:</label>
            </div>
            <div>
            Feet: <input type="text" name="ft" value="" style="width:40px;">
            Inches: <input type="text" name="inches" value="0" style="width:40px;">
            </div>
            <br />
            <div class="label">
                <label>Weight (pounds):</label>
            </div>
            <div>
                <input type="text" name="weight" value="" style="width:40px;">
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <input type="submit" name="storePatient" value="Store Patient Information">
            </div>
        </div>       
    </form>
    <?php
        if(isset($_POST['storePatient']))
            submitClick();
    ?>
</body>
</html>