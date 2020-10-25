<?php
    session_start();
    $checkingBal = isset($_SESSION['checkingBal']) ? $_SESSION['checkingBal'] : 1000.00;
    $savingsBal = isset($_SESSION['savingsBal']) != 0 ? $_SESSION['savingsBal'] : 5000.00;
    
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
        $_SESSION['checkingBal'] = $checkingBal;
        $_SESSION['savingsBal'] = $savingsBal;
    }

    require 'atm.view.php';