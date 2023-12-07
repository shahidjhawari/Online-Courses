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
        "max_tokens" => 2000,
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
        margin-bottom: 20px;
        background-color: #2d3436;
        color: white;
        font-size: 20px;
    }
    span {
        color: orangered;
        text-align: center;
    }
    #openaibackspan {
        color: greenyellow;
    }
    .btn-group {
        align-items: center;
    }
</style>

<!-- Search Input & Button Section Start -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
            <div class="input-group">
                    <input type="text" class="form-control" placeholder="give me prompt..." name="str" id="openaiinput">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="openaibtn">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </form>
            <span id="openaispan"></span>
            <span id="openaibackspan"></span>
        </div>
    </div>
</div>
<!-- Search Input & Button Section End -->

<div class="container">
    <fieldset id="content">
        <?php
        if (!isset($data)) {
            echo "Your content goes here...";
        } else {
            echo "<p>$data</p>";
        }
        ?>
    </fieldset>
    <div class="btn-group">
    <button class="btn btn-outline-secondary" id="clone"><i class="fas fa-clone" title="Copy All Text"></i></button>
    <button class="btn btn-outline-secondary" id="remove"><i class="fas fa-times" title="Remove Text"></i></button>
    </div>
    
</div>



<script>
    var target = document.querySelector("#openaispan");
    var target2 = document.querySelector("#openaibtn");
    var target3 = document.querySelector("#openaiinput");

    window.addEventListener("offline", function(){
        target.innerHTML = "You are Offline";
        target2.setAttribute('disabled','');
        target3.setAttribute('disabled','');
    });
    window.addEventListener("online", function(){
        target.innerHTML = "";
        target2.removeAttribute("disabled");
        target3.removeAttribute('disabled');
    });

    var btn = document.querySelector("#clone");
    btn.addEventListener("click", function(){
        var cont = document.querySelector("#content p");
        cont.select();
        document.execCommand("copy");
    });
</script>

<?php require("footer.php"); ?>