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
    <?php if($this->session->userdata('logged_in')) : ?>
    <form action="<?php echo base_url() ?>comments/addComment" id="myForm" method="post">
        Commenting as: <?php echo $this->session->userdata('username')?>.
        <br>
        <textarea name="body" form="myForm" rows="4" placeholder="Enter comment here..." required></textarea>
        <input id="forRecipe" type="hidden" name="food" value="meatballs"/>
        <button id="addcomment" name="meatballs" type="submit">Send</button>
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
