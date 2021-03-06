$(document).ready(function(){
    var rows = 0;
    showComments();
    longPolling();
    $('#addcomment').click(function(e){
        var url = $('#myForm').attr('action');
        var data = $('#myForm').serialize();
        e.preventDefault();

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(response){
                if(response.success){
                    $('#myForm')[0].reset();
                    $('.alert-success').html('Your comment has been posted!').fadeIn().delay(4000).fadeOut('slow');
                    showComments();
                }else{
                    alert('Error');
                }
            },
            error: function(){
                alert('Could not comment');
            }
        });
    })

    $('#comments').on('click', '.deletebutton', function(){
        var id = $(this).attr('data');
        $.ajax({
            type: 'ajax',
            method: 'get',
            async: true,
            url: 'http://localhost/seminarie3/comments/delete',
            data:{id:id},
            dataType: 'json',
            success: function(response){
                if(response.success){
                    $('.alert-success').html('Comment Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
                    showComments();
                }else{
                    alert('Error');
                }
            },
            error: function(){
                alert('Error deleting');
            }
        });
    });
    function longPolling(){
        $.ajax({
            type: 'POST',
            url: 'http://localhost/seminarie3/Comments/longPolling',
            data: {rows:rows},
            dataType: 'json',
            success: function(data){
                showComments();
                longPolling();
            },
        })
    }


    function showComments(){
        $.ajax({
            type: 'ajax',
            url: 'http://localhost/seminarie3/Comments/showcomments',
            async: false,
            dataType: 'json',
            success: function(data){
                var output = '';
                var deletes = '';
                var i;
                rows = data.length;
                for(i = 0; i<data.length;i++){
                    if($('#username').text() == data[i].username){
                        deletes = '<a href="javascript:;" class="deletebutton" data="'+data[i].id+'">Delete</a>'
                    }else{
                        deletes = '';
                    }
                    data[i].username;
                    if(data[i].food == $('#forRecipe').val()){
                        output += '<div class="comment">'+deletes+'<h3 class="commentusername">'+data[i].username+'</h3><p>'+data[i].comment+'</p></div>';
                    }
                }

                $('#comments').html(output);
            },
            error: function(){
                alert('could not get data from database');
            }
        })
    }
})
