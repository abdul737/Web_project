<script>
    $(function () {
        $('#individual_type').change(function () {
            if ($('#individual_type').prop('checked')) {
                $('#individual_type').prop('checked', false);
                $('#office_info').show(1000);
                $('#passport_info').hide(1000);
            }
            else {
                $('#individual_type').prop('checked', true);
                $('#passport_info').show(1000);
                $('#office_info').hide(1000);
            }

        });
    });

    function toggleOff() {
        $('#individual_type').bootstrapToggle('off');
    }
</script>