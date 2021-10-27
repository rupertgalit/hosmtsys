
<!DOCTYPE html>
<html lang="en">
<head>
      <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      </script>
      <script>
         function geeks(msg, gfg) {
            var confirmBox = $("#container");

            /* Trace message to display */
            confirmBox.find(".message").text(msg);

            /* Calling function */
            confirmBox.find(".yes").unbind().click(function()
            {
               confirmBox.hide();
            });
            confirmBox.find(".yes").click(gfg);
            confirmBox.show();
         }
      </script>
      <style>

        /* Body alignment */
          body {
            text-align: center;
        }

        /* Color for h1 tag */
        h1 {
            color: green;
        }

        /* Designing dialog box */
        #container {
            display: none;
            background-color: purple;
            color: white;
            position: absolute;
            width: 350px;
            border-radius: 5px;
            left: 50%;
            margin-left: -160px;
            padding: 16px 8px 8px;
            box-sizing: border-box;
         }

         /* Designing dialog box's okay button */
         #container button {
            background-color: yellow;
            display: inline-block;
            border-radius: 5px;
            border: 2px solid gray;
            padding: 5px;
            text-align: center;
            width: 60px;
         }

         /* Dialog box message decorating */
         #container .message {
            text-align: left;
            padding: 10px 30px;
         }
      </style>
   </head>
   <body>
    <h1>GeeksforGeeks</h1>
    <b>Designing the alert box</b>
    <br><br>
      <div id="container">
         <div class="message">
             Thanks for Subscription<br>A Computer
             Science Portal for Geeks</div>
         <button class="yes">okay</button>
      </div>
      <input type="button" value="Subscribe" onclick="geeks();" />
		</body>
</html>
