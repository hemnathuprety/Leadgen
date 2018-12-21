<div class="container-fluid text-center">
    <h4>Have you had a bankruptcy or foreclosure in the last 7 year?</h4>
    <br>
    <div class="row btn-option row-centered">
        <form method="post" action="<?php if ($this->session->userdata('purchase_type') == 'purchase') echo base_url("leadgen/purchase"); else echo base_url("leadgen/refinance"); ?>">
            <input value="13" type="text" hidden name="form_page"/>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="no">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    No
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="bankruptcy">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Bankruptcy
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="foreclosure">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Foreclosure
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" name="submitForm" class="btn btn-success" value="both">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>
                    Both
                </button>
            </div>
        </form>
    </div>
</div>


