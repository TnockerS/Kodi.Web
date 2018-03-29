<?php

require_once 'config/db_connect.php';

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Tester</title>
<link rel="stylesheet" href="config/styler.css"/>
<meta name="viewport" content="width=device-width, user-scalable=0">
<script src="jquery/jquery.js"></script>
<script src="config/main.js"></script>
</head>
<script type="text/javascript">

 $(document).ready(function(){
  check_log();
    if($('.bn').html()==='Benutzername'){
        $('.bn').on('click', function(){
            $('.bn').empty();
             if($('.pwd').html()===""){
                $('.pwd').text("Password");
            }
        })
    }
    if($('.pwd').html()==='Password'){
        $('.pwd').on('click', function(){
            $('.pwd').empty();
            if($('.bn').html()===""){
                $('.bn').text("Benutzername");
            }
        })
    }
    $('.login_btn').on('click', function(){
        var bn_1=$('.bn').html();
        var pwd =$('.pwd').html();
        $.ajax({
            url: 'config/login.php?bn[]='+bn_1+'&bn[]='+pwd, // Wohin soll die Datei geschickt werden?
            data: '', // Das ist unser Datenobjekt.
            type: 'POST', // HTTP-Methode, hier: POST
            processData: false,
            contentType: false,
            // und wenn alles erfolgreich verlaufen ist, schreibe eine Meldung
            // in das Response-Div
            success: function (data) {
                 console.log(data);
                if(data==='ok'){
                   
                    login();
                    
                }
                if(data=='falsch'){
                    $('.bn').html('error');
                }
                    
               // show;
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
        

   });  
})
 function check_log(){
    $.ajax({
            url: 'config/login.php?', // Wohin soll die Datei geschickt werden?
            data: '', // Das ist unser Datenobjekt.
            type: 'POST', // HTTP-Methode, hier: POST
            processData: false,
            contentType: false,
            // und wenn alles erfolgreich verlaufen ist, schreibe eine Meldung
            // in das Response-Div
            success: function (data) {
                 console.log(data);
                if(data==='OK'){
                   
                    login();
                    
                }
                if(data=='false'){
                    $('.bn').html('error');
                }
                    
               // show;
            },
            error: function (xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }
        });
        
 }

 function login(){
                 $('.bn').fadeOut();
                    $('.pwd').fadeOut();
                    $('.login_btn').fadeOut();
    $('.main').animate({opacity: 0}, '500', function() {

        $(this)
            .css({'background-image': 'url(Image/old_wall.jpg)'})
            .animate({opacity: 1}, '500', function(){
                var new_width = $('.main').width()/1.05;
                var new_heigth = $('.main').height()-99;
            $('.left_menu').fadeIn().animate({
                height: "35px",
                width: "99.89%"
            }, 500, function(){
                
                $('.left_menu ul').fadeIn();
                
                $('.login').animate({
                    left: "0px",
                    marginLeft: "0px",
                    paddingLeft: "5%",
                    paddingRight: "-5%",
                    top: "0",
                    marginTop: "69px",
                    backgroundColor: "#FFF",
                    width: new_width,
                    height: new_heigth
                }, 500, function(){
               $('.login').load('video_list.php');
                });
            });

            });
        
            
        
   
});

    $('.left_menu li').on('click', function(){
        console.log($(this).attr('src'));
        $('.login').load('config/'+$(this).attr('src')+'.php');
    })
 }

    </script>

<body>
    <div class="hidden mv_container"><div class="closer">X</div>
<div class="mv"></div></div>
    <div class="main">
            <div class="ue text_shadow_white"><?php echo $_SERVER['HTTP_HOST'];?></div>
        <div class="left_menu">
            <ul>
                <li src="startseite">Startseite</li>
                <li src="genres">Genres</li>
                <li src="tv">TV Sender</li>
                <li src="benutzer">Benutzer</li>

            </ul>
        </div>

    <div class="login round shadow">
        <div class="bn round shadow" contenteditable="true">Benutzername</div>
        <div class="pwd round shadow" contenteditable="true">Password</div>
        <div class="login_btn shadow round text_shadow_black">Login</div>
    </div>
</div>

</body>
</html>