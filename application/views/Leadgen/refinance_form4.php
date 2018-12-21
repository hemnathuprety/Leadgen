<div class="container-fluid text-center">
    <h4>What is the remaining 1st mortgage balance?</h4>
    <br>
    <div class="btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
            <input value="4" type="text" hidden name="form_page"/>
            <div class="form-group filter-panel col-centered">
                <input type="hidden" name="mortgage_balance" class="mortgage_balance" value="0,20"/>
            </div>
            <div class="form-group">
                <button type="submit" name="submitForm" class="btn btn-success">
                    Continue
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.mortgage_balance').jRange({
        from: 0,
        to: 100,
        step: 1,
        format: '%s%',
        width: 250,
        showLabels: true,
        isRange : true
    });

</script>

