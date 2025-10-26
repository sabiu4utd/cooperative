<html lang="en">
<?php //echo $loan[0]->id; exit; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 21cm;
            height: 29.7cm;
            margin: 15mm 45mm 30mm 20mm;
            /* change the margins as you want them to be. */
        }
    </style>
</head>

<body style="border: 0.5px solid silver; margin:auto; height:auto; padding:30px">
    <!-- <img src="<?php echo base_url('assets/images/fubk-icon.png') ?>" alt="FUBK Logo" style="width: 150px; float:left"> -->
    <center>
        <span style="text-align:center; font-size:25pt; font-family: stencil;">STAFF MULTIPURPOSE COOPERATIVE SOCIETY</span><br />
        <span style="text-align:center; font-size:20pt">
           Federal University Birnin Kebbi</span><br />
        <span style="text-align:center; font-size:15pt">P.M.B 1157, KEBBI STATE NIGERIA</span>
    </center>
    <br />
    <br />
    <br />

  
<br>
    <span style="font-family:tahoma; font-size:15pt">
        <table>
        <tr><td><b>The Chairman</b></td></tr>
        <tr><td><b>Staff Multipurpose Cooperative Society:</b></td></tr>
        <tr><td><b>Federal University Birnin Kebbi:</b></tr>
        <tr><td><b>To</b></td></tr>
        <tr><td><b><?php echo $_SESSION['fname']." ".$_SESSION['sname']." ".$_SESSION['oname']; ?></b></td></tr>
        <tr><td><b>Federal University Birnin Kebbi</b></tr>
        </table>
        
    </span>
<br />

       
        <br />
        <h3 style="text-decoration: underline; text-align: center;">RE: LOAN APPLICATION</h3>

        <p style="text-align:justify; font-size:14pt">We are highly pleased to inform you that your application for a  <?php if($loan[0]->type == 11){ echo " Long Term Loan"; } else { echo "Main Supply"; } ?> of  <strong>N<?php echo $loan[0]->amount; ?></strong> has been approved by the SMCS. <strong>the repayment period of the loan is <?php echo $loan[0]->repayment_period; ?> months i.e. (<?php echo $loan[0]->repayment_period/12; ?> Years)</strong> 

I hereby request you to please come by at our office to meet our Loan Officer, Mr. Sabiu Lawal , anytime during working hours from Monday to Friday to complete all the formalities so that the loan amount can be credited to your account.

Looking forward to see you.</p> <br />
Thank you <br />
Regards <br />

<br /><br /><br />
        __________________ <br>Manager Signature


    </div>

</body>

</html>