$(document).ready(function(){
    //add
    $('#addTownship').on('click',function(){
       
        $('#townshipModal1').modal('show');
        $('#townshipInfo1').html(`
             <label class='form-label text-success'>Township Name</label>
           <input class='form-control' id='township_name'> 
           <label class='form-label text-success'>Select Region Name</label>
            <select class='form-control mt-3' name='region' id='regionSelect'>
                <option value='' id="region">Loading...</option>
            </select>            
         `);
         //get region
         $.ajax({
            url: 'fetch_all_regions.php', 
            type: 'GET', 
            success: function(data) {
               
                let options = '';
                data.forEach(regions => {
                    options += `<option value="${regions.id}">${regions.name}</option>`;
                });
                $('#regionSelect').html(options);
            },
            error: function() {
                $('#regionSelect').html('<option value="">Error loading regions</option>');
            }
        });
         //end get region
        //save 
         $(document).on('click', '#saveTownship', function() {

            var name = $('#township_name').val(); 
            console.log(name)
           $(document).ready(function(){
            //add
            $('#addTownship').on('click',function(){
            
            
                $('#townshipModal1').modal('show');
                $('#townshipInfo1').html(`
                    <label class='form-label text-success'>Township Name</label>
                <input class='form-control' id='township_name'> 
                <label class='form-label text-success'>Select Region Name</label>
                    <select class='form-control mt-3' name='region' id='regionSelect'>
                        <option value='' id="region">Loading...</option>
                    </select>            
                `);
                //get region
                $.ajax({
                    url: 'fetch_all_regions.php', 
                    type: 'GET', 
                    success: function(data) {
                    
                        let options = '';
                        data.forEach(regions => {
                            options += `<option value="${regions.id}">${regions.name}</option>`;
                        });
                        $('#regionSelect').html(options);
                    },
                    error: function() {
                        $('#regionSelect').html('<option value="">Error loading regions</option>');
                    }
                });
                //end get region
                //save 
                $(document).on('click', '#saveTownship', function() {

                    var name = $('#township_name').val(); 
                    console.log(name)
                    $(document).on('change', '#regionSelect', function() {
                        console.log('')
                        var selectedRegionId = $(this).val();
                        console.log("Selected Region ID:", selectedRegionId);
                    });
                    // $.ajax({
                    //     method:`post`,
                    //     url:`add_region.php`,
                    //     data:{name:name},
                    //     success:function(response){
                    //         console.log("his");
                    //         console.log(response);
                    //     }
                    // })
                })//end save
            })//end add
            //view
            $(document).on('click', '#townshipview', function() {
                var tr = $(this).closest('tr');
                var id = tr.attr('id');
                console.log(id);
                $.ajax({
                    method:`post`,
                    url:`view_township.php`,
                    data:{id:id},
                    success:function(response){
                        
                        if (response.township) {
                        
                            $("#townshipInfo").html(`
                                <p class='text-success'>Township Name: ${response.township.name}</p>
                                <p class='text-success'>Region Name: ${response.township.region_name}</p>
                            `);
                            $('#townshipModal').modal('show');
                        
                        } else {
                            $("#townshipInfo").html(`<p>Error: ${response.error}</p>`);
                        }

                    }

                });
            });//end view

        })

        })//end save
    })//end add


    //view
    $(document).on('click', '#townshipview', function() {
        var tr = $(this).closest('tr');
        var id = tr.attr('id');
        console.log(id);
        $.ajax({
            method:`post`,
            url:`view_township.php`,
            data:{id:id},
            success:function(response){
                
                if (response.township) {
                   
                    $("#townshipInfo").html(`
                        <p class='text-success'>Township Name: ${response.township.name}</p>
                          <p class='text-success'>Region Name: ${response.township.region_name}</p>
                    `);
                    $('#townshipModal').modal('show');
                   
                } else {
                    $("#townshipInfo").html(`<p>Error: ${response.error}</p>`);
                }

            }

        });
    });//end view

})