<div class="container-fluid text-center">
    <h4>Why do you want to refinance?</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
            <input value="1" type="text" hidden name="form_page"/>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Lower my monthly payment">
                    Lower my monthly payment
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Pay off my mortgage faster">
                    Pay off my mortgage faster
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Take cash out of home">
                    Take cash out of home
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Browse current mortgage rates">
                    Browse current mortgage rates
                </button>
            </div>
        </form>
    </div>
</div>

