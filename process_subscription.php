<?php
// JSON file path storing codes (Make sure the JSON file is writable and exists in the same directory)
$jsonFile = __DIR__ . '/codes.json'; // Use absolute path

// Read JSON file containing verification codes
$codes = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pack = $_POST['pack'] ?? '';

    if ($pack == 'regular') {
        // Redirect to payment.html for regular pack using JavaScript
        echo "<script>
                alert('You selected the Regular Pack. Redirecting to payment...');
                window.location.href = 'payment.html';
              </script>";
        exit;
    } 
    elseif ($pack == 'student') {
        $studentEmail = trim($_POST['studentEmail'] ?? '');
        $organization = trim($_POST['organization'] ?? '');

        // Check if email ends with .edu
        if (!str_ends_with($studentEmail, '.edu')) {
            echo "<script>
                    alert('Please provide a valid .edu email address.');
                    window.location.href = 'subscription.html';
                  </script>";
            exit;
        }

        // Verify the code if provided
        if (isset($_POST['verificationCode'])) {
            $verificationCode = $_POST['verificationCode'];

            // Check if the code matches
            if (!isset($codes[$studentEmail]) || (string)$codes[$studentEmail] !== (string)$verificationCode) {
                echo "<script>
                        alert('Enter the correct code that was sent to you.');
                        window.history.back();
                      </script>";
                exit;
            }

            // Redirect to payment.html if the code is correct
            echo "<script>
                    alert('Verification successful! Redirecting to payment...');
                    window.location.href = 'payment.html';
                  </script>";
            exit;
        } else {
            // Generate a verification code and store it in JSON
            $code = rand(1000, 9999);
            $codes[$studentEmail] = $code;

            if (file_put_contents($jsonFile, json_encode($codes, JSON_PRETTY_PRINT)) === false) {
                echo "<script>
                        alert('Unable to save the verification code. Please try again.');
                        window.location.href = 'subscription.html';
                      </script>";
                exit;
            }

            // Simulate sending the code to the email (Replace with actual email logic in production)
            echo "<script>
                    alert('A verification code has been sent to your email: $studentEmail');
                  </script>";

            // Show the verification code form
          // Show the verification code form
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Verify Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        input[type='text'] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 20px;
            font-size: 16px;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .btn-back {
            background: #6c757d;
        }

        .btn-back:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Verify Your Code</h2>
        <form method='post' action='process_subscription.php'>
            <input type='hidden' name='pack' value='student'>
            <input type='hidden' name='studentEmail' value='$studentEmail'>
            <input type='hidden' name='organization' value='$organization'>
            <label for='verificationCode'>Enter the verification code sent to $studentEmail:</label>
            <input type='text' id='verificationCode' name='verificationCode' placeholder='Enter code' required>
            <button type='submit'>Verify</button>
            <button type='button' class='btn-back' onclick=\"window.location.href='subscription.html'\">Back</button>
        </form>
    </div>
</body>
</html>";

            exit;
        }
    } else {
        echo "<script>
                alert('You selected the Regular Pack. Redirecting to payment...');
                window.location.href = 'payment.html';
              </script>";
        exit;
    }
}
?>
