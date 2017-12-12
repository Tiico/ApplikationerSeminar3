<div class="commentsubmit">
    <?php if($this->session->userdata('logged_in')) : ?>
    <form action="<?php echo base_url() ?>comments/addComment" id="myForm" method="POST">
        Commenting as: <?php echo $this->session->userdata('username')?>.
        <br>
        <textarea name="body" form="myForm" rows="4" placeholder="Enter comment here..."></textarea>
        <input type="hidden" name="food" value="meatballs"/>
    </form>
    <button id="addcomment" name="meatballs" type="submit">Send</button>
    <?php endif; ?>
    <?php if(!$this->session->userdata('logged_in')) : ?>
    echo 'Log in, in order to be able to comment!';
    <?php endif; ?>
</div>
<script>
    $(function(){
        showComments();

        $('#showForm').click(function(){
        $('#myForm').attr('action', 'http://localhost/seminarie3/comments/addComment');

    })
        $('#addcomment').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
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
        $('#test').on('click', '.deletebutton', function(){
            var id = $(this).attr('data');
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>comments/deletee',
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
        function showComments(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>comments/showcomments',
                async: false,
                dataType: 'json',
                success: function(data){
                    var output = '';
                    var deletee = '';
                    var i;
                    for(i = 0; i<data.length;i++){
                        if('<?php echo $this->session->userdata('username') ?>' == data[i].username){
                            deletee = '<a href="javascript:;" class="deletebutton" data="'+data[i].id+'">Delete</a>'
                        }else{
                            deletee = '';
                        }
                        if(data[i].food == 'meatballs'){
                            output += '<div class="comment">'+deletee+'<h3 class="commentusername">'+data[i].username+'</h3><p>'+data[i].comment+'</p></div>';
                        }
                    }
                    $('#test').html(output);
                },
                error: function(){
                    alert('could not get data from database');
                }
            })
        }
    })
</script>
