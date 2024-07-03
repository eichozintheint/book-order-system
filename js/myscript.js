// books.php -----------------------------------------------------------------
let addToCart=document.querySelectorAll('.addToCart')
let bookCount=document.querySelector('.book-count')

// addToCart Function --------------------------------------------------------
addToCart.forEach(button=>
    button.onclick=addBookToCart
)

function addBookToCart(event){
    event.preventDefault()

    let bookElement = event.target.closest('.card')
    console.log(bookElement)
    let id=bookElement.getAttribute('data-id')
    let title=bookElement.getAttribute('data-title')
    let category=bookElement.getAttribute('data-category')
    let price=bookElement.getAttribute('data-price')

    let currentPage=document.getElementById('currentPage').value
    console.log(currentPage)

    $.ajax({
        url:'add_to_cart.php',
        method:'post',
        data:{id:id,title:title,category:category,price:price},
        success:function(response){
            if(response)
            {
                alert('Book is added to cart!')
                console.log('Book is added to cart!')
                window.location.href=currentPage
            }
        }
    })
}

// cartList.php --------------------------------------------------------------
let decreaseBtns=document.querySelectorAll('.decreaseBtn')
let increaseBtns=document.querySelectorAll('.increaseBtn')

let bookPrices=document.querySelectorAll('.bookPrice')
// console.log(bookPrices[1].innerHTML)


decreaseBtns.forEach(button=>
    button.onclick=decreaseQty
)

increaseBtns.forEach(button=>
    button.onclick=increaseQty
)

let lastButtonClicked = null
function decreaseQty(event){
    event.preventDefault()
    
    // Qty 
    let qty=event.target.nextElementSibling.innerHTML
    let qtyNumber=parseInt(qty)

    if (qtyNumber <= 0) {
        return;
    }

    let subPrice=event.target.parentElement.nextElementSibling.innerHTML
    let subPriceNumber=parseInt(subPrice)

    let basicPrice=event.target.parentElement.previousElementSibling.previousElementSibling.innerHTML
    let basicPriceNumber=parseInt(basicPrice)

    if(lastButtonClicked !== event.target){
        newQty=qtyNumber 
    }

    if(lastButtonClicked !== event.target){
        newPrice=subPriceNumber 
    }

    lastButtonClicked=event.target

    newQty-=1
    event.target.nextElementSibling.innerHTML=newQty

    event.target.parentElement.nextElementSibling.innerHTML=subPriceNumber-basicPriceNumber

}

function increaseQty(event){
    event.preventDefault();

    // Qty 
    let qty=event.target.previousElementSibling.innerHTML
    let qtyNumber=parseInt(qty)

    // Reset newQty if a different button is clicked
    if (lastButtonClicked !== event.target) {
        newQty = qtyNumber
    }

    // Update the last button clicked
    lastButtonClicked = event.target;

    newQty+=1
    event.target.previousElementSibling.innerHTML=newQty

    // Price 
    let price=event.target.previousElementSibling.parentElement.previousElementSibling.previousElementSibling.innerHTML
    let priceNumber=parseInt(price)

    let subTotalPrice=event.target.parentElement.nextElementSibling
    subTotalPrice.innerHTML=newQty*priceNumber
}

// delete item in cart 
let deleteBtns=document.querySelectorAll('.deleteItem')

deleteBtns.forEach(button=>
    button.onclick=deleteItem
)

function deleteItem(event){
    event.preventDefault()
    // let deleteItemId=event.target.parentElement.parentElement.getAttribute('data-id')
    let deleteItemId=event.target.getAttribute('data-id')
    let row=event.target.parentElement.parentElement
    console.log(deleteItemId)

    $.ajax({
        url:'deleteItem.php',
        method:'post',
        data:{deleteItemId:deleteItemId},
        success:function(response){
            // if(response=='success'){
            //     alert('One Item is deleted from cart list')
            //     row.remove()
            // }
            if(response){
                alert('One Item is deleted from cart list')
                row.remove()
            }
            console.log(response)
        }
    })
}



// Attach the deleteItem function to delete buttons
$(document).ready(function() {
    $('.deleteButton').on('click', deleteItem);
});


// orderFunction ------------------------------------------------
let orderBtn=document.querySelector('.orderBtn')
let priceElements=document.querySelectorAll('.subTotalPrice')
let bookQtyElements=document.querySelectorAll('.book-qty')

console.log(bookQtyElements)
// console.log(priceElements[0])

orderBtn.onclick=orderBooks

function orderBooks(event){
    event.preventDefault()

    alert('Are you sure to order?')

    let books=[];
    let bookId_elements=document.querySelectorAll('.book_id')
    bookId_elements.forEach(element=>{
        let bookId=element.getAttribute('data-id')
        books.push(bookId)
    })
    console.log(books);

    let book_qtys=[]
    let qty_elements=document.querySelectorAll('.book-qty')
    qty_elements.forEach(element=>{
        let book_qty_value=element.innerHTML
        book_qtys.push(book_qty_value)
    })
    console.log(book_qtys)
    

    let prices=[]
    let totalPrice=0

    for(let index=0;index<priceElements.length;index++){
        let temp=parseInt(priceElements[index].innerHTML)
        prices[index]=temp

        totalPrice+=prices[index]
    }
    console.log(prices)
    console.log(totalPrice)

    let totalQty=0
    for(let index=0;index<bookQtyElements.length;index++){
        let qty=bookQtyElements[index].innerHTML
        let qtyValue=parseInt(qty)
        totalQty+=qtyValue
    }

    $.ajax({
        url:'order.php',
        method:'post',
        data:{total_price:totalPrice,total_qty:totalQty,books:books,book_qtys:book_qtys},
        success:function(response){
            if(response == 'success'){
                window.location.href='orderForm.php'
            }
            console.log(response)
        }
    })

}

// -_________________________
// order pop-up modal 
// let orderConfirm=document.getElementById('#orderConfirm')
// orderConfirm.onclick=getOrderInfo

// function getOrderInfo(){
//     // event.preventDefault();
//     // console.log('hello');
//     let receiver_name=document.getElementById('receiver_name')
//     document.getElementById('receiver_name').textContent='Receiver Name: ' + receiverName;
    
// }