$(document).ready(function () {
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        let qty = $(this).closest('.product_data').find('.input-qty').val();
        let value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10)
        {
            value++;
            // $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);


        }

    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        let qty = $(this).closest('.product_data').find('.input-qty').val();
        let value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1)
        {
            value--;
            // $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);


        }

    });
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        let qty = $(this).closest('.product_data').find('.input-qty').val();
        let prod_id = $(this).val();
        $.ajax({
            method: "POST",
            url:"functions/handlecart.php",
            data:{
                "prod_id": prod_id,
                "prod_qty" : qty,
                "scope": "add"
            },
            success: function (response) {
                if (response == 201) 
                {
                    alertify.success("Product Added to Cart");

                }
               else if (response == 401) {
                alertify.success("login to cont");
            }
            else if (response == 500) {
                alertify.success("something went wrong");
            }
            
            }
        });  

    });
    

});