<div class="container-fluid text-center">
    <h4>Estimate your credit score</h4>
    <br>
    <div class="row btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="10" type="text" hidden name="form_page"/>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="Excellent">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Excellent
                    <br/>
                    >720
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="Good">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Good
                    <br/>
                    680-719
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="Fair">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Fair
                    <br/>
                    640-679
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="Poor">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Poor
                    <br/>
                    <639
                </button>
            </div>
        </form>
    </div>
</div>


