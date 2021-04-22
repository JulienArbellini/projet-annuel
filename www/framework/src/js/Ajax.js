$("a.supp").click(function(){
    var Delete_ID = $(this).attr("data-id");
    console.log(Delete_ID);
    $.ajax(
        {
            //url: '/articles?Delete_ID=' + Delete_ID, //'@Url.Action("articles", "Base")?Delete_ID=' + Delete_ID, //'/articles?module=Base&action=articlesAction'
            //method: 'post',
            //data: {Del_ID:Delete_ID},
            // success: function(data){
            //     alert ("it works !");
            // }
            
            url: "/articles?id="+ Delete_ID,
            type: 'GET',
            //data: {Del_ID:Delete_ID},
            //data: 'Delete_ID=' + Delete_ID,
            success: function(res){
                    console.log('Success !');
            }
            
        });
});