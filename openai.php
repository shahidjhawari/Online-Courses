<?php require("top.php"); ?>

<?php
if (isset($_POST['submit'])) {
    $ch = curl_init();
    $str = $_POST['str'];

    $postdata = array(
        "model" => "gpt-3.5-turbo",
        "messages" => [
            [
                "role" => "user",
                "content" => "$str"
            ]
        ],
        "temperature" => 1,
        "max_tokens" => 1400,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0
    );
    $postdata = json_encode($postdata);

    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

    $headers = array(
        'Content-Type: application/json',
        'Authorization: Bearer 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'
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }

    curl_close($ch);
    $result = json_decode($result, true);
    $data = $result['choices'][0]['message']['content'];  
}
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
                <form action="" method="post">
                    <input type="text" class="form-control" name="str" placeholder="Search anything..." required>
                    <button class="btn btn-outline-secondary" type="submit" name="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Search Input & Button Section End -->

<div class="container">
    <fieldset>
        <?php
        if (!isset($data)) {
            echo "No data";
        } else {
            echo "<p>$data</p>";
        }
        ?>
    </fieldset>
</div>

<?php require("footer.php"); ?>

