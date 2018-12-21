<div id="main_leadgen" class="container-fluid text-center">
    <h4>What type off home loan are you looking for?</h4>
    <br>
    <div class="row btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/property_type"); ?>">
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="purchase">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Purchase
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="refinance">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Refinance
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-lock logo-small"></span>
                    <br/>
                    Home Enquiry
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-leaf logo-small"></span>
                    <br/>
                    Reverse Mortgage
                </button>
            </div>
        </form>
    </div>
</div>


