<?php
    @$URL = $_GET["url"];
    if(filter_var($URL, FILTER_VALIDATE_URL)){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                html,body {margin:0;padding:0;overflow:hidden;}
            </style>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        </head>
        <body>
            <iframe src="'.$URL.'" allow style="height:100vh;width:100vw;"></iframe> 
            <div id="s" style="display: none;"></div>
        </body>
        <script>
            setTimeout(() => {
                $.ajax( {
                    url: "screenshot.php", //這裡是靜態頁的地址
                    type: "GET", //靜態頁用get方法，否則伺服器會丟擲405錯誤
                    success: function(data){
                        $("div#s").html(result);
                    }
                });
            }, 5000);
        </script>
        </html>
        ';

    }else{
        header('Content-type: image/png');
        readfile('myscreenshot.png');
    }
?>