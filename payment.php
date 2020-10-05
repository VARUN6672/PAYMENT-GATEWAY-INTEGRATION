<?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $amount=$_POST['amount'];
    $mobile=$_POST['mobile'];
    $purpose='Donation';
    
    include 'instamojo/instamojo.php';
    $api = new Instamojo\Instamojo('test_a6661f175d7870cad52f432975e', 'test_aacfa8218a8fe12d8d8cd5d501b', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $amount,
            "send_email" => true,
            "email" => $email,
            "buyer_name" =>$name,
            "phone"=>$mobile,
            "send_sms" => true,
            "allow_repeated_payments" =>false,
            "redirect_url" =>"http://paymentgatewayintegration.epizy.com/paymentsuccess.html"
            )
        );
        $pay_url=$response['longurl'];
        header("location: $pay_url");
    	}
    	catch (Exception $e) {
    	    print('Error: ' . $e->getMessage());
    	}
?>
