function getCountOfAll() {
    var url = `${appname}/application/master/get_count_of_all.php`;
    $.get(url, function (data) {
        var result = JSON.parse(data);
        // console.log(result);
        let salon_count = result.responseContent.all_count_list[0].salon_count;
        let customer_count = result.responseContent.all_count_list[0].customer_count;
        let booking_count = result.responseContent.all_count_list[0].booking_count;

        
        if (salon_count.toString().length <= 1) 
            $('#salon_count').html("0"+salon_count);
        else
            $('#salon_count').html(salon_count);
        
        if (customer_count.toString().length <= 1) 
            $('#customer_count').html("0"+customer_count);
        else
            $('#customer_count').html(customer_count);
        
        if (booking_count.toString().length <= 1) 
            $('#booking_count').html("0"+booking_count);
        else
            $('#booking_count').html(booking_count);
        
        
       
    })
}
