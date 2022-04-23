<?php
if (isset($_POST["submit"])) {
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $configs = include('config.php');
    $url = $configs['url'];
    $messageWarning = "";
    $colorMessageWarning = "white";
    $nameTextAdded = "";
    $nameLabelColor = "";
    $emailTextAdded = "";
    $emailLabelColor = "";
    $MessageTextAdded = "";
    $messageLabelColor = "";
    if (!empty($name) and !empty($email) and !empty($message) and $name != "HenryFrile" and $messageCaptchaColor == "color: green") {
        $timeStamp = date('Y-m-d\TH:i:sO');

        $name_title = "**Nom : **" . $name;
        $description =  "**Email : **" . $email . "\n**Message : **" . $message;
        $hookObject = json_encode([
            /*
             * The general "message" shown above your embeds
             */
            "content" => "@here",
            /*
             * The username shown in the message
             */
            "username" => "Nouveau Message venant du Site Web",
            /*
             * The image location for the senders image
             */
            "avatar_url" => "https://pbs.twimg.com/profile_images/1466389663942381576/mhpFgjFd_400x400.png",
            /*
             * Whether or not to read the message in Text-to-speech
             */
            "tts" => false,
            /*
             * File contents to send to upload a file
             */
            // "file" => "",
            /*
             * An array of Embeds
             */
            "embeds" => [
                /*
                 * Our first embed
                 */
                [
                    // Set the title for your embed
                    "title" => $name_title,

                    // The type of your embed, will ALWAYS be "rich"
                    "type" => "rich",

                    // A description for your embed
                    "description" => $description,

                    // The URL of where your title will be a link to
                    "url" => "https://www.heficience.com/",

                    /* A timestamp to be displayed below the embed, IE for when an an article was posted
                     * This must be formatted as ISO8601
                     */
                    "timestamp" => $timeStamp,

                    // The integer color to be used on the left side of the embed
                    "color" => hexdec( "5DCDC6" ),

                    // Footer object
                    "footer" => [
                        "text" => "Heficience",
                        "icon_url" => ""
                    ],

                    // Image object
                    "image" => [
                        "url" => "https://cdn.discordapp.com/attachments/904849842629672980/904850659482959952/logofinal2large.png"
                    ],

                    // Author object
                    "author" => [
                        "name" => $name,
                        "url" => "https://www.heficience.com"
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );
        $messageWarning='Formulaire envoyé à Heficience, Merci pour votre participation.';
        $colorMessageWarning="green";
        $name = "";
        $email = "";
        $message = "";

    } else {
        $messageWarning='Veuillez remplir correctement le formulaire';
        $colorMessageWarning="red";
        if (empty($name)||$name=="HenryFrile") {
            $nameManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
            $nameTextAdded = " mal renseigné";
            $nameLabelColor = "color: red";
        } else {
            $nameManquant = "";
            $nameTextAdded = "";
            $nameLabelColor = "";
        }

        if (empty($email)) {
            $emailManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $emailTextAdded = " mal renseigné";
            $emailLabelColor = "color: red";
        } else {
            $emailManquant = "";
            $emailTextAdded = "";
            $emailLabelColor = "";
        }

        if (empty($message)) {
            $messageManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $messageTextAdded = " mal renseigné";
            $messageLabelColor = "color: red";
        } else {
            $messageManquant = "";
	        $MessageTextAdded = "";
            $messageLabelColor = "";
        }
    }
}
?>
