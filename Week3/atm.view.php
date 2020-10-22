<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            margin-left:100px;
        }
        td{
            border:1px solid black;
            padding:15px;
        }
        input{
            margin-bottom:10px;
            max-width:80px;
        }
        ul{
            margin-left:-25px;
        }
    </style>
</head>
<body>
    <h1>ATM</h1>
    <table id="accounts">
        <tr>
            <td>
                <h2>Checking Account</h2>
                <ul>
                    <li>Account ID: C123</li>
                    <li>Balance: $<?=number_format($checkingBal , 2)?></li>
                    <li>Account Opened: 12-20-2019</li>
                </ul>
                <form id="chckWithdraw" method="post">
                    <input type="text" id="chckWithdrawTxt" name="chckWithdrawTxt">
                    <input type="submit" value="Withdraw" id="chckWithdrawBtn">
                </form>
                <form id="chckDeposit" method="post">
                    <input type="text" id="chckDepositTxt" name="chckDepositTxt">
                    <input type="submit" value="Deposit" id="chckDepositBtn">
                </form>
            </td>
            <td>
                <h2>Savings Account</h2>
                <ul>
                    <li>Account ID: S123</li>
                    <li>Balance: $<?=number_format($savingsBal , 2)?></li>
                    <li>Account Opened: 03-20-2020</li>
                </ul>
                <form id="savingWithdraw" method="post">
                    <input type="text" id="savingWithdrawTxt" name="savingWithdrawTxt">
                    <input type="submit" value="Withdraw" id="savingWithdrawBtn">
                </form>
                <form id="savingDeposit" method="post">
                    <input type="text" id="savingDepositTxt" name="savingDepositTxt">
                    <input type="submit" value="Deposit" id="savingDepositBtn">
                </form>
            </td>
        </tr>
    </table>
    <!--
    <form method="post">
        Will hide these once everything is working
        <input type="text" id="checkingHidden" name="checkingHidden" value = "<?=$checkingBal?>" />
        <input type="text" id="savingsHidden" name="savingsHidden" value ="<?=$savingsBal?>" />
    </form>
    -->
</body>