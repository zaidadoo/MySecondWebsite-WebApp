
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable({ revert: "invalid" });
    $( "#draggable2" ).draggable({ revert: "invalid" });
 
    $( "#droppable" ).droppable({
      ( ".selector" ).on( "dragcreate",drop: function( event, ui ) {
        $( this )
          .find( "#id" )
            .val( "Answer 1" );
      }
    });
  } );
  </script>
</head>
<body>

<center>

<form>
<div id="droppable">
  <input style="background: grey; border: none; color: white; padding: 20px" type="text" id="id" value="Drop me here" readonly />
</div>
</form>

<div style="display: inline-block;">
<p id="draggable" style="background: green; max-width: 100px; padding: 20px; color: white">Answer 1</p>
<p id="draggable2"  style="background: green; max-width: 100px; padding: 20px; color: white">Answer 2</p>
</div>

 
</body>
</html>