let region=document.querySelector('#region')

region.addEventListener('change',getTownship)

function getTownship(){
    let regionId=document.querySelector('#region').value

    $.ajax({
        url:'township.php',
        method:'post',
        data:{regionId:regionId},
        success:function(response){
            console.log(response)
            let townships=JSON.parse(response)
            // console.log(townships)
            let townshipSelect=document.querySelector('#township')

            townshipSelect.innerHTML = '<option value="" selected disabled>-- Select township --</option>';

            townships.forEach(function(township){
                let option=document.createElement('option')
                option.value=township.id
                option.textContent=township.name
                townshipSelect.appendChild(option)
                console.log(option)
            })
        }
    })
}

