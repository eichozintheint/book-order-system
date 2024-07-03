$(document).ready(function(){

    //view
    $(document).on('click', '#regionview', function() {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        console.log('View button clicked for id:', id);
        $.ajax({
            method:`post`,
            url:`view_region.php`,
            data:{id:id},
            success:function(response){
                console.log(response.region.name)
                if (response.region) {
                    console.log('ho')
                    $("#regionInfo").html(`
                        <p class='text-success'>Name: ${response.region.name}</p>
                        
                    `);
                    $('#regionModal').modal('show');
                   
                } else {
                    $("#regionInfo").html(`<p>Error: ${response.error}</p>`);
                }

            }

        });
    });
    //edit
    $(document).on('click', '#regionedit', function() {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        console.log(id);        
        $.ajax({
            method:`post`,
            url:`edit_region.php`,
            data:{id:id},
            success:function(response){
                console.log(response.edit.name)
                if (response.edit) {
                // console.log(response.edit.name)
                    $("#regionInfo1").html(`
                        <label class='form-label'>Name</label>
                        <input class='form-control'id='name' value="${response.edit.name}">
                        
                    `);
                    $('#regionModal1').modal('show');
                    //start update                            
                    $(document).on('click', '#saveregion', function() {
                        console.log(id);               
                        var name = $('#name').val(); // Use jQuery to get the value               
                        $.ajax({
                            method: 'post',
                            url: 'update_region.php',
                            data: { id: id, name: name },
                            
                            success: function(response) {

                                if (response.success) {
                                    console.log('Update successful');
                                    location.reload(); // Reload the page to reflect changes
                                } else {
                                    console.log('Update failed');
                                }
                            
                                location.reload();
                            }
                            
                        });
                        console.log("ho")
                    });
                    
                    //end update
                } else {
                    $("#regionInfo1").html(`<p>Error: ${response.error}</p>`);
                }

            }

        });
    })

    $('#addregion').on('click',function(){

        $('#regionModal1').modal('show');
        $("#regionInfo1").html(`
           <label class='form-label'>Region Name</label>
           <input class='form-control' name='region_name' id='add_region'>           
        `);

        $(document).on('click', '#saveregion', function() {
            //console.log('afaf')
            var name = $('#add_region').val(); 
           // console.log(name);
            $.ajax({
                method:`post`,
                url:`add_region.php`,
                data:{name:name},
                success:function(response){
                    console.log("his");
                    console.log(response);
                    location.reload()
                }
            })
        })
    })

 
        // Event delegation for dynamic content
        $(document).on('click', '#regiondelete', function() {
            var tr=$(this).closest('tr');
            var id =tr.attr('id');
            console.log(id);
            $.ajax({
                method:`post`,
                url:`delete_region.php`,
                data:{id:id},
                success:function(response){
                    console.log("hello");
                    location.reload();
                }
            })
        });
   
});