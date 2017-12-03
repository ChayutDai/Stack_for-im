<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">

</script>
<script>
    $(document).ready(function() {
        $("#push").submit(function(e) {
          //  e.preventDefault();
            var url = $('input[name="int_value"]').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("stack/push"); ?>',
                data: {
                    'value': url
                },
                success: function(data) {
                    console.log("succes");
                    window.location.reload();
              //      $("#div1").prepend("<li>" + data + "</li>");
                }
            });
        });

        $("#pop").submit(function(e) {
            
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("stack/pop"); ?>',
                data: {
                   
                },
                success: function(data) {
                	console.log("succes");
                	window.location.reload();
                 //   alert(data);
                  //  $('#div1 li:first').remove();
                }
            });
        });
        
        $("#speacial").submit(function(e) { 
           
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url("stack/speacial"); ?>',
                data: {
                   'index': $('#stack_index option:selected').val(),
                   'value': $('input[name="int_value_speacial"]').val()
                },
                success: function(data) {
                	console.log("succes");
                	window.location.reload();
                    
                }
            });
        });
    });
</script>

<html>

<form id="push">
    Input value: <input type="int" name="int_value" id="int_value">
    <input type="submit" value="push" id="push">
</form>
<form id="speacial">   
    Input value: <input type="int" name="int_value_speacial" id="int_value_speacial">
    Insert Append
    <select  id="stack_index">
        <?php foreach ($query as $item):?>
                <option value="<?php echo $item->stack_number;?>"><?php echo $item->stack_value;?></option>
        <?php endforeach;?>
      
    </select>
    <input type="submit" value="push" id="push_speacial">
</form>    
<form id="pop">
    <input type="submit" value="pop" id="pop">
</form>

<ul id="div1">
    <?php foreach ($query as $item):?>
    <li>
        <?php echo $item->stack_value;?>
    </li>
    <?php endforeach;?>
</ul>

</html>