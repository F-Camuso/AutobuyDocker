<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat</title>
<link type="text/css" rel="stylesheet" href="View/css/estiloChat.css" />
</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <?php echo $_SESSION['usuario']; ?> <b></b></p>
        <p class="logout"><a id="exit" href="index.php">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"><?php
        if(file_exists("log.html") && filesize("log.html") > 0){
            $handle = fopen("log.html", "r");
            $contents = fread($handle, filesize("log.html"));
            fclose($handle);
             
            echo $contents;
        }?>
    </div>
     
    <form method="POST" name="message" action="index.php?action=chat">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">

    // jQuery Document
    $(document).ready(function(){
     
    });
    </script>
    
    <script type="text/javascript">
    function loadLog(){     

        $.ajax({
            url: "log.html",
            cache: false,
            success: function(html){        
                $("#chatbox").html(html); //Insert chat log into the #chatbox div               
            },
        });

    }
    </script>
    <script type="text/javascript">
        setInterval (loadLog, 5);
    </script>
    <script type="text/javascript">
        function loadLog(){     
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        
        $.ajax({
            url: "log.html",
            cache: false,
            success: function(html){        
                $("#chatbox").html(html); //Insert chat log into the #chatbox div   
                
                //Auto-scroll           
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
                if(newscrollHeight > oldscrollHeight){
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                }               
            },
        });
    }
    </script>
    <!-- sair -->
    <script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){
        //If user wants to end session
        $("#exit").click(function(){
            var exit = confirm("Are you sure you want to end the session?");
            if(exit==true){window.location = 'index.php?logout=true';}      
        });
    });
    </script>

      <script type="text/javascript">
        //If user submits the form
        $("#submitmsg").click(function(){   
            var clientmsg = $("#usermsg").val();
            $.post("index.php?action=chat", {text: clientmsg});              
            $("#usermsg").attr("value", "");
            return false;
        });
    </script>
</body>
</html>