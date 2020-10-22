<?php
    $checkingBal = isset($_POST["chckWithdrawTxt"]) || isset($_POST["chckDepositTxt"]) ? filter_input (INPUT_POST, 'checkingHidden') : 1000.00;
    $savingsBal = isset($_POST["savingWithdrawTxt"]) || isset($_POST["savingDepositTxt"]) ? filter_input (INPUT_POST, 'savingsHidden') : 5000.00;
    
    /*In 100% of cases these values are null, even if I rearrange the code
    even if I use INPUT_GET instead of INPUT_POST*/
    var_dump(filter_input (INPUT_GET, 'checkingHidden'));
    var_dump(filter_input (INPUT_POST, 'savingsHidden'));
    
    if(count($_POST)!=0)
    {
        if(isset($_POST["chckWithdrawTxt"]))
            $checkingBal -= $_POST["chckWithdrawTxt"];
        if(isset($_POST["chckDepositTxt"]))
            $checkingBal += $_POST["chckDepositTxt"];
        if(isset($_POST["savingWithdrawTxt"]))
            $savingsBal -= $_POST["savingWithdrawTxt"];
        if(isset($_POST["savingDepositTxt"]))
            $savingsBal += $_POST["savingDepositTxt"];
    }

    require 'atm.view.php';

    var_dump(filter_input (INPUT_POST, 'checkingHidden'));
    var_dump(filter_input (INPUT_GET, 'savingsHidden'));
    