<div class="container-fluid text-center">
    <form method="post" action="<?php echo base_url("leadgen/refinance"); ?>">
        <input value="71" type="text" hidden name="form_page"/>
            <div class="container text-center">
                <h4>What is the remaining balance on second mortgage?</h4>
                <div class="btn-option row-centered">
                    <div class="form-group filter-panel col-centered">
                        <input type="hidden" name="balance_second_mortgage" class="balance_second_mortgage form-control" value="100000"/>
                    </div>
                </div>
            </div>
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
    $('.balance_second_mortgage').jRange({
        from: 0,
        to: 355000,
        step: 1000,
        format: '$%s or less',
        width: 250,
        showLabels: true,
        snap: true
    });
</script>
