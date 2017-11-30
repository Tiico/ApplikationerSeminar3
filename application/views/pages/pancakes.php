<h2 class="title">Pancakes</h2>
<div id="ingredients">
    <img src="<?php echo asset_url();?>images/pancakes.png" alt="Pancakes">

    <div class="ingrTable">
        <h4>Ingredients:</h4>
        <table>
            <tr>
                <td>2 1/2 dl</td>
                <td>Flour</td>
            </tr>
            <tr>
                <td>1/2 tsp</td>
                <td>Salt</td>
            </tr>
            <tr>
                <td>6 dl</td>
                <td>Milk</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Egg</td>
            </tr>
            <tr>
                <td>3 tbsp</td>
                <td>Butter</td>
            </tr>
            <tr>
                <td></td>
                <td>Jam, berries or fruit</td>
            </tr>
        </table>
    </div>
</div>
<hr>
<div id="method">
    <div id="summary">
        <ul>
            <li>Servings: 4</li>
            <li>Prep: 15 min</li>
            <li>Cook: 30 min</li>
            <li>Total: 45 min</li>
        </ul>
    </div>
    <h2 class="title">Method</h2>
    <p>
        Mix flour and salt in a bowl. Whisk in half of the milk and whisk to a smooth batter. Add the rest of the milk and the eggs.
        Melt the butter in the frying pan and add to the batter. Fry thin pancakes of the batter in a frying pan or pancake pan. Serve with jam, berries or fruit.
    </p>
</div>
<hr>
<div class="commentsubmit">
    <?php echo validation_errors();
    ?>
    <?php
    if($this->session->userdata('username')){
        echo '<form action="comments/create" id="userform" method="post">
                    Commenting as: ' .$this->session->userdata('username'). '
                    <br>
                    <textarea name="body" form="userform" rows="4" required placeholder="Enter comment here..."></textarea>
                    <input type="hidden" name="food" value="pancakes"/>
                    <input id="submit" name="pancakes" type="submit" value="Send"/>
                    </form>';
    }
    elseif(!$this->session->userdata('username')){
        echo 'Log in, in order to be able to comment!';
    }
    ?>
</div>
<hr>
<div class="commentsection">
    <h2>Comments:</h2>
    <?php
    foreach($comments as $comment):
    if($comment['food'] == 'pancakes'){?>
    <div class="comment">
        <?php if($this->session->userdata('username') == $comment['username']) : ?>
        <?php echo form_open('comments/delete/'.$comment['id']); ?>
        <button type="submit" value="Delete" id="cmntdelbtn">Delete</button>
        <input type="hidden" name="food" value="pancakes";>
        <?php echo form_close(); ?>
        <?php endif; ?>
        <h3><?php echo $comment['username']?></h3>
        <p><?php echo $comment['comment']?></p>
    </div>
    <?php
                                      } endforeach;
    ?>
</div>
