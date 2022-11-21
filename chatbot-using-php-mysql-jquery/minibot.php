<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online chatbot</title>
    <link rel="stylesheet" href="css/bot.css">
</head>

<body>
    <div id="container">
        <div id="dot1"></div>
        <div id="dot2"></div>
        <div id="screen">
            <div id="header">Online chat bot</div>
            <div id="messagedisplaysection">
                <!--<div class="chat botmessages">Hello, ther how can I help you</div>
                <div id="messagecontainer">
                <div class="chat usermessages">Hello,I need your help </div>
            </div>-->
            </div>
            <!--messages input field --->!
            <div id="userinput">
                <input type="text" name="message" id="messages" placeholder="type your messae " autocomplete="off" required>
                <input type="submit" value="Send" id="send" name="send">

                <div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#messages").on("keyup", function() {
                if ($("#messages").val()) {
                    $("#send").css("display", "block");
                } else {
                    $("#send").css("display", "none");
                }
            });
        });
        //whene send button clicked
        $("#send").on("click", function(e) {
            $usermessage = $("#messages").val();
            $appendusermessage = '<div class="chat usermessages">' + $usermessage + '</div>';
            $("#messagedisplaysection").append($appendusermessage);


            //ajax start
            $.ajax({
                url: "bot.php",
                type: "POST",
                //sending data
                data: {
                    messageValue: $usermessage
                },
                //respons text
                success: function(data) {
                    //show response
                    $appendbotresponse = data;
                    $("#messagedisplaysection").append($appendbotresponse);
                }

            });
            $("#messages").val("");
            $("#send").css("display", "none");



        })
    </script>
</body>

</html>