$(document).ready(function(){
    //edit

        $(document).on('click', '#deledit', function() {
            var tr = $(this).closest('tr');
            var id = tr.attr('id');
            console.log(id);        
        $.ajax({
            method:`post`,
            url:`edit_delivery.php`,
            data:{id:id},
            success:function(response){
                console.log(response.deli)
                let deli = response.deli[0]; 
                if (response.deli) {
                   console.log(response)
                    $("#deliveryInfo").html(`
                        <label class='form-label'>Township Name</label>  
                        <input class='form-control' id='address' value="${deli.township}" readonly>                       
                        <label class='form-label'>Price</label>
                        <input class='form-control' id='price' value="${deli.price}">
                        
                    `);
                    $('#deliveryModal').modal('show');
                     //start update
                    
                    
                     
                     $(document).on('click', '#saveDelivery', function() {
                        //console.log(id)
                        var price=document.querySelector('#price').value;
                        console.log(price)
                        $.ajax({
                            method:`post`,
                            url:`update_delivery.php`,
                            data:{id:id,price:price},
                            success:function(response){
                               
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
})