<div class="container-fluid text-center">
    <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
        <input value="7" type="text" hidden name="form_page"/>
            <div class="container text-center">
                <h4>Would you like to borrow additional cash?</h4>
                <div class="btn-option row-centered">
                    <div class="form-group filter-panel col-centered">
                        <input type="hidden" name="borrow_additional_cash" class="borrow_additional_cash form-control" value="0,150000"/>
                    </div>
                </div>
            </div>
            <br/>
        <br/>
        <div class="container text-center">
            <div class="btn-option row-centered">
                <div class="form-group">
                    <button type="submit" name="submitForm" class="btn btn-success">
                        Continue
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $('.borrow_additional_cash').jRange({
        from: 0,
        to: 355000,
        step: 1000,
        format: '$%s',
        width: 250,
        showLabels: true,
        isRange : true
    });
</script>
