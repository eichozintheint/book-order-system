let userDeleteBtns=document.querySelectorAll('.userDeleteBtn')

userDeleteBtns.forEach(button=>
    button.onclick=deleteUser
)

function deleteUser(event){
    event.preventDefault()

    let tr=event.target.closest('.user')
    // let tr=event.target.parentElement.parentElement.parentElement
    let user_id=tr.getAttribute('user-id')

    $.ajax({
        url:'deleteUser.php',
        method:'post',
        data:{user_id:user_id},
        success:function(response){
            if(response == 1){
                alert('User is deleted successfully')
                window.location.href='users.php'
            }
        }
    })

}

// Book Delete 
let bookDeleteBtns=document.querySelectorAll('.deleteBook')

bookDeleteBtns.forEach(button=>
    button.onclick=deleteBook
)

function deleteBook(event){
    event.preventDefault();
    // console.log(event.target)
    let bookId=event.target.parentElement.parentElement.parentElement.parentElement.getAttribute('id')
    console.log(bookId)
    
    $.ajax({
        url:'deleteBook.php',
        method:'post',
        data:{bookId:bookId},
        success:function(response){
            if(response=='success'){
                alert('Book is deleted successfully');
                window.location.href='books.php';
            }
        }
    })
}

// Order Delete 
let orderDeleteBtns=document.querySelectorAll('.deleteOrder')

orderDeleteBtns.forEach(button=>
    button.onclick=deleteOrder
)

function deleteOrder(event){
    event.preventDefault();
    let orderId=event.target.parentElement.parentElement.getAttribute('id')
    // console.log(event.target.parentElement.parentElement.getAttribute('id'))
    
    $.ajax({
        url:'deleteOrder.php',
        method:'post',
        data:{orderId:orderId},
        success:function(response){
            if(response=='success'){
                alert('Order is deleted successfully');
                window.location.href='orders.php';
            }
        }
    })
}

// Order Approve Btn 
let orderApproveBtns=document.querySelectorAll('.orderApproveBtn')
console.log(orderApproveBtns)

orderApproveBtns.forEach(button=>
    button.onclick=approveOrder
)

function approveOrder(event){
    event.preventDefault()
    console.log('click')
    console.log(event.target.parentElement.parentElement.closest('.order'))

    let tr=event.target.parentElement.parentElement.closest('.order')
    let mailRow=tr.querySelector("td[mail]") // get row td with attribute mail
    let mail=mailRow.getAttribute('mail')

    console.log(mail)
    let order_element=event.target.parentElement.parentElement.closest('.order');
    let order_id=order_element.getAttribute('id');

    $.ajax({
        url:'orderApprove.php',
        method:'post',
        dataType: 'json',
        data:{order_id:order_id,mail:mail},
        success:function(response){
            if (response.status === 'success') {
                alert(response.message);
                location.reload();
            } else {
                alert(response.message);
            }
        }
    })
}


//Book Detail View Modal Box
let viewDetailBtns=document.querySelectorAll('#viewBookDetail')

    viewDetailBtns.forEach(button=>
        button.onclick=viewDetail
    )

    function viewDetail(event){
        event.preventDefault();
        let bookId=event.target.parentElement.parentElement.parentElement.getAttribute('id')
        $.ajax({
            url:'viewBook.php',
            method:'post',
            data:{bookId,bookId},
            success:function(response){
                document.getElementById('modalTotalPrice').textContent = 'Total Price: ';
            }
        })
        $('#bookView').modal('show');

        
    
        
    }

