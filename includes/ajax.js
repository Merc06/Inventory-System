$(document).ready(function(){  

    $('.view_details').click(function(){
        var detail_id = $(this).attr("id");

        $.ajax({
            url     :   "functions.php",
            method  :   "POST",
            data    :   {detail_id:detail_id},
            success :   function(data){
                $('#detail_zoom').html(data);
                $('#view_detail').modal("show");
            }
        });
    });

    
    $('.btn-danger').click(function() {
        var admin_id = $(this).attr("id");    
        
        if (confirm('Are you sure you want to remove this?')) {
            if (admin_id == '1'){
               alert('You can\'t delete head admin!');
                window.location('view_admin.php');
            }else{
                $.ajax({
                    url     : 'functions.php',
                    method  : "POST",
                    data    : {admin_id:admin_id},
                    cache   : false,
                    success : function(html) {
                        $(".delete" + admin_id).fadeOut('slow');
                    }
                });
            }

        }else{
            return false;
        }
    });
    
    $('.btn-primary').click(function() {  
        var itemName = $('#itemName').val();
        $.ajax({
            url     : 'functions.php',
            method  : "POST",
            data    : {itemName:itemName},
            cache   : false,
            success : function(data) {
                if(data == 'false'){
                    alert('Item Already Exists!');

                }else{
                    alert('Item Successfully added!');
                    history.go(-1);
                } 
            }
        });
   
    });
    
    $('#itemSelect').on('change', function() {
      var value = $(this).val();
      if(value == 1 || value == 4){
          $("#os").prop('disabled', false);
          $("#ms").prop('disabled', false);
      }else{
          $("#os").prop('disabled', true);
          $("#ms").prop('disabled', true);
      }
        
    });
    
    $('.view_image').click(function(){
        var image_id = $(this).attr("id");

        $.ajax({
            url     :   "functions.php",
            method  :   "POST",
            data    :   {image_id:image_id},
            success :   function(data){
                $('#image_zoom').html(data);
                $('#view').modal("show");
            }
        });
    });

    
});