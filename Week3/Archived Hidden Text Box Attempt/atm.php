<?php
    $checkingBal = filter_input (INPUT_POST, 'checkingHidden') != NULL ? filter_input (INPUT_POST, 'checkingHidden') : 1000.00;
    $savingsBal = filter_input (INPUT_POST, 'savingsHidden')  != NULL ? filter_input (INPUT_POST, 'savingsHidden') : 5000.00;

    if(count($_POST)!=0)
    {
        if(isset($_POST["chckWithdrawTxt"]) && $_POST["chckWithdrawTxt"] != "")
            $checkingBal -= $_POST["chckWithdrawTxt"];
        if(isset($_POST["chckDepositTxt"])  && $_POST["chckDepositTxt"] != "")
            $checkingBal += $_POST["chckDepositTxt"];
        if(isset($_POST["savingWithdrawTxt"]) && $_POST["savingWithdrawTxt"] != "")
            $savingsBal -= $_POST["savingWithdrawTxt"];
        if(isset($_POST["savingDepositTxt"]) && $_POST["savingDepositTxt"] != "")
            $savingsBal += $_POST["savingDepositTxt"];
    }

    require 'atm.view.php';
    