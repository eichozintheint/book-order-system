$(document).ready(function(){

    //view
    var view=document.querySelector('#pubview');
    $(document).on('click', '#pubview', function() {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        console.log('View button clicked for id:', id);
        $.ajax({
            method:`post`,
            url:`view_publisher.php`,
            data:{id:id},
            success:function(response){
                console.log(response.pub.name)
                if (response.pub) {
                    console.log('ho')
                    $("#publisherInfo").html(`
                        <p>Name: ${response.pub.name}</p>
                        <p>Address: ${response.pub.address}</p>
                    `);
                    $('#publisherModal').modal('show');
                   
                } else {
                    $("#publisherInfo").html(`<p>Error: ${response.error}</p>`);
                }

            }

        });
    })

    //edit

        $(document).on('click', '#pubedit', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id');
            console.log(id);        
        $.ajax({
            method:`post`,
            url:`edit_publisher.php`,
            data:{id:id},
            success:function(response){
                console.log(response.edit.name)
                if (response.edit) {
                    console.log(response.edit.name)
                    $("#publisherInfo1").html(`
                        <label class='form-label'>Name</label>
                        <input class='form-control'id='name' value="${response.edit.name}">
                        <label class='form-label'>Address</label>
                        <input class='form-control' id='address' value="${response.edit.address}">
                        
                    `);
                    $('#publisherModal1').modal('show');
                     //start update
                    
                     var save=document.querySelector('#save');
                     
                     $(document).on('click', '#saveregion', function() {
                        console.log(id)
                        var name=document.querySelector('#name').value;
                        console.log(name)
                        var address=document.querySelector('#address').value;
                        console.log(address)
                        $.ajax({
                            method:`post`,
                            url:`update_publisher.php`,
                            data:{id:id,name:name,address:address},
                            success:function(response){
                                console.log("hi")
                                console.log(response.success)
                                location.reload();
                
                            }
                
                        });
                       
                     });
                     //end update
                } else {
                    $("#publisherInfo1").html(`<p>Error: ${response.error}</p>`);
                }

            }

        });
         })

    //delete
    //var dele=document.querySelector('#pubdelete');
    $(document).on('click','#pubdelete',function(){
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        console.log(id)
        $.ajax({
            method:`post`,
            url:`delete_publisher.php`,
            data:{id:id},
            success:function(response){
                console.log("hi")
                console.log(response)
                location.reload();
            }
        })
    })

})

