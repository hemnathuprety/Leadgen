<div class="container-fluid text-center">
    <h4>When do you plan to buy a home?</h4>
    <br>
    <div class="btn-option">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="3" type="text" hidden name="form_page"/>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Already under contact">
                    Already under contact
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Immediately - I'm making an offer">
                    Immediately - I'm making an offer
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="I'm shopping and am considering a few options">
                    I'm shopping and am considering a few options
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="With in next couple of months">
                    With in next couple of months
                </button>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success"
                        value="Not sure - i want to know what i can offer">
                    Not sure - i want to know what i can offer
                </button>
            </div>
        </form>
    </div>
</div>

