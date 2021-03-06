<!doctype html>
<html>
<head>
    <title>BotMan Widget</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/chat.min.css">
</head>
<body>
    <script>
    setInterval(function () {
    var msg = document.querySelector('ol.chat li:last-child');
    if(msg) {
        if(msg.className  === 'visitor') {

            var node_li = document.createElement('li');
            node_li.className = 'indicator';

            var node_div = document.createElement('div');
            node_div.className = 'loading-dots';

            var node_span1 = document.createElement('span');
            var node_span2 = document.createElement('span');
            var node_span3 = document.createElement('span');
            node_span1.className = 'dot';
            node_span2.className = 'dot';
            node_span3.className = 'dot';

            node_div.appendChild(node_span1);
            node_div.appendChild(node_span2);
            node_div.appendChild(node_span3);
            node_li.appendChild(node_div);

            document.querySelector('ol.chat').appendChild(node_li);

        } else {
            var isbot = document.querySelector('ol.chat li:nth-last-child(2)');
            if(msg.className  === 'indicator' && isbot.className === 'chatbot') {
                document.querySelector('ol.chat li .loading-dots').parentNode.remove();
            }

        }

    }
}, 10);
</script>
<script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget/build/js/chat.js'></script>
</body>
</html>