<h2 class="title">Meatballs</h2>
<div id="ingredients">
    <img src="<?php echo asset_url();?>images/meatballs.jpeg" alt="Meatballs">

    <div class="ingrTable">
        <h4>Ingredients:</h4>
        <table>
            <tr>
                <td>500 g</td>
                <td>Minced Meat</td>
            </tr>
            <tr>
                <td>1/2 dl</td>
                <td>Breadcrumbs</td>
            </tr>
            <tr>
                <td>1 dl</td>
                <td>Cream</td>
            </tr>
            <tr>
                <td>2 tbsp</td>
                <td>Finely-chopped Onion</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Egg</td>
            </tr>
            <tr>
                <td>1 Pinch</td>
                <td>Blackpepper</td>
            </tr>
            <tr>
                <td>2 msk</td>
                <td>Butter/Oil</td>
            </tr>
        </table>
    </div>
</div>
<hr>
<div id="method">
    <div id="summary">
        <ul>
            <li>Servings: 4</li>
            <li>Prep: 30 min</li>
            <li>Cook: 15 min</li>
            <li>Total: 45 min</li>
        </ul>
    </div>
    <h2 class="title">Method</h2>
    <p>Mix breadcrumbs and cream. Let swell 10 min. Add the meat, onions, eggs, salt and pepper. Stir to a smooth smear. Form the batter to even buns. Fry them in butter/oil on medium heat for 3-5 minutes.
    </p>
</div>
<hr>
<!-- wrap with php and set if statement to check if logged in-->
<div class="commentsubmit">
    <?php
    if($this->session->userdata('username')){
        echo '<form action="comments/create" id="userform" method="post">
                    Commenting as: ' .$this->session->userdata('username'). '
                    <br>
                    <textarea name="body" form="userform" rows="4" required placeholder="Enter comment here..."></textarea>
                    <input type="hidden" name="food" value="meatballs"/>
                    <input id="submit" name="meatballs" type="submit" value="Send"/>
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
    if($comment['food'] == 'meatballs'){?>
    <div class="comment">
        <?php if($this->session->userdata('username') == $comment['username']) : ?>
        <?php echo form_open('comments/delete/'.$comment['id']); ?>
        <button type="submit" value="Delete" id="cmntdelbtn">Delete</button>
        <input type="hidden" name="food" value="meatballs";>
        <?php echo form_close(); ?>
        <?php endif; ?>
        <h3><?php echo $comment['username']?></h3>
        <p><?php echo $comment['comment']?></p>
    </div>
    <?php
                                       } endforeach;
    ?>
</div>
