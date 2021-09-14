<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
        $_SESSION['v'] = false;
        // OTP Verification
        function FetchOtp($phoneNumber)
        {
            $manager = new MongoDB\Driver\Manager("mongodb+srv://greenlentils:lqNkeoF8KkERUazS@cluster0.oxoik.mongodb.net/");

            $query = new MongoDB\Driver\Query(['phone' => $phoneNumber]);

            $cursor = $manager->executeQuery('production.managedcart', $query);

            foreach ($cursor as $document)
            {
                return $document->orderNum;
            }

        }

$a = FetchOtp('919930441095');
echo $a;
?>


</body>
</html>