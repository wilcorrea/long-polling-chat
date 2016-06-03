<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="client.js"></script>
</head>
<body>
    <h3>Chat</h3>

    <hr/>

    <input id="you" value="<?php echo uniqid(); ?>"/>
    <div id="response"></div>
    <button onclick="readContent(jQuery('#you').val());"> Connect</button>
    <hr/>

    <input id="he" value="<?php echo uniqid(); ?>"/>
    <textarea id="message"></textarea>
    <button onclick="writeContent(jQuery('#he').val(), jQuery('#message').val());"> Send </button>
</body>
</html>