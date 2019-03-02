<html>
<title>home page</title>
<head>
<link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">    
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>   
</head>
<body align="center">
    <div>
        <a href="profile.php">View Profile</a>&nbsp;&nbsp;&nbsp;
        <a href="schedule.php">Schedule Activities</a>
    </div><br><hr><br><br>
    <div>
    <strong>
    <input type="number" min="1" id="feedct" name="feedcnt">
    <input type="button" id="profile" name=" profile" value="Dispense Food"><br><br>
    <input type="button" id="drnkwtr" name="drnkwtr" value="Dispense Drinking Water"><br><br>
    <input type="button" id="caudio" name="caudio" value="Play Voice Command" onclick="console.log('ok')"><br><br>

    <!--This is the door section-->
    
        
    <button onclick="doorProperty('true');">Door Open</button>    
    <button onclick="doorProperty('false');">Door Close</button></br></br>
    <span id="message" style="width:400px"></span>
    <script>
        function doorProperty(type)
        {
            var doorId=1;
            var msg = document.getElementById('message');
            if(type=='true'){
                fetch('doorProperty.php?property=1&id=1')
                  .then(
                    function(response) {
                      if (response.status !== 200) {
                        console.log('Looks like there was a problem.' +
                          response.status);
                        return;
                      }
                      response.json().then(function(data) {
                        console.log(data.Property);
                        msg.style.color = "Green";
                        msg.textContent = "Door Opened for kennel with ID : " + doorId;
                      });
                    }
                  )
                  .catch(function(err) {
                    console.log('Fetch Error : ', err);
                  });                
            }
            else{
                fetch('doorProperty.php?property=0&id=1')
                  .then(
                    function(response) {
                      if (response.status !== 200) {
                        console.log('Looks like there was a problem.' +
                          response.status);
                        return;
                      }
                      response.json().then(function(data) {
                        console.log(data.Property);
                        msg.style.color = "Red";
                        msg.textContent = "Door Closed for kennel with ID : " + doorId;
                      });
                    }
                  )
                  .catch(function(err) {
                    console.log('Fetch Error : ', err);
                  });                
            }
        }
    </script>
    <input type="button" id="clean" name="clean" value="Wash The Kennel"><br><br>
    <div align="center">
    <iframe width="320" height="240" src="http://169.254.2.159:8081/" frameborder="1" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    </strong>    
    </div>
</body>
</html>
