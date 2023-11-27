<?php require("top.php"); ?>
<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$postdata=array("model" => "gpt-3.5-turbo",
"messages" => [
    [
        "role" => "user",
        "content" => "www stand for"
    ]
],
"temperature" => 1,
"max_tokens" => 256,
"top_p" => 1,
"frequency_penalty" => 0,
"presence_penalty" => 0);
$postdata=json_encode($postdata);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Authorization: Bearer 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';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result=json_decode($result,true);
echo '<pre>';
print_r($result);
?>
<style>
    fieldset {
        border: 2px solid black;
        border-radius: 5px;
        padding: 20px;
    }
</style>
<!-- Search Input & Button Section Start -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group">
                <form action="">   
                    <input type="text" class="form-control" placeholder="Search any thing...">
                    <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Input & Button Section End -->

<div class="container">
<fieldset>
        <p></p>  
    </fieldset>
</div>

<?php require("footer.php"); ?>
