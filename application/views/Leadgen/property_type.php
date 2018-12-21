<!--Property Purchase section-->
<div id="property_purchasing" class="container-fluid text-center">
    <?php if ($this->session->userdata('purchase_type') == 'purchase') { ?>
        <h4>Great! What type off property are you purchasing?</h4>
    <?php } else { ?>
        <h4>Great! What type off property are you refinancing?</h4>
    <?php } ?>
    <br>
    <div class="row btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/property_used"); ?>">
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Single-Family home">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Single-Family home
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Townhome">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Townhome
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Condominium">
                    <span class="glyphicon glyphicon-lock logo-small"></span>
                    <br/>
                    Condominium
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Multi-family Home">
                    <span class="glyphicon glyphicon-leaf logo-small"></span>
                    <br/>
                    Multi-family Home
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value=" Manufactured or Mobile home">
                    <span class="glyphicon glyphicon-certificate logo-small"></span>
                    <br/>
                    Manufactured or Mobile home
                </button>
            </div>
        </form>
    </div>
</div>