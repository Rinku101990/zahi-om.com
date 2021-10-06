<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You For Query</title>
  <style>
    body{background: aliceblue;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;color: #777777;}
    *{margin: 0;padding: 0;}
    a{text-decoration: none !important;}
    .maintable{width: 100%;max-width: 700px;background: #ffffff;margin:30px auto;border:1px solid #dddddd;padding: 1px;}
    .maintable td,.maintable th{border: 1px solid #dddddd;padding: 10px;}
    .maintable table td{border:none;padding: 0px;}
    
  </style>
</head>
<body>
  <table class="maintable" border="1" cellpadding="10">
    <tbody> 
      <tr> 
        <td colspan="12">
          <p style="font-size: 16px; color: #000000; line-height: 24px;" class="usermessege">  Hello, <b><?php echo $user_info->mst_name; ?></b> <br>
            Your password has been successfully reset <br>
            Your admin login detail given below.
          </p>
        </td>
      </tr> 
      <tr>
        <td><b>Your Email ID</b></td>
        <td><?php echo $user_info->mst_email; ?></td>
      </tr>
      <tr>
        <td><b>Your Password</b></td>
        <td><?php echo  $user_info->password; ?></td>
      </tr> 
      <tr>
        <td colspan="12" style="text-align: center;">Do not sharing it with anyone it means give them full access to your admin panel.</td>
      </tr>
    </tbody>
  </table>
</body>
</html>