<div class="container-fluid text-center">
    <h4>How will this property be used?</h4>
    <br>
    <div class="row btn-option row-centered">
        <form method="post"
              action="<?php if ($this->session->userdata('purchase_type') == 'purchase') echo base_url("leadgen/purchase"); else echo base_url("leadgen/refinance"); ?>">
            <input value="0" type="text" hidden name="form_page"/>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Primary Home">
                    <span class="glyphicon glyphicon-off logo-small"></span>
                    <br/>
                    Primary Home
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Secondary Home">
                    <span class="glyphicon glyphicon-heart logo-small"></span>
                    <br/>Secondary Home
                </button>
            </div>
            <div class="col-sm-2 col-centered">
                <button type="submit" class="btn btn-success" name="submitForm" value="Rental Property">
                    <span class="glyphicon glyphicon-lock logo-small"></span>
                    <br/>Rental Property
                </button>
            </div>
        </form>
    </div>
</div>

