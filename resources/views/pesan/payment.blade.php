
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-6bAWJanmX7wmsSPH"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
  </head>
 
  <body> 
  <script>
        function init() {
                window.snap.pay('{{$snapToken}}');
        }
        init();
  </script>
</head>
  </body>
</html>
