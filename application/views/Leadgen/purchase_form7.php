<div class="container-fluid text-center">
    <h4>Will you have a co-borrower?</h4>
    <br>
    <div class="row btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="7" type="text" hidden name="form_page"/>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="yes">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Yes
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="no">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    No
                </button>
            </div>
        </form>
    </div>
</div>


