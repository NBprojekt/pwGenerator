<?php 

print $_POST['htmCode'];
// Set parameters
$apikey = 'b7fee2e8-f4e2-441f-8b86-cd72859c7f45';
$value = $_POST['htmCode']; 
 
$result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($value) . "&OutputFormat=jpg");
file_put_contents('password_list.jpg', $result); 
?>
<!-- Download the jpg -->
<style> #div {
    margin:auto; text-align:center; margin-top:15px;
    font-family: "Times, serif";font-size:200%;width:700px;
}
</style><br>
<div id="div"> <a href="password_list.jpg" download> Download your Passwordlist </a></div>