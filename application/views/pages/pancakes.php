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
    <?php if($this->session->userdata('logged_in')) : ?>
    <form action="<?php echo base_url() ?>comments/addComment" id="myForm" method="post">
        Commenting as: <?php echo $this->session->userdata('username')?>.
        <br>
        <textarea name="body" form="myForm" rows="4" placeholder="Enter comment here..." required></textarea>
        <input id="forRecipe" type="hidden" name="food" value="pancakes"/>
        <button id="addcomment" name="pancakes" type="submit">Send</button>
    </form>
    <?php endif; ?>
    <?php if(!$this->session->userdata('logged_in')) : ?>
    Log in, in order to be able to comment!
    <?php endif; ?>
</div>
<hr>
<div class="commentsection">
    <div id="test"></div>
</div>
