<div class="container-fluid text-center">
    <h4>How much are you putting down as a down payment?</h4>
    <br>
    <div class="btn-option row-centered">
        <form method="post" action="<?php echo base_url("leadgen/purchase"); ?>">
            <input value="5" type="text" hidden name="form_page"/>
            <div class="form-group filter-panel col-centered">
                <input type="hidden" name="percentage_range" class="percentage_range" value="0,20"/>
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
    $('.percentage_range').jRange({
        from: 0,
        to: 100,
        step: 1,
        format: '%s%',
        width: 250,
        showLabels: true,
        isRange : true
    });

</script>

